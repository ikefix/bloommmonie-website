<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // make sure this is at the top
use Exception;


class SubscriptionController extends Controller
{
    public function redirectToGateway(Request $request)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('register')->with('error', 'Please register or log in before subscribing.');
        }

        $user = auth()->user();

        // Validate the input
        $request->validate([
            'amount' => 'required|numeric',
            'plan' => 'required|string',
        ]);

        $amount = $request->amount;
        $plan = $request->plan;

        // Save subscription data in session
        session([
            'plan' => $plan,
            'amount' => $amount,
        ]);

        // Redirect to Paystack
        return Paystack::getAuthorizationUrl([
            'email' => $user->email,
            'amount' => $amount,
            'metadata' => [
                'user_id' => $user->id,
                'plan' => $plan,
            ],
        ])->redirectNow();
    }


public function handleGatewayCallback()
{
    try {
        $paymentDetails = Paystack::getPaymentData();

        $metadata = $paymentDetails['data']['metadata'] ?? [];
        $userId = $metadata['user_id'] ?? null;
        $plan = $metadata['plan'] ?? 'lite';
        $amount = $paymentDetails['data']['amount'] ?? 0;
        $reference = $paymentDetails['data']['reference'] ?? null;

        $user = \App\Models\User::find($userId);

        if (!$user) {
            Log::error('User not found for Paystack callback. User ID: ' . $userId);
            return redirect()->route('register')->with('error', 'User not found.');
        }

        $endsAt = $plan === 'lite' ? now()->addMonth() : now()->addYear();

        // ✅ Try to create subscription
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan' => $plan,
            'amount' => $amount,
            'payment_reference' => $reference,
            'starts_at' => now(),
            'ends_at' => $endsAt,
        ]);

        Log::info('Subscription created successfully', $subscription->toArray());

        // Generate subdomain
        $subdomain = strtolower(explode('@', $user->email)[0]);
        $fullDomain = "{$subdomain}.bloommonie.com";

        // ✅ Create Tenant
        $tenant = Tenant::create([
            'user_id' => $user->id,
            'domain' => $fullDomain,
            'subscription_plan' => $plan,
        ]);

        Log::info('Tenant created successfully', $tenant->toArray());

        // Redirect to subdomain
        return redirect()->away("http://{$fullDomain}");
    } catch (Exception $e) {
        Log::error('Payment callback error: ' . $e->getMessage());
        return redirect()->route('register')->with('error', 'An error occurred during subscription.');
    }
}


}
<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\Shop;
use Illuminate\Support\Str;

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
    $paymentDetails = Paystack::getPaymentData();

    $metadata = $paymentDetails['data']['metadata'] ?? [];
    $userId = $metadata['user_id'] ?? null;
    $plan = $metadata['plan'] ?? 'lite';
    $amount = $paymentDetails['data']['amount'] ?? 0;
    $reference = $paymentDetails['data']['reference'] ?? null;

    $user = \App\Models\User::find($userId);

    if (!$user) {
        return redirect()->route('register')->with('error', 'User not found.');
    }

    // Subscription duration
    $endsAt = $plan === 'lite' ? now()->addMonth() : now()->addYear();

    // Store subscription
    \App\Models\Subscription::create([
        'user_id' => $user->id,
        'plan' => $plan,
        'amount' => $amount,
        'payment_reference' => $reference,
        'starts_at' => now(),
        'ends_at' => $endsAt,
    ]);

    // Generate unique subdomain (e.g., peter.posapp.com)
    $subdomain = strtolower(explode('@', $user->email)[0]); // OR customize
    $fullDomain = "{$subdomain}bloommonie.com";

    // Store tenant
    \App\Models\Tenant::create([
        'user_id' => $user->id,
        'domain' => $fullDomain,
        'subscription_plan' => $plan,
    ]);

    // Optional: save current subdomain to session
    session(['tenant_domain' => $fullDomain]);

    // Redirect to tenant's subdomain
    return redirect()->away("http://{$fullDomain}");
}

}
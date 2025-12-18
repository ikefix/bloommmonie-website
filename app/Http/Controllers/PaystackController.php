<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment; // Make sure you created this model
use App\Mail\SubscriptionSuccessMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscription;


class PaystackController extends Controller
{
    // Redirect user to Paystack payment page
    public function redirectToGateway(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')
            ->with('error', 'Please login before making payment.');
    }

    $request->validate([
        'amount' => 'required|numeric|min:100',
        'plan'   => 'required|string',
    ]);

    $amount       = $request->amount;
    $email        = auth()->user()->email;
    $callback_url = route('paystack.callback');

    $http = Http::withToken(env('PAYSTACK_SECRET_KEY'));

    // ONLY for XAMPP
    if (app()->environment('local') && file_exists('C:/xampp/php/ssl/cacert.pem')) {
        $http = $http->withOptions([
            'verify' => 'C:/xampp/php/ssl/cacert.pem'
        ]);
    }

    $response = $http->post(
        'https://api.paystack.co/transaction/initialize',
        [
            'amount'       => $amount,
            'email'        => $email,
            'callback_url' => $callback_url,
            'metadata'     => [
                'plan' => $request->plan,
            ],
        ]
    );

    if (!$response->ok()) {
        return back()->with('error', 'Unable to reach Paystack.');
    }

    $body = $response->json();

    if (!isset($body['status']) || $body['status'] !== true) {
        return back()->with('error', 'Payment initialization failed.');
    }

    Payment::create([
        'user_id'   => auth()->id(),
        'reference' => $body['data']['reference'],
        'amount'    => $amount,
        'status'    => 'pending',
    ]);

    $this->createPendingSubscription(
        auth()->id(),
        $request->plan,
        $amount,
        $body['data']['reference']
    );

    return redirect($body['data']['authorization_url']);
}

    

    // Handle Paystack callback
    public function handleGatewayCallback(Request $request)
{
    $reference = $request->query('reference');

    if (!$reference) {
        return redirect('/pricing')->with('error', 'Invalid payment reference.');
    }

    // Build HTTP client
    $http = Http::withToken(env('PAYSTACK_SECRET_KEY'));

    // ONLY use cacert on localhost
    if (app()->environment('local')) {
        $http = $http->withOptions([
            'verify' => 'C:/xampp/php/ssl/cacert.pem'
        ]);
    }

    // Verify transaction with Paystack
    $response = $http->get(
        "https://api.paystack.co/transaction/verify/{$reference}"
    );

    if (!$response->ok()) {
        return redirect('/pricing')->with('error', 'Unable to verify payment.');
    }

    $body = $response->json();

    // Find payment
    $payment = Payment::where('reference', $reference)->first();

    if (!$payment) {
        return redirect('/pricing')->with('error', 'Payment record not found.');
    }

    // Check status
    if (
        isset($body['data']['status']) &&
        $body['data']['status'] === 'success'
    ) {
        // Prevent double processing
        if ($payment->status !== 'success') {
            $payment->update([
                'status' => 'success',
                'amount' => $body['data']['amount'],
            ]);

            // Get user info
            $user   = $payment->user;
            $plan   = $payment->plan_name;
            $amount = $payment->amount;

            // Send mail
            Mail::to($user->email)->send(
                new \App\Mail\PaymentSuccess($user, $plan, $amount)
            );
        }

        return redirect('/success')->with(
            'success',
            'Payment Successful 🎉. Please wait while we set up your dashboard.
            A confirmation email has been sent to you.
            If you have any concerns, reach customer care at: 09000000000.'
        );
    }

    // Failed or cancelled
    $payment->update(['status' => 'failed']);

    return redirect('/pricing')->with('error', 'Payment failed or cancelled.');
}




    public function createPendingSubscription($userId, $plan, $amount, $reference)
    {
        \App\Models\Subscription::create([
            'user_id'           => $userId,
            'plan'              => $plan,
            'amount'            => $amount,
            'payment_reference' => $reference,
            'starts_at'         => null,  // will fill after confirmation
            'ends_at'           => null,  // will fill after confirmation
        ]);
    }

}

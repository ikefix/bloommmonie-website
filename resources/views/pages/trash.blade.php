dfgdfhgfdhgdfhf



gfsdfgfdhhghg
hgg
<h1>h
    gh

    f
</h1>


tdfdffg

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

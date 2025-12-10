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
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'plan'   => 'required|string',
        ]);

        $amount = $request->amount;
        $email = auth()->user()->email;
        $callback_url = route('paystack.callback');

        // Initialize transaction
        $response = Http::withOptions([
            'verify' => 'C:/xampp/php/ssl/cacert.pem'
        ])
        ->withToken(env('PAYSTACK_SECRET_KEY'))
        ->post('https://api.paystack.co/transaction/initialize', [
            'amount'       => $amount,
            'email'        => $email,
            'callback_url' => $callback_url,
            'metadata'     => [
                'plan' => $request->plan,
            ],
        ]);

        $body = $response->json();

        if (!$body['status']) {
            return back()->with('error', 'Unable to initiate payment.');
        }

        // ✅ Create payment record as PENDING before redirecting
        // save payment record
        Payment::create([
            'user_id'   => auth()->id(),
            'reference' => $body['data']['reference'],
            'amount'    => $amount,
            'status'    => 'pending',
        ]);

        // save pending subscription also
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

        // Verify transaction with Paystack
        $response = Http::withOptions([
            'verify' => 'C:/xampp/php/ssl/cacert.pem'
        ])
        ->withToken(env('PAYSTACK_SECRET_KEY'))
        ->get("https://api.paystack.co/transaction/verify/{$reference}");

        $body = $response->json();

        // Find payment
        $payment = Payment::where('reference', $reference)->first();

        if (!$payment) {
            return redirect('/pricing')->with('error', 'Payment record not found.');
        }

        // Check status
        if (isset($body['status']) && $body['data']['status'] === 'success') {

            // Update DB
            $payment->status = 'success';
            $payment->amount = $body['data']['amount'];
            $payment->save();

            // Get user info
            $user = $payment->user;
            $plan = $payment->plan_name;
            $amount = $payment->amount;

            // Send mail
            Mail::to($user->email)->send(new \App\Mail\PaymentSuccess($user, $plan, $amount));

            // Redirect with custom success message
            return redirect('/success')->with(
                'success',
                'Payment Successful 🎉. Please wait while we set up your dashboard. 
                A confirmation email has been sent to you. 
                If you have any concerns, reach customer care at: 09000000000.'
            );
        }

        // Failed
        $payment->status = 'failed';
        $payment->save();

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

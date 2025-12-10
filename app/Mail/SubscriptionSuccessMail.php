<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plan;
    public $amount;

    public function __construct($user, $plan, $amount)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->subject('Your Subscription Was Successful')
                    ->markdown('emails.subscription.success');
    }
}

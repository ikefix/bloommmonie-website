<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DemoRequest;

class DemoRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    public function __construct(DemoRequest $demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        return $this->subject('Your 14 Days Free Demo Request')
                    ->markdown('emails.demo-request'); // Blade path
    }
}


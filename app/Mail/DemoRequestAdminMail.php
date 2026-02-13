<?php

namespace App\Mail;

use App\Models\DemoRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoRequestAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    public function __construct(DemoRequest $demo)
    {
        $this->demo = $demo;
    }

    public function build()
    {
        return $this->subject('New Demo Booking')
                    ->view('emails.demo-admin');
    }
}

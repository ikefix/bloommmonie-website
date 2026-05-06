<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
<<<<<<< HEAD
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::raw(
            "Name: {$data['name']}\nEmail: {$data['email']}\nMessage: {$data['message']}",
            function ($mail) {
                $mail->to('willsharches@gmail.com')
                     ->subject('New Form Submission');
            }
        );

        return back()->with('success', 'Form submitted successfully');
    }
=======

public function send(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Mail::raw(
        "You have a new contact message:\n\n"
        . "Name: {$data['name']}\n"
        . "Email: {$data['email']}\n"
        . "Subject: {$data['subject']}\n\n"
        . "Message:\n{$data['message']}",
        function ($mail) use ($data) {
            $mail->to('omekeikechukwu877@gmail.com')
                 ->replyTo($data['email'])
                 ->subject($data['subject']);
        }
    );

    return back()->with('success', 'Your message has been sent successfully.');
}

>>>>>>> b728047c9b01454e7716d5cce215dc909b258391
}

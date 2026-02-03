<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

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

}

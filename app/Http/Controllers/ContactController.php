<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'subject', 'message');

        // Send mail to your personal Gmail
        Mail::send([], [], function ($message) use ($data) {
            $message->to('omekeikechukwu877@gmail.com')  // YOUR Gmail
                    ->subject($data['subject'])
                    ->from($data['email'], $data['name'])  // visitor info
                    ->setBody("Name: {$data['name']}\nEmail: {$data['email']}\n\nMessage:\n{$data['message']}");
        });

        return back()->with('success', 'Message sent successfully!');
    }
}

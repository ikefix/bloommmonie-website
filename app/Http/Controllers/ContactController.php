<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Mail::raw(
            "Name: {$data['name']}\nEmail: {$data['email']}\nSubject: {$data['subject']}\n\n{$data['message']}",
            function ($mail) use ($data) {
                $mail->to('support@bloommonie.com')
                    ->subject($data['subject']);
            }
        );


        return back()->with('success', 'Form submitted successfully');
    }
}

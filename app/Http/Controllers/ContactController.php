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
}

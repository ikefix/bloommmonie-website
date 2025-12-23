<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

<<<<<<< HEAD
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
=======
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
                $mail->to('omekeikechukwu877@gmail.com')
                     ->subject('New Form Submission');
            }
        );

        return back()->with('success', 'Form submitted successfully');
>>>>>>> ee0e9a64e86dd4ecea56f3f20b8f84db08b621d4
    }
}

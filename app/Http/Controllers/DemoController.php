<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\DemoRequest;

class DemoController extends Controller
{
    // Show the signup form
    public function showForm()
    {
        return view('demo.signup');
    }

    // Handle form submission
    public function submitForm(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'note'  => 'nullable|string|max:500',
    ]);

    // Save to database
    $demo = DemoRequest::create([
        'name'  => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'note'  => $request->note,
    ]);

    // Send email to user
    // Mail::send('emails.demo-request', ['name' => $demo->name], function ($message) use ($demo) {
    //     $message->to($demo->email, $demo->name)
    //             ->subject('Your Demo Request is Received');
    // });

    return redirect()->route('demo.signup')->with('success', 'Your demo request has been submitted! Check your email.');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\DemoRequest;
use App\Mail\DemoRequestMail;

Mail::to($demo->email)->send(new DemoRequestMail($demo));

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
        // 1️⃣ Validate the form
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:demo_requests,email',
            'phone' => 'nullable|string|max:20',
            'note'  => 'nullable|string|max:500',
        ]);
    
        // 2️⃣ Save the demo request to the database
        $demo = DemoRequest::create($request->only('name', 'email', 'phone', 'note'));
    
        // 3️⃣ Send email to user using a Mailable
        Mail::to($demo->email)->send(new DemoRequestMail($demo));
    
        // 4️⃣ Redirect back with success message
        return redirect()->route('demo.signup')
                         ->with('success', 'Your demo request has been submitted! Check your email.');
    }
}

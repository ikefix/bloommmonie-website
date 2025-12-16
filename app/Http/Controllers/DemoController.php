<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DemoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoRequestMail;

class DemoController extends Controller
{
    // Show the signup form
    public function showForm()
    {
        return view('demo.signup');
    }

    // Handle form submission
    public function submit(Request $request)
{
    // Validate
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:demo_requests,email',
        'phone' => 'nullable|string|max:20',
        'note' => 'nullable|string',
    ]);

    // Save to database
    $demo = DemoRequest::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'note' => $request->note,
    ]);

    // Send email
    Mail::to($demo->email)->send(new \App\Mail\DemoRequestMail($demo));

    return redirect()->back()->with('success', 'Demo request submitted! We will contact you soon.');
}
}

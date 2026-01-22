<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\DemoRequest;
use App\Mail\DemoRequestAdminMail;
use App\Mail\DemoRequestMail;


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

    $demo = DemoRequest::create(
        $request->only('name', 'email', 'phone', 'note')
    );

    // 1️⃣ Send mail to user
    Mail::to($demo->email)->send(new DemoRequestMail($demo));

    // 2️⃣ Send mail to admin
    Mail::to(config('mail.admin_email'))
        ->send(new DemoRequestAdminMail($demo));

    return redirect()->route('demo.signup')
        ->with('success', 'Your demo request has been submitted! Check your email.');
}
}

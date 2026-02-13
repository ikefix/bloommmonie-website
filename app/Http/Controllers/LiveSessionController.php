<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LiveSessionController extends Controller
{
    public function create()
    {
        return view('live_session.book');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
            'date'  => 'required|date',
            'time'  => 'required'
        ]);

        // Fake Google Meet link (can automate later)
        $meetLink = 'https://meet.google.com/' . substr(md5(now()), 0, 10);

        Mail::raw(
            "A live session has been booked.\n\n" .
            "Name: {$request->name}\n" .
            "Email: {$request->email}\n" .
            "Date: {$request->date}\n" .
            "Time: {$request->time}\n\n" .
            "Google Meet Link: {$meetLink}",
            function ($message) {
                $message->to('omekeikechukwu877@gmail.com')
                        ->subject('New Live Session Booked');
            }
        );

        return redirect()
            ->back()
            ->with('success', 'Live session booked successfully. You will be contacted.');
    }
}

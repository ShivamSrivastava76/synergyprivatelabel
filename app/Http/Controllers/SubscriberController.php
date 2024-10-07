<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already subscribed.',
        ]);

        // Save the email to the subscribers table
        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }

}

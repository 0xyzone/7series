<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'This email is already part of our inner circle.',
        ]);

        \App\Models\Subscriber::create([
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Thank you for joining our inner circle!']);
    }

    public function unsubscribe(Request $request, $email)
    {
        \App\Models\Subscriber::where('email', $email)->delete();

        return "You have been successfully unsubscribed from our newsletter.";
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        NewsletterSubscriber::create([
            'email' => $request->input('email'),
            'subscribed_at' => now(),
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
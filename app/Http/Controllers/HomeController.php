<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsArticle; // Changed from GalleryItem
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch up to 5 published news articles for the hero slider.
        // We order by 'is_featured' first, so featured articles always appear first,
        // then by the latest published date.
        $slides = NewsArticle::where('is_published', true)
            ->orderBy('is_featured', 'desc')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('home', compact('slides'));
    }


    public function about()
    {
        return view('about');
    }

    public function admissions()
    {
        return view('admissions');
    }

    public function apply()
    {
        return view('apply');
    }

    public function international()
    {
        return view('international');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Process contact form (send email, save to database, etc.)
        // Mail::to(config('university.email'))->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\NewsArticle;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
            ->where('is_active', true)
            ->where('end_date', '>=', now())
            ->orderBy('start_date')
            ->get();

        $featuredNews = NewsArticle::where('is_featured', true)
            ->where('is_published', true)
            ->latest()
            ->first();

        $sideNews = NewsArticle::where('is_published', true)
            ->where('id', '!=', $featuredNews?->id)
            ->latest()
            ->take(4)
            ->get();

        $gridNews = NewsArticle::where('is_published', true)
            ->whereNotIn('id', $sideNews->pluck('id'))
            ->latest()
            ->take(3)
            ->get();

        $galleryItems = GalleryItem::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $eventData = $events->keyBy('slug')->map->toModalArray();

        return view('events-news', compact(
            'events', 'featuredNews', 'sideNews', 'gridNews', 
            'galleryItems', 'eventData'
        ));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }
}
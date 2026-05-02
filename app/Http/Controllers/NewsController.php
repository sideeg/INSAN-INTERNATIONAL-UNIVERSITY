<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;

class NewsController extends Controller
{
    public function show(string $slug)
    {
        $article = NewsArticle::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('news.show', compact('article'));
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Get locale from query parameter, session, or default to config
        $locale = $request->query('lang') 
                  ?? session('locale') 
                  ?? config('app.locale', 'en');

        // Validate locale is supported
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = config('app.locale', 'en');
        }

        // Set the application locale
        app()->setLocale($locale);
        
        // Store in session for persistence
        session(['locale' => $locale]);

        return $next($request);
    }
}
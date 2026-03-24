<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if language is set in query parameter
        if ($request->has('lang')) {
            $language = $request->get('lang');
            
            // Validate language
            if (in_array($language, ['en', 'am'])) {
                App::setLocale($language);
                Session::put('locale', $language);
                
                // Store in cookie for persistence
                cookie()->queue('locale', $language, 60 * 24 * 30); // 30 days
            }
        }
        // Check if language is stored in session
        elseif (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        // Check if language is stored in cookie
        elseif ($request->cookie('locale')) {
            $language = $request->cookie('locale');
            if (in_array($language, ['en', 'am'])) {
                App::setLocale($language);
                Session::put('locale', $language);
            }
        }
        // Default to Amharic if no language is set
        else {
            App::setLocale('am');
            Session::put('locale', 'am');
        }

        return $next($request);
    }
}

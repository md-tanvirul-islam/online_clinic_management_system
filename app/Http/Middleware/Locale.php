<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class Locale
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

        if (Session::has('locale_language')) {
            $locale_language = Session::get('locale_language');
            App::setLocale($locale_language);
        }
        else{
            App::setLocale(config('app.locale'));
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoutesForDoctor
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
        if(auth()->user()->type === 'doctor')
        {
            return $next($request);
        }
        return abort(403,'You can not access this page');
    }
}

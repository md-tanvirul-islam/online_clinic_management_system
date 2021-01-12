<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoutesForAdmin
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
        if(auth()->user()->type !== 'admin')
        {
            return abort(403,'You can not access this page');
        }
        return $next($request);
    }
}

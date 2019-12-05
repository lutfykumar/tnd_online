<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class levelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $level)
    {
		if ($request->user()->level_id != $level) {
            return redirect()->route('login')->with('error', 'You have no access To this System');
        }
        return $next($request);
    }
}

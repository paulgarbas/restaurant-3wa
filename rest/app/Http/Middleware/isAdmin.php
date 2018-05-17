<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Auth::check rodo ar useris yra prisijunges
        // Auth::user()->admin == 1 nustato ar useris yra adminas
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        return redirect()->route('main.page');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Auth\LoginController;

class IsAdmin
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
        if (auth()->user()->role=='admin'){

        return $next($request);
        }
        return redirect('/');
    }
}

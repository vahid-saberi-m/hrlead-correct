<?php

namespace App\Http\Middleware;

use Closure;

class isCompanyUser
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
        if (auth()->user()->company->id==$request->user->company->id){
            return $next($request);
        }
        return redirect('/');
    }
}

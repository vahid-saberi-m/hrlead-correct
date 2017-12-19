<?php

namespace App\Http\Middleware;

use Closure;

class IsCompanyJobPost
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
        $jobpost= $request->jobpost ;
        if (auth()->user()->company_id == $jobpost->company_id ) {
            return $next($request);
        }
        return redirect('/');
    }
}

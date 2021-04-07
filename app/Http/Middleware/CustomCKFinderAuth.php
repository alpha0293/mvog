<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomCKFinderAuth
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
        config(['ckfinder.authentication' => function() {
            if (Auth::check() && Auth::user() -> hasRole('superadministrator|administrator')) {
                # code...
                return true;
            }
            return false;
        }]);
        return $next($request);
    }
}

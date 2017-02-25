<?php

namespace App\Http\Middleware;
use Auth;
use App;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, $next)
    {
        if (Auth::check() && Auth::user()->admin) {
            return $next($request);
        } else {
            App::abort(404);
        }
    }
}

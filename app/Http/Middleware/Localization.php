<?php

namespace App\Http\Middleware;
use Auth;
use App;
use Session;

class Localization
{

    public $languages = ['en','lv'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
		
		if($request->cookie('lang')) {
			app()->setLocale($request->cookie('lang'));
		}
		
        return $next($request);
    }

}

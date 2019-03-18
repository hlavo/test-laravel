<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Session;

class Language
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
        if(Session::has('applocale') && array_key_exists( Session::get('applocale'),Config::get('languages' )) ){

            $locale = Session::get('applocale');

        }else{

            $locale = Config::get('app.locale');

        }

        \App::setLocale($locale);


        return $next($request);
    }
}

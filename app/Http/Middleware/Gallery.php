<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Gallery
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
        if(Auth::check()){
            return $next($request);
        }

        if($request->route()->getName()==="gallery.form"){
            return $next($request);
        }elseif(Session::has('galerie')){
            $file = \App\Gallery::findOrFail($request->id);
            if( $file->password === Session::get('galerie') ){
                return $next($request);
            }
                Session::forget('galerie');
                return redirect()->route('gallery.form',$request->id);
        }else{
            return redirect()->route('gallery.form',$request->id);
        }

    }
}

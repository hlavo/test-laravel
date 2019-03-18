<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class langController extends Controller
{
    public function setLanguage($lang)
    {
        if(array_key_exists( $lang,Config::get('languages' ))){
            Session::put( 'applocale',$lang );
        }
        return redirect()->back();
    }
}

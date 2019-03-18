<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class fileController extends Controller
{

    public function getFile($id,$name)
    {
        $fullpath = "app/gallerys/{$id}/{$name}";
        return response()->download(storage_path($fullpath), null, [], null);
    }
}

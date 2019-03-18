<?php
/**
 * Created by PhpStorm.
 * User: Hlavo
 * Date: 03.04.17
 * Time: 21:51
 */

namespace App\Services;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadService
{

    public function saveFile($model, $file, $key = false)
    {

        $dirname = strtolower( class_basename($model) ) . 's';
        $filepathPublic = false;

        if($dirname === 'gallerys'){
            $filepath = storage_path("app/$dirname/{$model->id}");
        }else{
            $filepath = public_path("img/$dirname/{$model->id}");
        }

        $extension = $file->getClientOriginalExtension();

        $rand = rand(11111, 99999);

        $filename  = str_replace(
            ".$extension",
            "-" . $rand . ".$extension",
            $file->getClientOriginalName()
        );

        $file->move($filepath,$filename);

        // PRVY FILE JE ULOZENY V PUBLIC PATH ABY SME MALI NAHLADOVY OBRAZOK!!!
        if($key === 0 && $dirname === 'gallerys'){
            File::makeDirectory(public_path('img/gallerys')."/{$model->id}");
            File::copyDirectory("/".$filepath,public_path("img/gallerys/{$model->id}"));
        }

        return $this->addFileToDatabase( $file, $filename, $model );

    }

    protected function addFileToDatabase($file,$filename,$model){

        \App\File::create([
            "fileable_id" => $model->id,
            "fileable_type" => get_class($model),
            "name" => $file->getClientOriginalName(),
            "filename" => $filename,
            "mime" => $file->getClientMimeType(),
            "ext" => $file->getClientOriginalExtension(),
            "size" => $file->getClientSize()
        ]);

    }


    
}
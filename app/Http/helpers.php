<?php
function getPathToBook($id,$fileName,$public = false){
     if($public){
         return public_path("img/books/$id/$fileName");
     }
    return asset("img/books/$id/$fileName");
 }

function getPathToGallery($id,$fileName,$public = false){
    if($public){
        return storage_path("app/gallerys/$id/$fileName");
    }
        return asset("/../storage/app/gallerys/$id/$fileName");
}

function getPathToReference($id,$fileName,$public = false){
    if($public){
        return public_path("img/references/$id/$fileName");
    }
    return asset("img/references/$id/$fileName");
}

function getPathToZipFile($id){
    return storage_path("app/zip/$id.zip");
}
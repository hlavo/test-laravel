<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        "status"
    ];

    public function files()
    {
        return $this->morphMany('\App\File','fileable');
    }
}

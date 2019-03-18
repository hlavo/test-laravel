<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        "title", "password"
    ];

    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }
}

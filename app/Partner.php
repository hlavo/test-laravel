<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        "title", "url"
    ];

    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }
}

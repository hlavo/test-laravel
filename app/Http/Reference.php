<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        "title", "text_cs", "text_en", "signature"
    ];

    public function files()
    {
        return $this->morphMany('App\File', 'fileable');
    }
}

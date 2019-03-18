<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        "firstname", "surname", "phone", "email", "date", "type", "message"
    ];
}

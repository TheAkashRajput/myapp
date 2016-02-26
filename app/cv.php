<?php

namespace TB;

use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    protected $fillable = [
    'name',
    'url',
    'video_id',
    'user_id'
    ];
}

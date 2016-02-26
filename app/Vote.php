<?php

namespace TB;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
    'video_id',
    'voter_id',
    'vote'
    ];
}

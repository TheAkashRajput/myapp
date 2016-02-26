<?php

namespace TB;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    'name',
    'url'
    ];
    
    /**
    *
    * The Video belongs to a single User
    *
    **/
    
    public function video(){
        
        $this->belongsTo('\TB\User');
    }
}

<?php

namespace TB\Http\Controllers;

use Illuminate\Http\Request;

use TB\Http\Requests;
use TB\Http\Controllers\Controller;

class cvController extends Controller
{
    
    public function getCurrentVideo(){

        $video = \TB\cv::find(1);
        $video['user_name'] = \TB\User::find($video['user_id'])->first()['name']; 
        return ($video);
    }
    
    public function updateCurrentVideo(){
        $cv = new \TB\cv;
        $hv = \TB\Video::orderBy('hits', 'DESC')->first()->toArray();

        if($cv::find(1)->update(['video_id'=> $hv['id'],'user_id'=> $hv['user_id'], 'name'=> 
         $hv['name'], 'url'=> $hv['url'] ])){
           return 'true';
        } else return 'false';
    }
}

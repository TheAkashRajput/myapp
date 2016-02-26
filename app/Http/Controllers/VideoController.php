<?php
namespace TB\Http\Controllers;

use Request;

use TB\Http\Requests;
use TB\Http\Controllers\Controller;
use Carbon;

class VideoController extends Controller
{
    
    public function __construct(){
        
        $this->middleware('auth', ['except' => ['index', 'ghv', 'gv'] ]);
    }
    
    public function index(){
        return view('index');
    }
    
    
    public function home(){
        return view('index');
    }
    
    public function add() {
    
        return view('video.add');
    }
    
    public function store(Requests\AddVideo $request){
        
        $video = new \TB\Video($request->all());
        $id = \Auth::user()->videos()->save($video)->id;
        $refURL = 'http://localhost:8080/?ref_id='.$id;
        flash()->success('The Video Has Been Added !');
        
        return redirect('/dashboard');
        
    }


    public function success(){
        
        return view('success');
    }
    
    public function edit($id){
        
        $video = \TB\Video::findOrFail($id);
        
        return view('video.edit', compact('video'));
    }

    public function delete($id){
        
        if($video = \TB\Video::destroy($id)){
            
            flash()->success('The Video Has Been Deleted !');
        
            return redirect('/dashboard');

        } else return false;

    }
    

    public function update($id, Requests\AddVideo $request){
        
        $video = \TB\Video::findOrFail($id);
        
        $video->update($request->all());
        flash()->success('The Video Has Been Updated !');
        return redirect('/dashboard');
    }
    
    
    public function hits(){
        $hits = \TB\Video::orderBy('hits', 'DESC')->get();
        
        return view('hits', compact('hits'));
    }
    
    public function getHighestVideo(){
        
        $video = \TB\Video::orderBy('hits', 'DESC')->first();
        return $video->toArray();
    }
    
    public function getVideo(){
        $video = \TB\Video::find($_GET['id']);
        if($video){
        return $video;
        } else return 'Not Found!';
    }
    
    public function dashboard(){
        $id = \Auth::id();
        $videos = \TB\Video::where('user_id', $id)->get();
        $user = \TB\User::where('id', $id)->first()->get();
        return view('video.dashboard')->with('user', $user)->with('videos', $videos);
    }


}


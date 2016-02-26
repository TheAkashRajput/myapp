<?php

namespace TB\Http\Controllers;

use Illuminate\Http\Request;

use TB\Http\Requests;
use TB\Http\Controllers\Controller;
use TB\Http\Controllers\VoteController;
class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVCount(Request $request)
    {
        $request = \Request::all();  
        $vote = new \TB\Vote;
        
          if($request['type'] == "up"){
            $votes =$vote::where('vote', 1)->count();
          }
          else if($request['type'] == "down"){
            $votes =$vote::where('vote', 2)->count();
          }
          if($votes == 0){
          return "-";
          } else return $votes;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function registerVote(Request $request)
    {
        $request = \Request::all();  
        $vote = new \TB\Vote;
        $voterID = $_COOKIE['PHPSESSID'];
        
        $currentVote = $vote::where(['video_id'=> $request['id'], 'voter_id'=> $voterID])->first();
        
        if( $currentVote != null)
        {
            if($request['type'] == 'up' && $currentVote == '2'){
                $currentVote->update(['vote' => 1]);
            } else if($request['type'] == 'down' && $currentVote == '1'){
                $currentVote->update(['vote' => 2]);
            } else $vote::destroy($currentVote['id']);
            
        } else {

            if($request['type'] == 'up'){
                $vote::create(['voter_id' => $voterID, 'video_id' => $request['id'], 'vote' => 1 ]);
            }
            else if($request['type'] == 'down'){
                $vote::create(['voter_id' => $voterID, 'video_id' => $request['id'], 'vote' => 2 ]);
            } 
        }
            
        
        // return the final vote count in json format
        
        $upVotes = $vote::where(['vote' => 1, 'video_id' => $request['id'] ])->count();
        $downVotes = $vote::where(['vote' => 2, 'video_id' => $request['id'] ])->count();

        $arr = array('upvotes' => $upVotes, 'downvotes'=>$downVotes);
        header('Content-Type: application/json');
        echo json_encode($arr);           

    }
    
    public function fetchVotes($type, $videoID){
        
        $vote = new \TB\Vote;
        
          if($type == "up"){
          }
          else if($type == "down"){
          }
          if($votes == null){
          return "-";
          } else return $votes;
        
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


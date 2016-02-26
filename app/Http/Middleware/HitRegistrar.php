<?php

namespace TB\Http\Middleware;

use Closure;

class HitRegistrar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->is('/') && $request->has('ref_id')){
            
            $video = new \TB\Video;
            $ref_id = $request['ref_id'];
            $currentVideo = $video::find($ref_id);

            if($currentVideo){

                $hits = $currentVideo['hits'] + 1 ;
                $currentVideo['hits'] = $hits;
                $currentVideo->save();

                return redirect("/");
            } else return redirect("/");
        }
        return $next($request);
    }
}

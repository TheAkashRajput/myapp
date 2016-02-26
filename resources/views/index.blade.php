@extends('app')


@section('content')
<style>
    #common-header{
        display: none;
    }
</style>

<body class="play-pause" style="margin:0" onload="_cntDown=setInterval('ShowTimes()',1000)" >


@include('partials.sections')    
          <!-- Timer -->  
          <?php
        //   echo date('d-m-Y H:i:s');
          $time_eod  = mktime(00, 59, 59, date('m'), date('d'), date('Y'));
          $time_current = time();
          $differenceInSeconds = $time_eod - $time_current;
        ?>

   
 <script type="text/javascript">
    
                function extractVideoID(url){
                var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
                var match = url.match(regExp);
                if ( match && match[7].length == 11 ){
                    return match[7];
                }else{
                    console.log("Could not extract video ID.");
                }
            }
    
            var remaining_sec = "<?= $differenceInSeconds ?>";
            function ShowTimes() {
            var tmp = remaining_sec;
            remaining_sec--;
            var hrs = Math.floor(remaining_sec/(60*60));
            var mins = Math.floor((remaining_sec - (hrs*60*60))/60);
            var secs = (remaining_sec - ((hrs*60*60) + (mins*60)));
            var str = '';
            str +='' +mins +':' +secs;
                while(secs == 0 && mins == 0){
                    
                 $.ajax({url:"ucv",type:"GET",success:function(result){
                  console.log(result);
                  },
                  cache:false});
                    
                  $.ajax({url:"gcv",data :{ },type:"GET",success:function(result){
                  $('#video-name').text(result['name']);
                  $('#user-name').text(result['user_name']);
                
                  var videoid = extractVideoID(result['url']);
                  $('#player').attr('src', 'http://www.youtube.com/embed/'+videoid+'?enablejsapi=1&controls=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&showinfo=0');
                  
                  },
                  cache:false});                    
                  break;
                }
            document.getElementById('countdown').innerHTML = str;
        }
        var _cntDown;
        function StopTimes() {
            clearInterval(_cntDown);
	}
</script>

    <!-- Get the right video after reload & add it to iframe -->

<script>
                  $.ajax({url:"gcv",data :{ },type:"GET",success:function(result){
                  $('#video-name').text(result['name']);
                  $('#user-name').text(result['user_name']);
                  var videoid = extractVideoID(result['url']);
                  $('#player').attr('src', 'http://www.youtube.com/embed/'+videoid+'?enablejsapi=1&controls=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&showinfo=0');
                  
                  },
                  cache:false});
</script>
    
    
    <!-- Initial iframe with a whatever video loaded -->
                
    <iframe id="player" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/yQ59vHSFfZA?enablejsapi=1&controls=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&showinfo=0" 
    frameborder="0"></iframe>

    <!-- Reload the video after it finished playing with the same video --> 
                
    <script src="https://apis.google.com/js/platform.js"></script>                
    <script type="text/javascript">
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            var player;
            function onYouTubeIframeAPIReady() {
              player = new YT.Player('player', {

              playerVars: {

                  },

                events: {
                  'onReady': onPlayerReady,
                  'onStateChange': onPlayerStateChange
                }
              });
            }


            function onPlayerReady(event) {
            };




         function onPlayerStateChange(event) {
              if (event.data == YT.PlayerState.ENDED) {
                  // Here add the same video after playing
                    player.loadVideoById(videoid);
                    player.playVideo();
              }
              } 



        </script>
                
        <!-- End Player Section-->  


        <script> 

              $('#open-popup-link').magnificPopup({

              items: {
                  src: '#comments_pop',
                  type: 'inline'
              }
            });
        </script>
    
<div id="comments_pop" class="white-popup mfp-hide">
    <center>
                        <h1> hello! </h1>
                        <form method="post" id="comment_form"  name="comment_form">
                                <?php //require_once('test_disqus.php');  ?>
                        </form>
    </center>
</div>

<script>    
    
    
// get the current video id
    
    $.ajax({url:"gcv",data :{ },type:"GET",success:function(result){
    id = result['video_id'];
    $('#video-name').text(result['name']);
    },
    cache:false});
    
    
    /* Catching event after clicking the buttons */ 

    $(document).on('click', '#vote_up', voteup);
    $(document).on('click', '#vote_down', votedown);

    function votedown(e){
        e.preventDefault();
        e.stopPropagation();
        var u = "rv";
        var type = "down";
        var uid = 1;
        $('#votes .loading').show();
        $.get( u, { id : id,type : type, uid : uid },function(result){
            console.log(result);
            result = JSON.parse(result);
            $('#votes .loading').hide();
            $("#upvotes").html(result.upvotes);       
            $("#downvotes").html(result.downvotes);       
        });
    }

    function voteup(e){
        e.preventDefault();
        e.stopPropagation();
        var u = "rv";
        var type = "up";
        var uid = 1;
        $('#votes .loading').show();
        $.get( u, { id : id,type : type, uid : uid },function(result){
            console.log(result);
            result = JSON.parse(result);
            $('#votes .loading').hide();
            $("#upvotes").html(result.upvotes);       
            $("#downvotes").html(result.downvotes);       
        });
    }    
    </script>
        
        
    <script>    

        /* Restoring the class of the like/dislike button after reviewing the vote of current user which is registered using cookie */
        
        $(document).ready(function(){
            
        var u = "gvc";
        var type = "up";
        $('#votes .loading').show();
        $.get( u, { type : type},function(result){
            $("#upvotes").html(result);   
            $('#votes .loading').hide();            
        });
    
        type = "down";
        $('#votes .loading').show();
        $.get( u, { type : type},function(result){
            $("#downvotes").html(result);   
            $('#votes .loading').hide();            
        });

        if("<?php //echo vote_check($userId,$videoId) ?>" == 1)
        {
          $('#vote_up').removeClass("passive");
          $('#vote_down').addClass("passive");
        }
        else if("<?php //echo vote_check($userId,$videoId) ?>" == 2)
        {
          $('#vote_down').removeClass("passive");
          $('#vote_up').addClass("passive");
        }else{
          $('#vote_down').addClass("passive");
          $('#vote_up').addClass("passive");
        }

        });


    </script>    
        
    

    <script>
            $(document).ajaxStart(function () {
                $('#loading').show();  // show loading indicator
            });

            $(document).ajaxComplete(function() 
            {
                $('#loading').hide();  // hide loading indicator
            });


    </script>
    
    
    
    
            
@stop
        
@section('footer')
        

@stop

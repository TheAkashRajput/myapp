

    
    
    <!-- Video info section -->        
            <div id="info-block" style="">
                          <a href="#" id="info-block-btn" class="dropdown-toggle" data-toggle="dropdown">
                              <span class="fui-info-circle" style="color: darkblue;text-shadow: 1px 1px white;"></span></a>

                          <ul style="display:none" id="top-info">
                              <li><b>Name :</b> <span  id="video-name"> Video Name </span></li>
                            <li class="divider"></li>
                              <li><b>User: </b> <span id="user-name"> User Name</span></li>
                              <li><b>Next In: </b><div id="countdown" style="color:white"></div></li>
                          </ul>
                <script>
                
                    $('#info-block-btn').click( function(){
                        $('#top-info').toggle(600);
                    });
                </script>
            </div>


    <!-- like, dislike, comment section -->
    
   <div class="vote slide-left">
             <center>
                 <ul id="">
                     <section id="votes">
                         <div class="loading" style="display:none">Voting...</div>
                            <li><img id="vote_up" class="do-not-propogate" src="/dist/img/like.png">
                                 <span id="upvotes" style="color:white"> - </span>
                            </li>
                            <li>
                                 <img id="vote_down" class="do-not-propogate" src="/dist/img/dislike.png" >
                                 <span id="downvotes" style="color:white">-</span>
                            </li>
                     </section>
                     <!--section id="comments">
                             <li>
                                 <a href="#comments_pop" class="do-not-propogate" id="open-popup-link">
                                    <img class="do-not-propogate" id="comment"  src="/dist/img/comment.png">
                                    <span id='disqus_comment_count'>-</span>
                                 </a>
                             </li> 
                     </section -->                         
                 </ul>
             </center>
    </div> 

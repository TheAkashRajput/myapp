
<!-- Right top menu -->    
            <div id="main-nav" style="">
            
                      <a id="menu-btn" href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <span class=" fui-list" style=""></span></a>
                      
                      <ul id='main-nav-ul' style="display:none" class="dropdown-menu">
@if (Auth::check())
                        <li><a href="/"><span class="fui-home"> </span>Home</a></li>                          
              
                        <li><a href="/hits"><span class="fui-list-numbered"> </span>Queue</a></li>
                        <li><a href="/dashboard"><span class="fui-user"> </span>Dashboard</a></li>
                          <li><a href="/auth/logout"><span class="fui-power"> </span>LogOut</a></li>                                                    
@else
                        <li><a href="/"><span class="fui-home"> </span>Home</a></li>                          
                        <li><a href="/dashboard"><span class="fui-user"> </span>Log In</a></li>        
@endif



                          
                         </ul>
                
                <script>
                        $('#menu-btn').click(function(){
                            $('#main-nav-ul').toggle(300);
                       });
                </script>
            </div>

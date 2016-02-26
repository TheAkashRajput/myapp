@extends('app')


@section('content')
    </head>
    <body>
        <div class="container">
                
                
@foreach($user as $person)                            
            <br>
            <blockquote class="user"><span class="fui-user"></span> <b> {{$userName = $person->name}}</b></blockquote>
          
@endforeach                            

            <div class="row">
                <div class="lg-6 md-6 sm-8 xs-10">
                    <h2 class="subtle-heading" style="">My Videos: </h2>
                            <a style="float:right;" class="btn btn-primary btn-vs" href="/add">
                                <span class="fui-plus"> </span>Add Video
                            </a>
                </div>
                <div class="lg-6 md-6 sm-4 xs-12">
                </div>
            </div>

            
            <?php $i= 1; ?>
            
            
            
            <div class="row">
                <div class="lg-12 md-12 sm-12 xs-12">
                    
                    
                <div class="table-responsive">
                    <table class="table dashboard">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Source</th>
								<th>Hits </th>
								<th> <span class="fui-link"></span> Sharing Link</th>
                                <th> <span class="fui-gear"></span> Options</th>
                            </tr>
				        </thead>
						<tbody class="Videos">
                         
                            
@if(isset($videos[0]))                            
    @foreach ($videos as $video)                
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><b style="color:yellowgreen">{{ $video->name }}</b></td>
                                    <td style="color:yellow">{{ $video->url }}</td>
                                    <td>{{ $video->hits }}</td>
                                    <td style="color:cyan"><code>http://localhost:8080/?ref_id={{ $video->id }}<code></td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                              <a style="" class="btn btn-primary btn-vs" href="/{{ $video->id }}/edit">
                                                  <span class="fui-new"></span></a>
                                    <a style="background:darkslategray" class="btn btn-primary btn-vs" href="#delete" onclick="deleteVideo({{ $video->id }})">
                                                  <span class="fui-trash"></span></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                <?php $i++; ?>
    @endforeach
                        </tbody>
                    </table>
                </div>

@endif
@if(!isset($videos[0]))
                                    <center><p>There's nothing to show here.</p></center>
@endif
        
        </div>

    <script>
        function deleteVideo (  id){
    
        bootbox.confirm("Are you sure?", function(result) {
            
            if(result){
                    window.location= id+'/delete';
            } else return false;
            
        }); 
    
    }
    </script>
                
                
@stop
        
@section('footer')
        
@stop

@extends('app')


@section('content')
    </head>
    <body>
        <div class="container">
                
                

                
            <h1 class="subtle-heading"> TubeShare Queue: </h1>
         
            <?php $i= 1; ?>
            
            
            
            
            <div class="row">
                <div class="lg-12 md-12 sm-12 xs-12">
                    
                    
                <div class="table-responsive" >
                    <table class="table dashboard">
						<thead>
							<tr>
								<th>#</th>
								<th>Video Title</th>
								<th>Source</th>
								<th>Hits</th>
                            </tr>
				        </thead>
						<tbody class="Videos">
            
@foreach ($hits as $hit)                
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td style="color:lightgreen">{{ $hit->name }}</td>
                                <td style="width:35%;color:yellow">{{ $hit->url }}</td>
                                <td>{{ $hit->hits }}</td>
                            </tr>
            
            <?php $i++; ?>
@endforeach
                        </tbody>
                    </table>
                    
        
            </div>
        </div>

@stop
        
@section('footer')
        
@stop

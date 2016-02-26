@extends('app')

@section('content')

    <div class="container">
        <div class="row">
                <center>
            <h1 class="subtle-heading"> Add A Video To Qeue </h1>
       
                    <div class="lg-4 md-4 sm-3 xs-12"></div>
            <div class="lg-4 md-4 sm-6 xs-12">
    
                {!! Form::open(); !!}

                    <div class="form-group custom">
                        {!! Form::label('name', 'Video Name') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control', 'style' => 'width:40%', 'placeholder' => 'Video Name']) !!}
                    </div>

                    <div class="form-group  custom">
                        {!! Form::label('url', 'Video URL') !!}
                        {!! Form::text('url', null, ['class'=> 'form-control', 'style' => 'width:40%', 'placeholder' => 'Video URl']) !!}
                    </div>

                    <div class="form-group custom-submit">
                        {!! Form::submit('Add Video', ['class'=> 'btn btn-success form-control', 'style' => 'width:40%;color:white;background:green;border-color:green']) !!}
                    </div>

            {!! Form::close(); !!}


            @if($errors->any())

                <ul class="alert alert-danger" style="width:40%">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            </div>
                    <div class="lg-4 md-4 sm-3 xs-12"></div>
            </center>

               </div>
    </div>


@stop

@section('footer')

@stop
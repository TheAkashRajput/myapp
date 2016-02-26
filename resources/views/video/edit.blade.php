@extends('app')


@section('content')
<div class="container">
    <center>
        <h1 class="subtle-heading"> Update :  {!! $video->name !!}</h1>
<hr>
    {!! Form::model($video, ['method' => 'PATCH', 'action' => ['VideoController@update', $video->id]]); !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Video Name') !!}
            {!! Form::text('name', null, ['class'=> 'form-control', 'style' => 'width:40%']) !!}
            
        </div>

        <div class="form-group">
            {!! Form::label('url', 'Video URL') !!}
            {!! Form::text('url', null, ['class'=> 'form-control', 'style' => 'width:40%']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Video', ['class'=> 'btn btn-primary form-control', 'style' => 'width:40%;background:green;border-color:green;color:white']) !!}
        </div>

{!! Form::close(); !!}


@if($errors->any())

    <ul class="alert alert-danger" style="width:40%">
        @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
    </ul>
@endif
    </center>
</div>

@section('footer')
        
@stop

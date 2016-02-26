@extends('app')

@section('content')

<h4> sharing url for this video:</h4>
<div id='url-holder' class="form-group has-error">
            <input type="text" value="{{ $url }}" disabled="disabled" class="form-control">
</div>    

@stop

@section('footer')

@stop
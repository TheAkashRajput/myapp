@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <center><h1 class="subtle-heading"> LogIn </h1></center>
            <br>
		<div class="col-md-8 col-md-offset-2">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group success" style="border-color:green">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" placeholder="Email" value="" autocomplete="off" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
                                               
										<input  type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" style="width:100%;background:green;border-color:green" class="btn btn-primary">Login</button>

								<a class="btn btn-link"  href="{{ url('/password/email') }}">Forgot Your Password?</a> <a class="btn btn-link" style="color:green" href="/auth/register">Create An Account</a>
							</div>
						</div>


					</form>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
    </div>
</div>
@endsection
@extends('includes.headerlight')
@section('content')
<div class="container">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="/css/app.css" rel="stylesheet">
<div>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				
					<div class="cardx fat mt-4">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">

								@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
                                @csrf
								<div class="form-group">
                                  
									<label for="name" style= "margin-bottom:5px">Name</label>
									<input style= "margin-bottom:15px" id="name" type="text" class="form-control" name="name"  autofocus placeholder="Enter name" value="{{ old('name') }}">
                                   
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>

								</div>

								<div class="form-group">
									<label for="email" style= "margin-bottom:5px">E-Mail Address</label>
									<input style= "margin-bottom:15px" id="email" type="email" class="form-control" name="email"  placeholder="Enter email" value="{{ old('email') }}">
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>
                          

								<div class="form-group">
									<label for="password" style= "margin-bottom:5px">Password</label>
									<input style= "margin-bottom:15px" id="password" type="password" class="form-control" name="password"  data-eye placeholder="Enter password">
									<span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>
                                <div class="form-group" >
									<label for="password-confirm" style= "margin-bottom:5px">Confirm Password</label>
									<input  style= "margin-bottom:15px" id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye placeholder="Enter confirm password">
									<span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="{{route('login')}}">Login</a>
								</div>
							</form>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

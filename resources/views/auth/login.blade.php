@extends('layouts.app')

@section('title')
<title>Mide's Blog | Login</title>
@endsection

@section('content')
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="ugf-container-wrap">
						<div class="ugf-container">
							<div class="ugf-content">
								<div class="logo">
									<a href="{{ url('/') }}"><img src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Mide-logo-black"></a>
								</div>
								<h3 style="font-family:PTSans; letter-spacing:-0.5px;">Welcome back!</h3>
								<p>Sign into your account</p>
								<form method="POST" action="{{ route('login') }}" autocomplete="off">
									@csrf
									{{-- Email Address --}}
									<div class="form-group">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="user@mideblog.com" required autofocus style="font-family:PTSans;">
										<label for="email" style="font-family:PTSans;">Email Addresss</label>										
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									
									{{-- Password --}}
									<div class="form-group pass-block">
										<input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required autocomplete="current-password" style="font-family:PTSans;">
										<label for="password" style="font-family:PTSans;">Password</label>
										<div class="pass-toggler-btn">
											<i id="eye" class="fal fa-eye"></i>
											<i id="eye-slash" class="fal fa-eye-slash"></i>
										</div>
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								
									<div class="form-group">
										<button type="submit" class="btn">Login Account</button>
									</div>
								</form>	
								@if (Route::has('password.request'))
									<a href="{{ route('password.request') }}" style="font-family:PTSans;" class="forget-pass">{{ __('Forgot Your Password?') }}</a>
								@endif
								<div class="alternet-access pt-2">
									<p style="font-family:PTSans;">Don't have an account? <a href="{{ route('register') }}">Create an account!</a></p>
								</div>
								<div class="ugf-block-separator">
								  <p>Or</p> 
								</div>
								<div class="ugf-third-party-login">
									<a href="javascript:void(0);"><img src="{{ asset('assets/images/auth/google.png') }}" alt=""> Sign up with Google</a>
									<a href="javascript:void(0);"><img src="{{ asset('assets/images/auth/facebook.png') }}" alt=""> Sign up with Facebook</a>
								</div>
								<div class="ugf-block-separator">
								  <p>Navigate</p> 
								</div>
								<div class="ugf-third-party-login">
									<a href="{{ url('/') }}"><i class="fal fa-home pr-4"></i> Back to Homepage</a>
								</div>
							</div>
							<div class="ugf-bg bg-1"></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/axios-loader.js') }}"></script>
    <script src="{{ asset('js/notiflix-2.7.0.min.js') }}"></script>
	<script src="{{ asset('js/auth/custom.js') }}"></script>
    <script>
        loadProgressBar();
    </script>
@endsection

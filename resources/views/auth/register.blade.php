@extends('layouts.app')

@section('title')
<title>Mide's Blog | Register</title>
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
								<h3 style="font-family:PTSans; letter-spacing:-0.5px;">Let's get started</h3>
								<div class="steps">
									<span class="step processing"></span>
								</div>
								<p>Experiences seamsless access to connect to various users articles free for 14 days. No credit card required.</p>
								<form method="POST" action="{{ route('register') }}" autocomplete="off">
									@csrf
									{{-- Name --}}
									<div class="form-group">
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Mide's Blog" style="font-family:PTSans;">
										<label for="email" style="font-family:PTSans;">Name</label>	
										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									
									{{-- Username --}}
									<div class="form-group">
										<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus placeholder="Mide Coder" style="font-family:PTSans;">
										<label for="username" style="font-family:PTSans;">Username</label>	
										@error('username')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									
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
										<input id="register-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required autocomplete="current-password" style="font-family:PTSans;">
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
									
									{{-- Confirm Password --}}
									<div class="form-group pass-block">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
										<label for="password" style="font-family:PTSans;">Confirm Password</label>
										<div class="pass-toggler-btn">
											<i id="eye" class="fal fa-eye"></i>
											<i id="eye-slash" class="fal fa-eye-slash"></i>
										</div>
									</div>
								
									<div class="form-group">
										<button type="submit" class="btn">Get Started</button>
										<span class="terms">I agree to Mide's Blog <a href="javascript:void(0);">Terms of Service</a> and <a href="javascript:void(0);">Privacy Policy</a>.</span>
									</div>
								</form>	
								<div class="alternet-access pt-2">
									<p>Already have an account? <a href="{{ route('login') }}">Log in now!</a></p>
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
    <script>
        loadProgressBar();
    </script>
@endsection

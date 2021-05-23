@extends('layouts.app')

@section('title')
<title>Login - Mide Blog</title>
@endsection

@section('content')
<div class="form-body without">
    <div class="website-logo">
        <a href="/">
            <div class="logo">
                <img class="logo-size" src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Mide-logo-black">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{ asset('assets/images/graphic2.svg') }}" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Login Here</h3>
                    <p>Mide Blog is a social network forum that provides the accessibility to connect to various users articles...</p>
                    <div class="page-links">
                        <a href="/login" class="active">Login</a><a href="/register">Register</a>
                    </div>
                    <form  method="POST" action="{{ route('login') }}">
						@csrf
						{{-- Email Address --}}
						<div class="form-group">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autocomplete="email" autofocus>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

						{{-- Password --}}
						<div class="form-group">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                        </div>

						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
                        </div>

						<div class="form-group mb-0">
							<div class="form-button">
								<button id="submit" type="submit" class="ibtn">{{ __('Login') }}</button>
							</div>

							@if (Route::has('password.request'))
								<div class="page-links">
									<a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
								</div>
							@endif
                        </div>


                    </form>
                    <div class="other-links">
						<div class="text">Or login with</div>
						<a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
						<a href="#"><i class="fab fa-google"></i>Google</a>
						<a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
					</div>
					<div class="page-links">
						<a href="/">Back to Homepage</a>
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

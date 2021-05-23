@extends('layouts.app')

@section('title')
<title>Register - Mide Blog</title>
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
                <img src="{{ asset('assets/images/graphic1.svg') }}" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Register Here</h3>
                    <p>Mide Blog is a social network forum that provides the accessibility to connect to various users articles...</p>
                    <div class="page-links">
                        <a href="/login">Login</a><a href="/register" class="active">Register</a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- Name --}}
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{--  Email Address --}}
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group ">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">{{ __('Register') }}</button>
                        </div>
                    </form>
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

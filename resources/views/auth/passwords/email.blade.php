@extends('layouts.app')

@section('title')
    <title>Forgot Password - Mide Blog</title>
@endsection

@section('content')
    <div class="form-body">
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
                    <img src="{{ asset('assets/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Password Reset</h3>
                        <p>To reset your password, enter the email address you use to sign in to Mide's Blog</p>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            {{-- Email Address --}}
                            <div class="form-group ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="E-mail Address" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password Reset Button --}}
                            <div class="form-group">
                                <div class="form-button full-width">
                                    <button id="submit" type="submit" class="ibtn btn-forget">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </div>
                        </form>
                        <div class="page-links">
                            <a href="/login">Redirect to Login</a>
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

@extends('layouts.app')

@section('title')
    <title>Mide's Blog - Administrator Acess</title>
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
                    <h3>Admin Login Here</h3>
                    <p>Mide Blog is a social network forum that provides the accessibility to connect to various users articles...</p>
                    <div class="page-links">
                        <a href="/admin/login" class="active">Admin Login</a>
                        <a href="/register">Register</a>
                    </div>
                    <form  id="adminLoginForm" autocomplete="off">
						@csrf
						{{-- Email Address --}}
						<div class="form-group">
							<input id="email" type="email" class="form-control" name="email" value="" placeholder="E-mail Address" required autofocus>
                            <span  id="email-field" class="invalid-feedback" role="alert"> </span>
                        </div>

						{{-- Password --}}
						<div class="form-group">
							<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            <span  id="password-field" class="invalid-feedback" role="alert"></span>
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
								<button id="adminFormSubmitButton" type="submit" class="ibtn btn-block">{{ __('Login') }}</button>
							</div>

							@if (Route::has('password.request'))
								<div class="page-links">
									<a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
								</div>
							@endif
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
        // Load progress bar
        loadProgressBar();
        $(document).on('submit', '#adminLoginForm', function (event) {
            loadSpinner('#adminFormSubmitButton')
            event.preventDefault();
            let data = $(this).serialize();
            axios.post("{{ route('admin.auth.login') }}", data)
            .then((result) => {
                Notiflix.Loading.Dots('Processing...');
                // Notiflix.Report.Success('Success', result.data.success, 'Ok')
                setTimeout(() => {
                    Notiflix.Loading.Remove(2800);
                    Notiflix.Report.Success('Success', result.data.success, 'Ok')
                    window.location = result.data.redirectTo;
                }, 5000)
                console.log(result)
                removeSpinner('#adminFormSubmitButton', 'Login')
            }).catch((err) => {
                printErrorMsg(err.response.data.error) //err=error from the catch block, response.data.error = error from the validator
                Notiflix.Report.Failure('Error', '"'+err.response.data.error+'"', 'Ok')
                removeSpinner('#adminFormSubmitButton', 'Login')
            });
        });

        function loadSpinner(item) {
            $(item).attr('disabled', true);
            $(item).html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
        }

        function removeSpinner(item, message) {
            $(item).attr('disabled', false);
            $(item).html(message);
        }

        function printErrorMsg(msg) {
            if (msg != undefined) {
                var obj = Object.keys(msg);
                processError(msg, obj, 'email', '#email', '#email-field');
                processError(msg, obj, 'password', '#password', '#password-field');
            }
        }

        function processError(msg, obj, email, input, validation) {
            if (jQuery.inArray(email, obj) == '-1') {
                $(input).removeClass('is-invalid');
                $(validation).html('');
            } else {
                $(input).addClass('is-invalid');
                $(validation).html('<strong>'+msg[email][0]+'</strong>');
            }
        }
    </script>
@endsection

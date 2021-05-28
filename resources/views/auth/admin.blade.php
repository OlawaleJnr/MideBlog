@extends('layouts.adminlogin')

@section('title')
    <title>Mide's Blog - Administrator Acess</title>
@endsection

@section('content')
	<div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<div class="auth-wrapper auth-v1 px-2">
					<div class="auth-inner py-2">
						<!-- Login v1 -->
						<div class="card mb-0">
							<div class="card-body">
								<a href="javascript:void(0);" class="brand-logo">
									<img class="logo-size" src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Mide-logo-black">
								</a>
								
								<h4 class="card-title mb-1" style="font-family:PTSans; text-transform: capitalize;">Welcome to Mide's Blog! 👋</h4>
								<p class="card-text mb-2" style="font-family:Roboto; text-transform: capitalize;">Please sign-in to your account and start the adventure</p>
								
								<form class="auth-login-form pt-3" autocomplete="off" id="adminLoginForm" >
									@csrf
									{{-- Email Address --}}
									<div class="form-group">
										<label for="email" class="form-label" style="font-family:PTSans; text-transform: capitalize;">Email Address</label>
										<input
											type="email"
											class="form-control"
											id="email"
											name="email"
											placeholder="E-mail Address"
											tabindex="1"
											required 
											autofocus
											style="font-family:Roboto;"
										/>
										<span id="email-field" class="invalid-feedback" role="alert"> </span>
									</div>

									
									{{-- Password --}}
									<div class="form-group">
										<label for="password" class="form-label" style="font-family:PTSans; text-transform: capitalize;">Password</label>
										<div class="input-group input-group-merge form-password-toggle">
											<input												
												type="password" 
												name="password"  
												id="password" 
												class="form-control form-control-merge"
												tabindex="2"
												placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
												required
												style="font-family:Roboto;"
											/>
											<div class="input-group-append">
												<span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
											</div>
										</div>
										<span id="password-field" class="invalid-feedback" role="alert"></span>
									</div>
									
									<div class="form-group">
										<div class="custom-control custom-checkbox">
										  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} tabindex="3" />
										  <label class="custom-control-label" style="font-family:PTSans;" for="remember">{{ __('Remember Me') }}</label>
										</div>
									</div>
									
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit" tabindex="4">{{ __('Sign in') }}</button>
									</div>
								</form>

								<p class="text-center mt-2">
									<span>New on our platform?</span>
									<a href="page-auth-register-v1.html">
										<span>Create an account</span>
									</a>
								</p>

								<div class="divider my-2">
									<div class="divider-text">or</div>
								</div>

								<p class="text-center mt-2">
									<span>New on our platform?</span>
									<a href="page-auth-register-v1.html">
										<span>Create an account</span>
									</a>
								</p>
							</div>
						</div>
						<!-- /Login v1 -->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/vendor/vendors.min.js') }}"></script>
	<script src="{{ asset('js/app-menu.min.js') }}"></script>
	<script src="{{ asset('js/app.min.js') }}"></script>
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
	<script>
		$(window).on('load',  function(){
			if (feather) {
			feather.replace({ width: 14, height: 14 });
			}
		})
    </script>
@endsection

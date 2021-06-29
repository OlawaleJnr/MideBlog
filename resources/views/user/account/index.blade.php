@extends('layouts.dashboard')

@section('vendor-css')
	<link href="{{ asset('css/dashboard/flatpickr.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/toastr.min.css') }}" rel="stylesheet" />
@endsection

@section('page-css')
	<link href="{{ asset('css/dashboard/form-pickadate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/form-flat-pickr.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/ext-component-toastr.min.css') }}" rel="stylesheet" />
@endsection

@section('title')
	<title>Mide's Blog | Account Settings</title>
@endsection


@section('content')
	<!-- BEGIN: Content-->
    <div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-9 col-12 mb-2">
					<div class="row breadcrumbs-top">
						<div class="col-12">
							<h2 class="content-header-title float-left mb-0 ptsans">Account Settings</h2>
							<div class="breadcrumb-wrapper">
								<ol class="breadcrumb">
									<li class="breadcrumb-item roboto"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active roboto"> Account Settings</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
					<div class="form-group breadcrumb-right">
						<div class="dropdown">
							<button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
							<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- account setting page -->
			<section id="page-account-settings">
				<div class="row">
					<!-- left menu section -->
					<div class="col-md-3 mb-2 mb-md-0">
						<ul class="nav nav-pills flex-column nav-left">
							<!-- general -->
							<li class="nav-item">
								<a
									class="nav-link active"
									id="account-pill-general"
									data-toggle="pill"
									href="#account-settings-general"
									aria-expanded="true"
								>
									<i data-feather="user" class="font-medium-3 mr-1"></i>
									<span class="font-weight-bold ptsans">General</span>
								</a>
							</li>
							
							<!-- change password -->
							<li class="nav-item">
								<a
									class="nav-link"
									id="account-pill-password"
									data-toggle="pill"
									href="#account-settings-password"
									aria-expanded="false"
								>
									<i data-feather="lock" class="font-medium-3 mr-1"></i>
									<span class="font-weight-bold ptsans">Change Password</span>
								</a>
							</li>
							
							<!-- information -->
							<li class="nav-item">
								<a
									class="nav-link"
									id="account-pill-info"
									data-toggle="pill"
									href="#account-settings-info"
									aria-expanded="false"
								>
									<i data-feather="info" class="font-medium-3 mr-1"></i>
									<span class="font-weight-bold ptsans">Information</span>
								</a>
							</li>
							
							<!-- social -->
							<li class="nav-item">
								<a
									class="nav-link"
									id="account-pill-social"
									data-toggle="pill"
									href="#account-settings-social"
									aria-expanded="false"
								>
									<i data-feather="link" class="font-medium-3 mr-1"></i>
									<span class="font-weight-bold ptsans">Social</span>
								</a>
							</li>
							
							<!-- notification -->
							<li class="nav-item">
								<a
									class="nav-link"
									id="account-pill-notifications"
									data-toggle="pill"
									href="#account-settings-notifications"
									aria-expanded="false"
								>
									<i data-feather="bell" class="font-medium-3 mr-1"></i>
									<span class="font-weight-bold ptsans">Notifications</span>
								</a>
							</li>
						</ul>
					</div>
					
					<!-- right content section -->
					<div class="col-md-9">
						<div class="card"> 
							<div class="card-body">
								<div class="tab-content">
									<!-- general tab -->
									<div
										role="tabpanel"
										class="tab-pane active"
										id="account-settings-general"
										aria-labelledby="account-pill-general"
										aria-expanded="true"
									>
										<!-- header media -->
										<div class="media">
											<a href="javascript:void(0);" class="mr-25">
												<img
													src="{{ Auth::guard('web')->user()->picture }}"
													id="account-upload-img"
													class="rounded mr-50"
													alt="avatar"
													height="80"
													width="80"
												/>
											</a>
											<!-- upload and reset button -->
											<div class="media-body mt-75 ml-1">
												<form id="uploadUserProfile" action="javascript:void(0)" enctype="multipart/form-data">
													@csrf
													<label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Choose</label>
													<input type="file" name="picture" id="account-upload" hidden accept="image/*" />
													<button type="submit" id="uploadUserProfileButton"  class="btn btn-sm btn-outline-secondary mb-75">Upload</button>
													<p>Allowed JPG, GIF or PNG. Max size of 2048kb</p>
												</form>
											</div>
											<!--/ upload and reset button -->
										</div>
										<!--/ header media -->
										
										<!-- form -->
										<form id="updateUserDetails" class="form form-block form-vertical mt-2" autocomplete="off">
											<div class="row">
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="name">Name</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="user"></i></span>
															</div>
															<input
															  type="text"
															  id="name"
															  class="form-control"
															  name="name"
															  value="{{ Auth::guard('web')->user()->name }}"
															  placeholder="Mide's Blog"
															/>
														</div>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="username">Username</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="user"></i></span>
															</div>
															<input
															  type="text"
															  id="username"
															  class="form-control"
															  name="username"
															  value="{{ Auth::guard('web')->user()->username }}"
															  placeholder="MideBlog001"
															/>
														</div>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="email">Email Address</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="mail"></i></span>
															</div>
															<input
															  type="email"
															  id="email"
															  class="form-control"
															  name="email"
															  value="{{ Auth::guard('web')->user()->email }}"
															  placeholder="user@mideblog.com"
															/>
														</div>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="company">Company</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="aperture"></i></span>
															</div>
															<input
															  type="text"
															  id="company"
															  class="form-control"
															  name="company"
															  placeholder="Mide Technologies"
															  value="{{ Auth::guard('web')->user()->company }}"
															/>
														</div>
													</div>
												</div>
												
												<!-- Verification -->
												<div class="col-12 mt-75">
													<div class="alert alert-warning mb-50" role="alert">
														<h4 class="alert-heading">Your email is not confirmed. Please check your inbox.</h4>
														<div class="alert-body">
															<a href="javascript: void(0);" class="alert-link">Resend confirmation</a>
														</div>
													</div>
												</div>
												
												<div class="col-12">
													<button type="submit" id="updateUserDetailsButton" class="btn btn-primary mt-2 mr-1">Save changes</button>
													<button type="reset" class="btn btn-outline-secondary mt-2">Reset</button>
												</div>
											</div>
										</form>
									</div>
									<!--/ End general tab -->
									
									<!-- change password -->
									<div
										class="tab-pane fade"
										id="account-settings-password"
										role="tabpanel"
										aria-labelledby="account-pill-password"
										aria-expanded="false"
									>
										<!-- form -->
										<form id="updateUserPassword" class="form form-block form-vertical" autocomplete="off">
											<div class="row">
												<div class="col-12 col-sm-6">
													<div class="form-group"> 
														<label for="password">Current Password</label>
														<input
															type="password"
															id="current-password"
															class="form-control"
															name="current-password"
															placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
														/>
														<span id="current-password-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-sm-6">
													<div class="form-group"> 
														<label for="password">New Password</label>
														<input
															type="password"
															id="password"
															class="form-control"
															name="password"
															placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
														/>
														<span id="password-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group"> 
														<label for="password">Retype New Password</label>
														<input
															type="password"
															id="confirm-password"
															class="form-control"
															name="confirm-password"
															placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
														/>
														<span id="confirm-password-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12">
													<button type="submit" id="updateUserPasswordButton" class="btn btn-primary mt-2 mr-1">Save changes</button>
													<button type="reset" class="btn btn-outline-secondary mt-2">Reset</button>
												</div>
											</div>
										</form>
									</div>
									<!-- End Chnage Password -->
									
									<!-- Information -->
									<div
										class="tab-pane fade"
										id="account-settings-info"
										role="tabpanel"
										aria-labelledby="account-pill-info"
										aria-expanded="false"
									>
										<form id="updateUserInformation" class="form form-block form-vertical mt-2" autocomplete="off">
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<label for="bio">Bio</label>
														<textarea
															class="form-control"
															id="bio"
															name="bio"
															rows="4"
															placeholder="Your Bio data here..."
														>{{ Auth::guard('web')->user()->information ? Auth::guard('web')->user()->information->bio : '' }}</textarea>
														<span id="bio-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="dob">Birth date</label>
														<input
															type="text"
															id="account-birth-date"
															class="form-control flatpickr"
															name="dob"
															placeholder="YY-MM-DD"
															value="{{ Auth::guard('web')->user()->information ? Auth::guard('web')->user()->information->dob : '' }}"
														/>
														<span id="dob-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="country">Country</label>
														<select class="select2 form-control" id="country" name="country">
															<option value="">Select an option</option>
															<option value="NIGERIA">Nigeria</option>
															<option value="USA">USA</option>
															<option value="INDIA">India</option>
															<option value="CANADA">Canada</option>
														</select>
														<span id="country-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="website">Personal Website</label>
														<input
															type="text"
															id="website"
															class="form-control"
															name="website"
															placeholder="http://mideblog.herokuapp.com"
															value="{{ Auth::guard('web')->user()->information ? Auth::guard('web')->user()->information->website : '' }}"
														/>
														<span id="website-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="mobileNumber">Mobile Number</label>
														<input
															type="text"
															id="mobileNumber"
															class="form-control"
															name="mobileNumber"
															placeholder="(+656) 254 2568"
															value="{{ Auth::guard('web')->user()->information ? Auth::guard('web')->user()->information->mobileNumber : '' }}"
														/>
														<span id="mobileNumber-field" class="invalid-feedback" role="alert"> </span>
													</div>
												</div>
												<div class="col-12">
													<button type="submit" id="updateUserInformationButton" class="btn btn-primary mt-1 mr-1">Save changes</button>
													<button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
												</div>
											</div>
										</form>
									</div>
									<!-- End Information -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/dashboard/flatpickr.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/select2.full.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/form-select2.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/toastr.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/page-account-settings.min.js') }}"></script>
	<!-- Handle Profile Image Upload -->
	<script>
		// Load progress bar
        loadProgressBar();
		$(document).on('submit', '#uploadUserProfile', function (event) {
			loadSpinner('#uploadUserProfileButton');
			event.preventDefault();
			let picture = document.getElementById('account-upload').files[0];
			let data = new FormData();
			data.append('picture', picture);
			try {
				axios.post("{{ route('user.uploadAvatar') }}", data, {
					headers: {
						'Content-Type': 'multipart/form-data',
					}
				})
				.then((result) => {
					toastr.success(
						'"👋 '+result.data.success+'"',
						"User Avatar Upload Successful",
						{ showMethod: "slideDown", hideMethod: "slideUp", timeOut: 5e3, positionClass: "toast-top-right",  progressBar: !0 }
					);
					setTimeout(() => {
						window.location = result.data.redirectTo;
					}, 5400)
					removeSpinner('#uploadUserProfileButton', 'Upload');
				}).catch((err) => {
					console.log(err)
					if(err.response.data.error != undefined)
					{
						var obj = Object.keys(err.response.data.error);
						if (jQuery.inArray('picture', obj) == '-1') {
							console.log("Picture field validated");
						} else {
							const error = err.response.data.error['picture'][0];
							toastr.error(
								'"👋 '+error+'"',
								"User Avatar Upload Error",
								{ showMethod: "slideDown", hideMethod: "slideUp", timeOut: 5e3, positionClass: "toast-top-right",  progressBar: !0 }
							);
						}
					}
					removeSpinner('#uploadUserProfileButton', 'Upload')
				});
			} catch(error) {
				toastr.error(
					'"👋 The server cannot meet the requirements of the expected request-header field"',
					"500 - Server Error",
					{ showMethod: "slideDown", hideMethod: "slideUp", timeOut: 5e3, positionClass: "toast-top-right",  progressBar: !0 }
				);
			}
		});
		
		function loadSpinner(item) {
            $(item).attr('disabled', true);
            $(item).html('<div><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="ml-25 align-middle">Processing...</span></div>');
        }
		
		function removeSpinner(item, message) {
            $(item).attr('disabled', false);
            $(item).html(message);
        }
	</script>
	
	<!-- Handle Password Field Update -->
	<script>
		$(document).on('submit', '#updateUserPassword', function (event) {
			loadChangePasswordSpinner('#updateUserPasswordButton');
			event.preventDefault();
			const formSection = $('.form-block');
			let data = $(this).serialize();
			try {
				axios.post("{{ route('user.updatePassword') }}", data)
				.then((result) => {
					// Form Block Section
					formSection.block({
						message: '<div class="spinner-border text-primary" role="status"></div><br><p class="mt-1">Please Wait...</p>',
						timeout: 1000,
						css: {
							backgroundColor: 'transparent',
							border: '0'
						},
						overlayCSS: {
							backgroundColor: '#fff',
							opacity: 0.8
						}
					});
					// Remove Error Message
					$('#current-password').removeClass('is-invalid');
					$('#current-password-field').html('');
					$('#password').removeClass('is-invalid');
					$('#password-field').html('');
					$('#confirm-password').removeClass('is-invalid');
					$('#confirm-password-field').html('');
					//Toastr Message
					toastr.success(
						'"👋 '+result.data.success+'"',
						"Profile Update Successful",
						{ showMethod: "slideDown", hideMethod: "slideUp", timeOut: 5e3, positionClass: "toast-top-right",  progressBar: !0 }
					);
					// set spinner to initial state
					removeChangePasswordSpinner('#updateUserPasswordButton', 'Save Changes')
				}).catch((err) => {
					console.log(err);
					printChangePasswordErrorMsg(err.response.data.error)
					removeChangePasswordSpinner('#updateUserPasswordButton', 'Save Changes')
				});
			}catch(error) {
				
			}
		});
		
		function printChangePasswordErrorMsg(msg) {
            if (msg != undefined) {
                var obj = Object.keys(msg);
                processChangePasswordError(msg, obj, 'current-password', '#current-password', '#current-password-field');
                processChangePasswordError(msg, obj, 'password', '#password', '#password-field');
				processChangePasswordError(msg, obj, 'confirm-password', '#confirm-password', '#confirm-password-field');
            }
        }
		
		function processChangePasswordError(msg, obj, name_field, input, validation) {
            if (jQuery.inArray(name_field, obj) == '-1') {
                $(input).removeClass('is-invalid');
                $(validation).html('');
            } else {
                $(input).addClass('is-invalid');
                $(validation).html('<strong>'+msg[name_field][0]+'</strong>');
            }
        }
		
		function loadChangePasswordSpinner(item) {
            $(item).attr('disabled', true);
            $(item).html('<div><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="ml-25 align-middle">Processing...</span></div>');
        }
		
		function removeChangePasswordSpinner(item, message) {
            $(item).attr('disabled', false);
            $(item).html(message);
        }
	</script>
	
	<!-- Handle Information Field Update -->
	<script>
		$(document).on('submit', '#updateUserInformation', function (event) {
			loadChangeInformationSpinner('#updateUserInformationButton');
			event.preventDefault();
			const formSection = $('.form-block');
			let data = $(this).serialize();
			try {
				axios.post("{{ route('user.updateInformation') }}", data)
				.then((result) => {
					// Form Block Section
					formSection.block({
						message: '<div class="spinner-border text-primary" role="status"></div><br><p class="mt-1">Updating... Please wait a moment...</p>',
						timeout: 1000,
						css: {
							backgroundColor: 'transparent',
							border: '0'
						},
						overlayCSS: {
							backgroundColor: '#fff',
							opacity: 0.8
						}
					});
					// Remove Error Message
					$('#bio').removeClass('is-invalid');
					$('#bio-field').html('');
					$('#account-birth-date').removeClass('is-invalid');
					$('#account-birth-date +.flatpickr').removeClass('is-invalid');
					$('#dob-field').html('');
					$('#country + span.select2-container > .selection > span').removeClass('is-invalid');
					$('#country-field').html('');
					$('#website').removeClass('is-invalid');
					$('#website-field').html('');
					$('#mobileNumber').removeClass('is-invalid');
					$('#mobileNumber-field').html('');
					//Toastr Message
					toastr.success(
						'"👋 '+result.data.success+'"',
						"Profile Info Update Successful",
						{ showMethod: "slideDown", hideMethod: "slideUp", timeOut: 5e3, positionClass: "toast-top-right",  progressBar: !0 }
					);
					// set spinner to initial state
					removeChangeInformationSpinner('#updateUserInformationButton', 'Save Changes')
				}).catch((err) => {
					console.log(err);
					printChangeInformationErrorMsg(err.response.data.error)
					removeChangeInformationSpinner('#updateUserInformationButton', 'Save Changes')
				});
			}catch(error) {
				
			}
		});
		
		function printChangeInformationErrorMsg(msg) {
            if (msg != undefined) {
                var obj = Object.keys(msg);
                processChangeInformationError(msg, obj, 'bio', '#bio', '#bio-field');
				processChangeInformationError(msg, obj, 'dob', '#account-birth-date', '#dob-field');
                processChangeInformationError(msg, obj, 'dob', '#account-birth-date +.flatpickr', '#dob-field');
				processChangeInformationError(msg, obj, 'country', '#country + span.select2-container > .selection > span', '#country-field');
				processChangeInformationError(msg, obj, 'website', '#website', '#website-field');
				processChangeInformationError(msg, obj, 'mobileNumber', '#mobileNumber', '#mobileNumber-field');
            }
        }
		
		function processChangeInformationError(msg, obj, name_field, input, validation) {
            if (jQuery.inArray(name_field, obj) == '-1') {
                $(input).removeClass('is-invalid');
                $(validation).html('');
            } else {
                $(input).addClass('is-invalid');
                $(validation).html('<strong>'+msg[name_field][0]+'</strong>');
            }
        }
		
		function loadChangeInformationSpinner(item) {
            $(item).attr('disabled', true);
            $(item).html('<div><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="ml-25 align-middle">Processing...</span></div>');
        }
		
		function removeChangeInformationSpinner(item, message) {
            $(item).attr('disabled', false);
            $(item).html(message);
        }
	</script>
@endsection

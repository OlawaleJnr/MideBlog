@extends('layouts.dashboard', compact('notification'))

@section('vendor-css')
	<link href="{{ asset('css/dashboard/toastr.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('page-css')
	<link href="{{ asset('css/dashboard/app-user.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/ext-component-toastr.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/custom.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/jquery.scrollbar.css') }}" rel="stylesheet" />
@endsection

@section('title')
	<title>Mide's Blog | Profile</title>
@endsection


@section('content')
	<!-- BEGIN: Content-->
    <div class="app-content content ">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row"></div>
			<div class="content-body">
				<section class="app-user-view">
					<!-- User Card & Plan Starts -->
					<div class="row">
						<!-- User Card starts-->
						<div class="col-xl-9 col-lg-8 col-md-7">
							<div class="card user-card">
								<div class="card-body">
									<div class="row">
										<div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
											<div class="user-avatar-section">
												<div class="d-flex justify-content-start">
													<img
														class="img-fluid rounded"
														src="{{ Auth::guard('web')->user()->picture }}"
														height="104"
														width="104"
														alt="User avatar"
													/>
													<div class="d-flex flex-column ml-1">
														<div class="user-info mb-1">
															<h4 class="mb-0">{{ Auth::guard('web')->user()->name }}</h4>
															<span class="card-text">{{ Auth::guard('web')->user()->email }}</span>
														</div>
														<div class="d-flex flex-wrap">
															<button class="btn btn-outline-danger ml-1">Request Account Deletion</button>
													  </div>
													</div>
												</div>
											</div>
											<div class="d-flex align-items-center user-total-numbers">
												<div class="d-flex align-items-center mr-2">
													<div class="color-box bg-light-primary">
													<i data-feather="user-plus" class="text-primary"></i>
												</div>
												<div class="ml-1">
													<h5 class="mb-0">{{ $following->count() }}</h5>
													<small>Following</small>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<div class="color-box bg-light-success">
													<i data-feather="users" class="text-success"></i>
												</div>
												<div class="ml-1">
													<h5 class="mb-0">{{ $followers->count() }}</h5>
													<small>Followers</small>
												</div>
											  </div>
											</div>
										</div>
										<div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
											<div class="user-info-wrapper">
												<div class="d-flex flex-wrap">
													<div class="user-info-title">
														<i data-feather="user" class="mr-1"></i>
														<span class="card-text user-info-title font-weight-bold mb-0">Username</span>
													</div>
													<p class="card-text mb-0">{{ Auth::guard('web')->user()->username }}</p>
												</div>
												<div class="d-flex flex-wrap my-50">
													<div class="user-info-title">
														<i data-feather="check" class="mr-1"></i>
														<span class="card-text user-info-title font-weight-bold mb-0">Status</span>
													</div>
													<p class="card-text mb-0">
														@if(Auth::guard('web')->user()->is_active == 0)
															Not Active
														@else
															Active
														@endif
													</p>
												</div>
												<div class="d-flex flex-wrap my-50">
													<div class="user-info-title">
														<i data-feather="star" class="mr-1"></i>
														<span class="card-text user-info-title font-weight-bold mb-0">Role</span>
													</div>
													<p class="card-text mb-0">
														@if(checkUserPermission(['user']))
															User
														@endif
														@if(checkUserPermission(['author']))
															Author
														@endif
													</p>
												</div>
												<div class="d-flex flex-wrap my-50">
													<div class="user-info-title">
														<i data-feather="flag" class="mr-1"></i>
														<span class="card-text user-info-title font-weight-bold mb-0">Country</span>
													</div>
													<p class="card-text mb-0">{{ Auth::guard('web')->user()->information ? Auth::guard('web')->user()->information->country : 'Null' }}</p>
												</div>
												<div class="d-flex flex-wrap">
													<div class="user-info-title">
														<i data-feather="phone" class="mr-1"></i>
														<span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
													</div>
													<p class="card-text mb-0">{{ Auth::guard('web')->user()->information ? Auth::guard('web')->user()->information->mobileNumber : 'Null' }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Plan Card starts-->
						<div class="col-xl-3 col-lg-4 col-md-5">
							<div class="card plan-card border-primary">
								<div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
									<h5 class="mb-0">Current Permission</h5>
									<span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top" title="Expiry Date">
										July 22, 	<span class="nextYear"></span>
									</span>
								</div>
								<div class="card-body">
									<div class="badge badge-light-primary">
										@if(checkUserPermission(['user']))
											User
										@endif
										@if(checkUserPermission(['author']))
											Author
										@endif
									</div>
									<ul class="list-unstyled my-1">
										<li>
											<span class="align-middle">5 Users</span>
										</li>
										<li class="my-25">
											<span class="align-middle">10 GB storage</span>
										</li>
										<li>
											<span class="align-middle">Basic Support</span>
										</li>
									</ul>
									<button class="btn btn-primary text-center btn-block">Upgrade Permission</button>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- Tabs with Icon starts -->
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="card">
						<div class="card-header">
						  <h4 class="card-title">Activity</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="activityIcon-tab" data-toggle="tab" href="#activityIcon" aria-controls="activity" role="tab" aria-selected="true">
										<i data-feather="activity"></i> Activity
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="followersIcon-tab" data-toggle="tab" href="#followersIcon" aria-controls="followers" role="tab" aria-selected="false">
										<i data-feather="users"></i> Followers
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="followingIcon-tab" data-toggle="tab" href="#followingIcon" aria-controls="following" role="tab" aria-selected="false">
										<i data-feather="user-plus"></i> Following
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="activityIcon" aria-labelledby="activityIcon-tab" role="tabpanel">

								</div>

								<div class="tab-pane" id="followersIcon" aria-labelledby="followersIcon-tab" role="tabpanel">
									<div class="scrollbar-inner">
										<div class="scrollbar-inner_2">
											@if($followers->count() > 0)
												@foreach($followers as $follower)
													<div class="list-group following_you clearfix">
														<div class="list-group-item d-inline-block">
															<div class="user_profile_image" style="background : url('{{ $follower->user1->picture }}'); width: 20px; height: 20px; background-size: cover; background-position: center; background-repeat: no-repeat; border-radius: 100px; float: left; margin-right: 20px;">
															</div>
															<div class="followingship-username float-left">{{ $follower->user1->name }}</div>
															<button class="float-right following followingship-status">Following</button>
														</div>
													</div>
												@endforeach
											@else

											@endif

											<div class="load_more_section text-center">
                        <button><i data-feather="refresh-cw"></i><span class="ml-1">Load more</span></button>
                      </div>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="followingIcon" aria-labelledby="followingIcon-tab" role="tabpanel">
									@if($following->count() > 0)
										@foreach($following as $followin)
											<div class="list-group following_you clearfix">
												<div class="list-group-item d-inline-block">
													<div class="user_profile_image" style="background : url('{{ $followin->user2->picture }}'); width: 20px; height: 20px; background-size: cover; background-position: center; background-repeat: no-repeat; border-radius: 100px; float: left; margin-right: 20px;">
													</div>
													<div class="followingship-username float-left">{{ $followin->user2->name }}</div><button class="float-right followed followingship-status">Followed</button>
												</div>
											</div>
										@endforeach
									@else

									@endif

									<div class="load_more_section text-center">
										<button><i data-feather="refresh-cw"></i><span class="ml-1">Load more</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- User Timeline & Permissions Starts
            <div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Permissions</h4>
						</div>
						<p class="card-text ml-2">Permission according to roles</p>
						<div class="table-responsive">
							<table class="table table-striped table-borderless">
								<thead class="thead-light">
									<tr>
										<th>Module</th>
										<th>Read</th>
										<th>Write</th>
										<th>Create</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Author</td>

									</tr>
									<tr>
										<td>User</td>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/dashboard/flatpickr.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/select2.full.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/form-select2.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/toastr.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/page-account-settings.min.js') }}"></script>
	<script src="{{ asset('js/dashboard/jquery.scrollbar.js') }}"></script>
	<!-- Handle Profile Image Upload -->
	<script>
        $(document).ready(function() {
            $('.scrollbar-inner').scrollbar();
        });
    </script>
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
			loadSpinner('#updateUserPasswordButton');
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
					removeSpinner('#updateUserPasswordButton', 'Save Changes')
				}).catch((err) => {
					console.log(err);
					printErrorMsg(err.response.data.error)
					removeSpinner('#updateUserPasswordButton', 'Save Changes')
				});
			}catch(error) {

			}
		});

		function printErrorMsg(msg) {
            if (msg != undefined) {
                var obj = Object.keys(msg);
                processError(msg, obj, 'current-password', '#current-password', '#current-password-field');
                processError(msg, obj, 'password', '#password', '#password-field');
				processError(msg, obj, 'confirm-password', '#confirm-password', '#confirm-password-field');
            }
        }

		function processError(msg, obj, name_field, input, validation) {
            if (jQuery.inArray(name_field, obj) == '-1') {
                $(input).removeClass('is-invalid');
                $(validation).html('');
            } else {
                $(input).addClass('is-invalid');
                $(validation).html('<strong>'+msg[name_field][0]+'</strong>');
            }
        }

		function loadSpinner(item) {
            $(item).attr('disabled', true);
            $(item).html('<div><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="ml-25 align-middle">Processing...</span></div>');
        }

		function removeSpinner(item, message) {
            $(item).attr('disabled', false);
            $(item).html(message);
        }
	</script>

	<!-- Handle Information Field Update -->
	<script>
		$(document).on('submit', '#updateUserInformation', function (event) {
			loadSpinner('#updateUserInformationButton');
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
					removeSpinner('#updateUserInformationButton', 'Save Changes')
				}).catch((err) => {
					console.log(err);
					printErrorMsg(err.response.data.error)
					removeSpinner('#updateUserInformationButton', 'Save Changes')
				});
			}catch(error) {

			}
		});

		function printErrorMsg(msg) {
            if (msg != undefined) {
                var obj = Object.keys(msg);
                processError(msg, obj, 'bio', '#bio', '#bio-field');
				processError(msg, obj, 'dob', '#account-birth-date', '#dob-field');
                processError(msg, obj, 'dob', '#account-birth-date +.flatpickr', '#dob-field');
				processError(msg, obj, 'country', '#country + span.select2-container > .selection > span', '#country-field');
				processError(msg, obj, 'website', '#website', '#website-field');
				processError(msg, obj, 'mobileNumber', '#mobileNumber', '#mobileNumber-field');
            }
        }

		function processError(msg, obj, name_field, input, validation) {
            if (jQuery.inArray(name_field, obj) == '-1') {
                $(input).removeClass('is-invalid');
                $(validation).html('');
            } else {
                $(input).addClass('is-invalid');
                $(validation).html('<strong>'+msg[name_field][0]+'</strong>');
            }
        }

		function loadSpinner(item) {
            $(item).attr('disabled', true);
            $(item).html('<div><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="ml-25 align-middle">Processing...</span></div>');
        }

		function removeSpinner(item, message) {
            $(item).attr('disabled', false);
            $(item).html(message);
        }
	</script>
@endsection

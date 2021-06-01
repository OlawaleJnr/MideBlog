@extends('layouts.dashboard')

@section('vendor-css')
	<link href="{{ asset('css/dashboard/flatpickr.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('page-css')
	<link href="{{ asset('css/dashboard/form-pickadate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/dashboard/form-flat-pickr.min.css') }}" rel="stylesheet" />
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
													src="../../../app-assets/images/portrait/small/avatar-s-11.jpg"
													id="account-upload-img"
													class="rounded mr-50"
													alt="profile image"
													height="80"
													width="80"
												/>
											</a>
											<!-- upload and reset button -->
											<div class="media-body mt-75 ml-1">
												<label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
												<input type="file" id="account-upload" hidden accept="image/*" />
												<button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
												<p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
											</div>
											<!--/ upload and reset button -->
										</div>
										<!--/ header media -->
										
										<!-- form -->
										<form class="form form-vertical mt-2" autocomplete="off">
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
													<button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
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
										<form class="form form-vertical" autocomplete="off">
											<div class="row">
												<div class="col-12 col-sm-6">
													<div class="form-group"> 
														<label for="password">Old Password</label>
														<div class="input-group form-password-toggle input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="lock"></i></span>
															</div>
															<input
																type="password"
																id="name"
																class="form-control"
																name="name"
																placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
															/>
															<div class="input-group-append">
																<div class="input-group-text cursor-pointer">
																	<i data-feather="eye"></i>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-12 col-sm-6">
													<div class="form-group"> 
														<label for="password">New Password</label>
														<div class="input-group form-password-toggle input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="lock"></i></span>
															</div>
															<input
																type="password"
																id="name"
																class="form-control"
																name="name"
																placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
															/>
															<div class="input-group-append">
																<div class="input-group-text cursor-pointer">
																	<i data-feather="eye"></i>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group"> 
														<label for="password">Retype New Password</label>
														<div class="input-group form-password-toggle input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="lock"></i></span>
															</div>
															<input
																type="password"
																id="name"
																class="form-control"
																name="name"
																placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
															/>
															<div class="input-group-append">
																<div class="input-group-text cursor-pointer">
																	<i data-feather="eye"></i>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
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
										<form class="form form-vertical mt-2" autocomplete="off">
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
														></textarea>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="dob">Birth date</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="calendar"></i></span>
															</div>
															<input
															  type="text"
															  id="account-birth-date"
															  class="form-control flatpickr"
															  name="dob"
															  placeholder="YY-MM-DD"
															/>
														</div>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="country">Country</label>
														<select class="select2 form-control" id="country">
															<option>Nigeria</option>
															<option>USA</option>
															<option>India</option>
															<option>Canada</option>
														</select>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="website">Personal Website</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="airplay"></i></span>
															</div>
															<input
															  type="text"
															  id="website"
															  class="form-control"
															  name="website"
															  placeholder="http://mideblog.herokuapp.com"
															/>
														</div>
													</div>
												</div>
												<div class="col-12 col-sm-6">
													<div class="form-group">
														<label for="mobileNumber">Mobile Number</label>
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text"><i data-feather="phone"></i></span>
															</div>
															<input
															  type="text"
															  id="mobileNumber"
															  class="form-control"
															  name="mobileNumber"
															  placeholder="(+656) 254 2568"
															/>
														</div>
													</div>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-primary mt-1 mr-1">Save changes</button>
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
	<script src="{{ asset('js/dashboard/page-account-settings.min.js') }}"></script>
@endsection

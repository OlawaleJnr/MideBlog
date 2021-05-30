<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui" />
		<meta name="author" content="Talabi Ayomide" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		@yield('title')
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
		<!-- BEGIN: Vendor CSS-->
		<link href="{{ asset('css/dashboard/vendors.min.css') }}" rel="stylesheet" />
		<!-- BEGIN: Theme CSS-->
		<link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/dashboard/bootstrap-extended.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/dashboard/colors.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/dashboard/components.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/dashboard/dark-layout.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/dashboard/bordered-layout.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/dashboard/semi-dark-layout.min.css') }}" rel="stylesheet" />
		<!-- BEGIN: Page CSS-->
		<link href="{{ asset('css/dashboard/vertical-menu.min.css') }}" rel="stylesheet" />
		<!-- BEGIN: Custom CSS-->
		<link href="{{ asset('css/dashboard/style.css') }}" rel="stylesheet" />
	</head>
	<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
		<!-- BEGIN: Header-->
		<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
			<div class="navbar-container d-flex content">
				<div class="bookmark-wrapper d-flex align-items-center">
					<!-- BEGIN: Menu-->
					<ul class="nav navbar-nav d-xl-none">
						<li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
					</ul>
					<!-- BEGIN: Left Side Icons-->
					<ul class="nav navbar-nav bookmark-icons">
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
					</ul>
					<!-- BEGIN: Book Mark Icon-->
					<ul class="nav navbar-nav">
						<li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
							<div class="bookmark-input search-input">
								<div class="bookmark-input-icon"><i data-feather="search"></i></div>
								<input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
								<ul class="search-list search-list-bookmark"></ul>
							</div>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav align-items-center ml-auto">
					<!-- BEGIN: Language Features-->
					<li class="nav-item dropdown dropdown-language">
						<a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flag-icon flag-icon-us"></i>
							<span class="selected-language">English</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
							<a class="dropdown-item" href="javascript:void(0);" data-language="en">
								<i class="flag-icon flag-icon-us"></i> English
							</a>
							<a class="dropdown-item" href="javascript:void(0);" data-language="fr">
								<i class="flag-icon flag-icon-fr"></i> French
							</a>
							<a class="dropdown-item" href="javascript:void(0);" data-language="de">
								<i class="flag-icon flag-icon-de"></i> German
							</a>
							<a class="dropdown-item" href="javascript:void(0);" data-language="pt">
								<i class="flag-icon flag-icon-pt"></i> Portuguese
							</a>
						</div>
					</li>
					<!-- BEGIN: Dark Mode-->
					<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
					<li class="nav-item nav-search">
						<a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
						<div class="search-input">
							<div class="search-input-icon"><i data-feather="search"></i></div>
							<input class="form-control input" type="text" placeholder="Explore Mide's Blog..." tabindex="-1" data-search="search">
							<div class="search-input-close"><i data-feather="x"></i></div>
							<ul class="search-list search-list-main"></ul>
						</div>
					</li>
					<!-- BEGIN: Notification Features -->
					<li class="nav-item dropdown dropdown-notification mr-25">
						<a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
							<i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up">5</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
							<li class="dropdown-menu-header">
								<div class="dropdown-header d-flex">
									<h4 class="notification-title mb-0 mr-auto">Notifications</h4>
									<div class="badge badge-pill badge-light-primary">6 New</div>
								</div>
							</li>
							<li class="scrollable-container media-list">
								<a class="d-flex" href="javascript:void(0)">
									<div class="media d-flex align-items-start">
										<div class="media-left">
											<div class="avatar">
												<img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32">
											</div>
										</div>
										<div class="media-body">
											<p class="media-heading"><span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!</p>
											<small class="notification-text"> Won the monthly best seller badge.</small>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</li>
					<!-- Profile Management -->
					<li class="nav-item dropdown dropdown-user">
						<a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="user-nav d-sm-flex d-none">
								<span class="user-name font-weight-bolder">John Doe</span>
								<span class="user-status">Admin</span>
							</div>
							<span class="avatar">
								<img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
								<span class="avatar-status-online"></span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
							<a class="dropdown-item" href="page-profile.html">
								<i class="mr-50" data-feather="user"></i> Profile
							</a>
							<a class="dropdown-item" href="app-email.html">
								<i class="mr-50" data-feather="mail"></i> Inbox
							</a>
							<a class="dropdown-item" href="app-todo.html">
								<i class="mr-50" data-feather="check-square"></i> Task
							</a>
							<a class="dropdown-item" href="app-chat.html">
								<i class="mr-50" data-feather="message-square"></i> Chats
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="page-account-settings.html">
								<i class="mr-50" data-feather="settings"></i> Settings
							</a>
							<a class="dropdown-item" href="page-pricing.html">
								<i class="mr-50" data-feather="credit-card"></i> Pricing
							</a>
							<a class="dropdown-item" href="page-faq.html">
								<i class="mr-50" data-feather="help-circle"></i> FAQ
							</a>
							<a class="dropdown-item" href="page-auth-login-v2.html">
								<i class="mr-50" data-feather="power"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!-- BEGIN: Main Menu-->
		<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mr-auto">
						<a class="navbar-brand" href="index.html">
							<span class="brand-logo">
								<svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
									<defs>
										<lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
										  <stop stop-color="#000000" offset="0%"></stop>
										  <stop stop-color="#FFFFFF" offset="100%"></stop>
										</lineargradient>
										<lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
										  <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
										  <stop stop-color="#FFFFFF" offset="100%"></stop>
										</lineargradient>
									</defs>
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Artboard" transform="translate(-400.000000, -178.000000)">
											<g id="Group" transform="translate(400.000000, 178.000000)">
												<path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
												<path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
												<polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
												<polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
												<polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
											</g>
										</g>
									</g>
								</svg>
							</span>
							<h2 class="brand-text">Mide's Blog</h2>
						</a>
					</li>
					<li class="nav-item nav-toggle">
						<a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
							<i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
							<i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc">
							</i>
						</a>
					</li>
				</ul>
			</div>
			<div class="shadow-bottom"></div>
			<div class="main-menu-content">
				<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
					<li class=" nav-item">
						<a class="d-flex align-items-center" href="{{ route('home') }}">
							<i data-feather="home"></i>
							<span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
							<span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span>
						</a>
						<ul class="menu-content">
							<li>
								<a class="d-flex align-items-center" href="dashboard-analytics.html">
									<i data-feather="circle"></i>
									<span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span>
								</a>
							</li>
							<li class="active">
								<a class="d-flex align-items-center" href="dashboard-ecommerce.html">
									<i data-feather="circle"></i>
									<span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span>
								</a>
							</li>
						</ul>
					</li>
					<li class=" nav-item">
						<a class="d-flex align-items-center" href="{{ route('user.account.settings') }}">
							<i data-feather="settings"></i>
							<span class="menu-title text-truncate" data-i18n="{{ route('user.account.settings') }}">Account Settings</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		
		
		@yield('content')
		
		<!-- BEGIN: Vendor JS-->
		<script src="{{ asset('js/dashboard/vendors.min.js') }}"></script>
		<script src="{{ asset('js/dashboard/app-menu.min.js') }}"></script>
		<script src="{{ asset('js/dashboard/app.min.js') }}"></script>
		<script src="{{ asset('js/dashboard/customizer.min.js') }}"></script>
		<script src="{{ asset('js/axios.min.js') }}"></script>
		<script src="{{ asset('js/axios-loader.js') }}"></script>
		<script src="{{ asset('js/notiflix-2.7.0.min.js') }}"></script>
		<script>
			$(window).on('load',  function(){
				if (feather) {
				feather.replace({ width: 14, height: 14 });
				}
			});
		</script>
		@yield('scripts')
	</body>
</html>
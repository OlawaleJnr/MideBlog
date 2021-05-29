<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui" />
		<meta name="author" content="Talabi Ayomide" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		@yield('title')
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
		<!-- Styles -->
		<link href="{{ asset('css/vendor/vendors.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/bootstrap-extended.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/components.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/page-auth.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/axios-loader.css') }}" rel="stylesheet">
		<link href="{{ asset('css/notiflix-2.7.0.min.css') }}" rel="stylesheet">
	</head>
	<body  class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
		@yield('content')

		@yield('scripts')
	</body>
</html>
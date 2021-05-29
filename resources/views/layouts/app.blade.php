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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/vendor/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/auth/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/auth/theme-10.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/axios-loader.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/notiflix-2.7.0.min.css') }}" rel="stylesheet" />
  </head>
  <body id="top">
    @yield('content')

    @yield('scripts')
  </body>
</html>

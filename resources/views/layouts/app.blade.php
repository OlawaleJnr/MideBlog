<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('title')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/vendor/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iofrm-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/iofrm-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/axios-loader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notiflix-2.7.0.min.css') }}" rel="stylesheet">
  </head>
  <body>
    @yield('content')

    @yield('scripts')
  </body>
</html>

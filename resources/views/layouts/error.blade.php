<!DOCTYPE html>
<html lang="en"  class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CMSIFY 404 ERROR PAGE">
    <meta name="author" content="TALABI AYOMIDE">
    @yield('error-title')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/vendor/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    @yield('content')


    <!-- Modernizer JS -->
    <script src="{{ asset('js/vendor/modernizr.min.js') }}"></script>
    <!-- Jquery & Bootstrap Js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('js/vendor/tweenmax.min.js') }}"></script>
    <script src="{{ asset('js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.style.switcher.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

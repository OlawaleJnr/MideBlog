<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>

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
    <!-- Toggle Switch Mode -->
    <div class="main-wrapper">
        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript:void(0);" data-theme="light" class="setColor light">
                        <span title="Light Mode">Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-theme="dark" class="setColor dark">
                        <span title="Dark Mode">Dark</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Start Header -->
    <header class="header axil-header  header-light header-sticky header-with-shadow">
        <div class="header-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                    <div class="logo">
                        <a href="index.html">
                            <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Blogar logo">
                            <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Blogar logo">
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a href="#">Home</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="index.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Home Default">Home Default</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="#">Posts</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="post-format-standard.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Post Format Standard">Post Format Standard</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="post-list.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Post List">Post List</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="home-lifestyle-blog.html">Lifestyle</a></li>
                                <li><a href="home-tech-blog.html">Gadgets</a></li>
                            </ul>
                            <!-- End Mainmanu Nav -->
                        </nav>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                    <div class="header-search text-right d-flex align-items-center">
                        <form class="header-search-form">
                            <div class="axil-search form-group">
                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                        <ul class="metabar-block">
                            <li class="icon"><a href="#"><i class="fas fa-bookmark"></i></a></li>
                            <li class="icon"><a href="#"><i class="fas fa-bell"></i></a></li>
                            <!-- Authnticated Author User -->
                            @Auth
                                <li><a href="#"><img src="{{ Auth::user()->avatar ? Auth::user()->avatar->filename : '/storage/images/placeholder.png' }}" alt="Author Images"></a></li>
                            @endAuth
                        </ul>
                        <!-- Start Hamburger Menu  -->
                        <div class="hamburger-menu d-block d-xl-none">
                            <div class="hamburger-inner">
                                <div class="icon"><i class="fal fa-bars"></i></div>
                            </div>
                        </div>
                        <!-- End Hamburger Menu  -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header -->

    <!-- Start Mobile Menu Area  -->
    <div class="popup-mobilemenu-area">
        <div class="inner">
            <div class="mobile-menu-top">
                <div class="logo">
                    <a href="index.html">
                        <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Logo Images">
                        <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Logo Images">
                    </a>
                </div>
                <div class="mobile-close">
                    <div class="icon">
                        <i class="fal fa-times"></i>
                    </div>
                </div>
            </div>
            <ul class="mainmenu">
                <li class="menu-item-has-children"><a href="#">Home</a>
                    <ul class="axil-submenu">
                        <li><a href="index.html">Home Default</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Categories</a>
                    <ul class="axil-submenu">
                        <li><a href="post-details.html">Accessibility</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Post Format</a>
                    <ul class="axil-submenu">
                        <li><a href="post-format-standard.html">Post Format Standard</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Mobile Menu Area  -->

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


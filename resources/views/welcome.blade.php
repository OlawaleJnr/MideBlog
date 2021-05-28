<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mide's Blog | Home</title>
		<meta name="author" content="Talabi Ayomide">
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        {{-- css --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/slick-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/base.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/axios-loader.css') }}" rel="stylesheet">
        <link href="{{ asset('css/notiflix-2.7.0.min.css') }}" rel="stylesheet">
    </head>
    <body>
        {{-- Main Wrapper --}}
        <div class="main-wrapper">
			<div class="mouse-cursor cursor-outer"></div>
			<div class="mouse-cursor cursor-inner"></div>
		
            {{-- Switch Mode --}}
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

            <!-- Start Header -->
            <header class="header axil-header header-style-3  header-light header-sticky ">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <div class="header-top-bar d-flex flex-wrap align-items-center justify-content-center justify-content-md-start">
                                    <ul class="header-top-date liststyle d-flex flrx-wrap align-items-center mr--20">
                                        {{-- Date --}}
                                        <li><a href="javascript:void(0)" id="timeofday"></a></li>
                                    </ul>
                                    {{-- Advertisment --}}
                                    <ul class="header-top-nav liststyle d-flex flrx-wrap align-items-center">
                                        <li><a href="javascript:void(0)">Advertisement</a></li>
                                        <li><a href="javascript:void(0)">About</a></li>
                                        <li><a href="javascript:void(0)">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <ul class="social-share-transparent md-size justify-content-center justify-content-md-end">
                                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-middle">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="logo">
                                    <a href="{{ url('/')}}">
                                        <img class="dark-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Mide-logo-black">
                                        <img class="light-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-white.png') }}" alt="Mide-logo-white">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-6">
                                <div class="banner-add text-right">
                                    <a href="#">
                                        <img src="assets/images/add-banner/add-01.png" alt="Add images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-bottom">
                    <div class="container">
                        <div class="row justify-content-center justify-content-xl-between align-items-center">
                            <div class="col-xl-7 d-none d-xl-block">
                                <div class="mainmenu-wrapper">
                                    <nav class="mainmenu-nav">
                                        <!-- Start Mainmanu Nav -->
                                        <ul class="mainmenu">
                                            {{-- Home --}}
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            {{-- Categories --}}
                                            <li><a href="javascript:void(0)">Explore</a></li>
                                            {{-- Mega Menu --}}
                                            <li class="menu-item-has-children megamenu-wrapper"><a href="#">Mega Menu</a>
                                                <ul class="megamenu-sub-menu">
                                                    <li class="megamenu-item">

                                                        <!-- Start Verticle Nav  -->
                                                        <div class="axil-vertical-nav">
                                                            <ul class="vertical-nav-menu">
                                                                <li class="vertical-nav-item active">
                                                                    <a class="hover-flip-item-wrapper" href="#tab1">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Accessibility">Accessibility</span>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- Start Verticle Nav  -->

                                                        <!-- Start Verticle Menu  -->
                                                        <div class="axil-vertical-nav-content">
                                                            <!-- Start One Item  -->
                                                            <div class="axil-vertical-inner tab-content" id="tab1" style="display: block;">
                                                                <div class="axil-vertical-single">
                                                                    <div class="row">

                                                                        <!-- Start Post List  -->
                                                                        <div class="col-lg-3">
                                                                            <div class="content-block image-rounded">
                                                                                <div class="post-thumbnail mb--20">
                                                                                    <a href="post-details.html">
                                                                                        <img class="w-100" src="assets/images/others/mega-post-01.jpg" alt="Post Images">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="post-content">
                                                                                    <div class="post-cat">
                                                                                        <div class="post-cat-list">
                                                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                                                <span class="hover-flip-item">
                                                                <span data-text="DESIGN">DESIGN</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <h5 class="title"><a href="post-details.html">India may require online shops to hand</a></h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End Post List  -->

                                                                        <!-- Start Post List  -->
                                                                        <div class="col-lg-3">
                                                                            <div class="content-block image-rounded">
                                                                                <div class="post-thumbnail mb--20">
                                                                                    <a href="post-details.html">
                                                                                        <img class="w-100" src="assets/images/others/mega-post-02.jpg" alt="Post Images">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="post-content">
                                                                                    <div class="post-cat">
                                                                                        <div class="post-cat-list">
                                                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                                                <span class="hover-flip-item">
                                                                <span data-text="CREATIVE">CREATIVE</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <h5 class="title"><a href="post-details.html">Lightweight, grippable, and ready to go.</a></h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End Post List  -->

                                                                        <!-- Start Post List  -->
                                                                        <div class="col-lg-3">
                                                                            <div class="content-block image-rounded">
                                                                                <div class="post-thumbnail mb--20">
                                                                                    <a href="post-details.html">
                                                                                        <img class="w-100" src="assets/images/others/mega-post-03.jpg" alt="Post Images">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="post-content">
                                                                                    <div class="post-cat">
                                                                                        <div class="post-cat-list">
                                                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                                                <span class="hover-flip-item">
                                                                <span data-text="TRAVEL">TRAVEL</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <h5 class="title"><a href="post-details.html">Bold new experience. Same Mac magic.</a></h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End Post List  -->

                                                                        <!-- Start Post List  -->
                                                                        <div class="col-lg-3">
                                                                            <div class="content-block image-rounded">
                                                                                <div class="post-thumbnail mb--20">
                                                                                    <a href="post-details.html">
                                                                                        <img class="w-100" src="assets/images/others/mega-post-04.jpg" alt="Post Images">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="post-content">
                                                                                    <div class="post-cat">
                                                                                        <div class="post-cat-list">
                                                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                                                <span class="hover-flip-item">
                                                                <span data-text="GADGETS">GADGETS</span>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <h5 class="title"><a href="post-details.html">Creative Game With The New DJI Mavic Air</a></h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End Post List  -->

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End One Item  -->
                                                        </div>
                                                        <!-- End Verticle Menu  -->
                                                    </li>
                                                </ul>
                                            </li>
											@if(Auth::guard('web')->check())												
												{{-- User Dashboard and Logout Route --}}
												<li><a href="{{ route('home') }}">Dashboard</a></li>												
											@elseif(Auth::guard('admin')->check())
												{{-- Admin Dashboard and Admin Logout Route --}}
												<li><a href="{{ route('admin.home') }}">Dashboard</a></li>
											@else
												{{-- Login and Register Route --}}
												<li><a href="{{ route('register') }}">Register</a></li>
												<li><a href="{{ route('login') }}">Login</a></li>
											@endif
                                        </ul>
                                        <!-- End Mainmanu Nav -->
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="header-search d-flex align-items-center justify-content-xl-end justify-content-center">
                                    {{-- Search Form --}}
                                    <form class="header-search-form">
                                        <div class="axil-search form-group">
                                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </form>
									
									{{-- Updated user/admin navigation link --}}
									<ul class="metabar-block">
										@if(Auth::guard('web')->check())	
											{{-- User Widget--}}
											<li class="icon"><a href="javascript:void(0)"><i class="fal fa-bookmark"></i></a></li>
											<li class="icon"><a href="javascript:void(0)"><i class="fal fa-bell"></i></a></li>
											<li class="icon"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-sign-out"></i></a></li>
											{{-- Logout Form --}}
											<form id="logout-form" action="{{ route('logout') }}" method="POST">
												@csrf
											</form>
											<li><a href="javascript:void(0)"><img src="{{ Auth::guard('web')->user()->avatar ? Auth::user()->avatar->filename : '' }}" alt="{{ Auth::user()->avatar ? Auth::user()->name . ' ' . 'Avatar' : "" }}"></a></li>
										@elseif(Auth::guard('admin')->check())
											{{-- Admin Widget--}}
											<li class="icon"><a href="javascript:void(0)"><i class="fal fa-bookmark"></i></a></li>
											<li class="icon"><a href="javascript:void(0)"><i class="fal fa-bell"></i></a></li>
											<li class="icon">
												{{-- Logout Form --}}
												<form id="admin-logout-form" method="POST">
													@csrf
													<button type="submit" id="admin-logout-form"><i class="fal fa-sign-out"></i></button>
												</form>
											</li>
											<li><a href="javascript:void(0)"><img src="{{ Auth::guard('admin')->user()->name ? Auth::guard('admin')->user()->name : '' }}" alt="{{  Auth::guard('admin')->user()->name ? Auth::guard('admin')->user()->name . ' ' . 'Avatar' : "" }}"></a></li>
										@else
											
										@endif
									</ul>
                                    <!-- Start Hamburger Menu  -->
                                    <div class="hamburger-menu d-block d-xl-none">
                                        <div class="hamburger-inner">
                                            <div class="icon"><i class="fal fa-bars"></i></div>
                                        </div>
                                    </div>
                                    <!-- End Hamburger Menu  -->
                                    {{-- End of Logged-in user dashboard --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Start Mobile Menu Area  -->
            <div class="popup-mobilemenu-area">
                <div class="inner">
                    <div class="mobile-menu-top">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img class="dark-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Mide-logo-black">
                                <img class="light-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-white.png') }}" alt="Mide-logo-white">
                            </a>
                        </div>
                        <div class="mobile-close">
                            <div class="icon">
                                <i class="fal fa-times"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="mainmenu">
						<li><a href="{{ url('/') }}">Home</a></li>
                        <li class="menu-item-has-children"><a href="javascript:void(0)">Explore</a>
                            <ul class="axil-submenu">
                                <li><a href="javascript:void(0);">Accessibility</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Mega Menu</a></li>
						
						@if(Auth::guard('web')->check())	
							{{-- User Mobile Menu Navbar--}}
							<li><a href="{{ route('home') }}">Dashboard</a></li>
						@elseif(Auth::guard('admin')->check())
							{{-- Admin Mobile Menu Navbar --}}
							<li><a href="{{ route('admin.home') }}">Dashboard</a></li>
						@else
							{{-- Login and Register Route --}}
							<li><a href="{{ route('register') }}">Register</a></li>
							<li><a href="{{ route('login') }}">Login</a></li>
						@endif
                    </ul>
                </div>
            </div>
            {{-- End Mobile Menu --}}

            <h1 class="d-none">Home Tech Blog</h1>
            <div class="axil-tech-post-banner pt--30 bg-color-grey">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-xl-6 col-md-12 col-12">
                                <!-- Start Post Grid  -->
                                <div class="content-block post-grid post-grid-transparent">
                                    <div class="post-thumbnail">
                                        <a href="post-details.html">
                                            <img src="assets/images/post-images/post-tect-01.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-grid-content">
                                        <div class="post-content">
                                            <div class="post-cat">
                                                <div class="post-cat-list">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                        <span class="hover-flip-item">
                                                            <span data-text="FEATURED POST">FEATURED POST</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <h3 class="title"><a href="post-details.html">Beauty of deep space. Billions of
                                                    galaxies in the universe.</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start Post Grid  -->
                            </div>

                            {{-- Where to display posts --}}
                            <div class="col-xl-3 col-md-6 mt_lg--30 mt_md--30 mt_sm--30 col-12 pb--30">
                                @if($posts)
                                    @foreach ($posts as $post)
                                        <!-- Start Single Post  -->
                                        <div class="content-block image-rounded  pb--30">
                                            <div class="post-thumbnail">
                                                <a href="post-details.html">
                                                    <img style="height:180px; " src="{{ $post->photo->picture }}" alt="Post Images">
                                                </a>
                                            </div>
                                            <div class="post-content pt--20">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="{{ Str::upper($post->category->name) }}">{{ Str::upper($post->category->name) }}</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h5 class="title"><a href="{{ route('blog.post', $post->slug)}}">{{ $post->title }}</a></h5>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-xl-3 col-md-6 mt_lg--30 mt_md--30 mt_sm--30 col-12 pb--30">
                                @if($posts)
                                    @foreach ($posts as $post)
                                        <!-- Start Single Post  -->
                                        <div class="content-block image-rounded  pb--30">
                                            <div class="post-thumbnail">
                                                <a href="post-details.html">
                                                    <img style="height:180px; " src="{{ $post->photo->picture }}" alt="Post Images">
                                                </a>
                                            </div>
                                            <div class="post-content pt--20">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="{{ Str::upper($post->category->name) }}">{{ Str::upper($post->category->name) }}</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h5 class="title"><a href="post-details.html">{{ $post->title }}</a></h5>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <!-- Start Footer Area  -->
            <div class="axil-footer-area axil-footer-style-1 bg-color-white">
                <!-- Start Footer Top Area  -->
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Start Post List  -->
                                <div class="inner d-flex align-items-center flex-wrap">
                                    <h5 class="follow-title mb--0 mr--20">Follow Us</h5>
                                    <ul class="social-icon color-tertiary md-size justify-content-start">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <!-- End Post List  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer Top Area  -->

                <!-- Start Copyright Area  -->
                <div class="copyright-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-md-12">
                                <div class="copyright-left">
                                    <div class="logo">
                                        <a href="index.html">
                                            <img class="dark-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Logo Images">
                                            <img class="light-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-white.png') }}" alt="Logo Images">
                                        </a>
                                    </div>
                                    <ul class="mainmenu justify-content-start">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
												<span data-text="Contact Us">Contact Us</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
												<span data-text="Terms of Use">Terms of Use</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
												<span data-text="Advertise with Us">Advertise with Us</span>
                                                </span>
                                            </a>
                                        </li>
										<li>
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
												<span data-text="Mide's Store">Mide's Store</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="copyright-right text-left text-lg-right mt_md--20 mt_sm--20">
                                    <p class="b3">All Rights Reserved © 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area  -->
            </div>
            <!-- End Footer Area  -->

            <!-- Start Back To Top  -->
            <a id="backto-top"></a>
            <!-- End Back To Top  -->
        </div>

        {{-- scripts --}}
        <script src="{{ asset('js/vendor/modernizr.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
        <script src="{{ asset('js/vendor/tweenmax.min.js') }}"></script>
        <script src="{{ asset('js/vendor/js.cookie.js') }}"</script>
        <script src="{{ asset('js/vendor/jquery.style.switcher.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('js/axios-loader.js') }}"></script>
        <script src="{{ asset('js/notiflix-2.7.0.min.js') }}"></script>
        <script>
            let date = new Date()
            let hours = date.getHours()
            let timeofday

            if(hours < 12){
                timeofday = 'Good Morning!'
                document.getElementById('timeofday').innerHTML = timeofday
            }else if(hours == 12 || hours <= 17 ){
                timeofday = 'Good Afternoon!'
                document.getElementById('timeofday').innerHTML = timeofday
            }else{
                timeofday = 'Good Evening!'
                document.getElementById('timeofday').innerHTML = timeofday
            }
        </script>
		<script>
			//Logout Admin
			// Load progress bar
			loadProgressBar();
			$(document).on('submit', '#admin-logout-form', function (event) {
				event.preventDefault();
				let data = $(this).serialize();
				axios.post("{{ route('admin.logout') }}", data)
				.then((result) => {
					Notiflix.Loading.Pulse('Please wait a minute...');
					setTimeout(() => {
						window.location = result.data.redirectTo;
					}, 4000)
				}).catch((err) => {
					console.log(err.response.data.error);
				});
			});
		</script>
    </body>
</html>

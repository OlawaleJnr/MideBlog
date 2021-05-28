@extends('layouts.error')

@section('error-title')
  <title>Mide's Blog | 404</title>
@endsection

@section('content')
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
		<header
		  class="header axil-header header-light header-sticky header-with-shadow"
		>
		  <div class="header-wrap">
			<div class="row justify-content-between align-items-center">
			  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
				<div class="logo">
				  <a href="index.html">
					<img class="dark-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-black.png') }}" alt="Mide-logo-black">
                    <img class="light-logo" src="{{ asset('assets/images/mide-blog-logo/png/logo-white.png') }}" alt="Mide-logo-white">
				  </a>
				</div>
			  </div>

			  <div class="col-xl-6 d-none d-xl-block">
				<div class="mainmenu-wrapper">
				  <nav class="mainmenu-nav">
					<!-- Start Mainmanu Nav -->
					<ul class="mainmenu">
					  {{-- Home --}}
					  <li><a href="{{ url('/') }}">Home</a></li>
					  {{-- Categories --}}
					  <li><a href="javascript:void(0)">Explore</a></li>
					  {{-- Mega Menu --}}
					  <li class="menu-item-has-children megamenu-wrapper">
						<a href="#">Mega Menu</a>
						<ul class="megamenu-sub-menu">
						  <li class="megamenu-item">
							<!-- Start Verticle Nav  -->
							<div class="axil-vertical-nav">
							  <ul class="vertical-nav-menu">
								<li class="vertical-nav-item active">
								  <a class="hover-flip-item-wrapper" href="#tab1">
									<span class="hover-flip-item">
									  <span data-text="Accessibility"
										>Accessibility</span
									  >
									</span>
								  </a>
								</li>
							  </ul>
							</div>
							<!-- Start Verticle Nav  -->

							<!-- Start Verticle Menu  -->
							<div class="axil-vertical-nav-content">
							  <!-- Start One Item  -->
							  <div
								class="axil-vertical-inner tab-content"
								id="tab1"
								style="display: block"
							  >
								<div class="axil-vertical-single">
								  <div class="row">
									<!-- Start Post List  -->
									<div class="col-lg-3">
									  <div class="content-block image-rounded">
										<div class="post-thumbnail mb--20">
										  <a href="post-details.html">
											<img
											  class="w-100"
											  src="assets/images/others/mega-post-01.jpg"
											  alt="Post Images"
											/>
										  </a>
										</div>
										<div class="post-content">
										  <div class="post-cat">
											<div class="post-cat-list">
											  <a
												class="hover-flip-item-wrapper"
												href="#"
											  >
												<span class="hover-flip-item">
												  <span data-text="DESIGN"
													>DESIGN</span
												  >
												</span>
											  </a>
											</div>
										  </div>
										  <h5 class="title">
											<a href="post-details.html"
											  >India may require online shops to
											  hand</a
											>
										  </h5>
										</div>
									  </div>
									</div>
									<!-- End Post List  -->

									<!-- Start Post List  -->
									<div class="col-lg-3">
									  <div class="content-block image-rounded">
										<div class="post-thumbnail mb--20">
										  <a href="post-details.html">
											<img
											  class="w-100"
											  src="assets/images/others/mega-post-02.jpg"
											  alt="Post Images"
											/>
										  </a>
										</div>
										<div class="post-content">
										  <div class="post-cat">
											<div class="post-cat-list">
											  <a
												class="hover-flip-item-wrapper"
												href="#"
											  >
												<span class="hover-flip-item">
												  <span data-text="CREATIVE"
													>CREATIVE</span
												  >
												</span>
											  </a>
											</div>
										  </div>
										  <h5 class="title">
											<a href="post-details.html"
											  >Lightweight, grippable, and ready
											  to go.</a
											>
										  </h5>
										</div>
									  </div>
									</div>
									<!-- End Post List  -->

									<!-- Start Post List  -->
									<div class="col-lg-3">
									  <div class="content-block image-rounded">
										<div class="post-thumbnail mb--20">
										  <a href="post-details.html">
											<img
											  class="w-100"
											  src="assets/images/others/mega-post-03.jpg"
											  alt="Post Images"
											/>
										  </a>
										</div>
										<div class="post-content">
										  <div class="post-cat">
											<div class="post-cat-list">
											  <a
												class="hover-flip-item-wrapper"
												href="#"
											  >
												<span class="hover-flip-item">
												  <span data-text="TRAVEL"
													>TRAVEL</span
												  >
												</span>
											  </a>
											</div>
										  </div>
										  <h5 class="title">
											<a href="post-details.html"
											  >Bold new experience. Same Mac
											  magic.</a
											>
										  </h5>
										</div>
									  </div>
									</div>
									<!-- End Post List  -->

									<!-- Start Post List  -->
									<div class="col-lg-3">
									  <div class="content-block image-rounded">
										<div class="post-thumbnail mb--20">
										  <a href="post-details.html">
											<img
											  class="w-100"
											  src="assets/images/others/mega-post-04.jpg"
											  alt="Post Images"
											/>
										  </a>
										</div>
										<div class="post-content">
										  <div class="post-cat">
											<div class="post-cat-list">
											  <a
												class="hover-flip-item-wrapper"
												href="#"
											  >
												<span class="hover-flip-item">
												  <span data-text="GADGETS"
													>GADGETS</span
												  >
												</span>
											  </a>
											</div>
										  </div>
										  <h5 class="title">
											<a href="post-details.html"
											  >Creative Game With The New DJI
											  Mavic Air</a
											>
										  </h5>
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
					</ul>
					<!-- End Mainmanu Nav -->
				  </nav>
				</div>
			  </div>

			  <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
				<div class="header-search text-right d-flex align-items-center">
				  {{-- Search Form --}}
				  <form class="header-search-form">
					<div class="axil-search form-group">
						<button type="submit" class="search-button"><i class="fal fa-search"></i></button>
						<input type="text" class="form-control" placeholder="Search">
					</div>
				  </form>
				  
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
			</ul>
		  </div>
		</div>
		<!-- End Mobile Menu Area  -->

		<!-- Start Banner Area -->

		<!-- Start Error Area  -->
		<div class="error-area bg_image--4 bg-color-grey">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12">
				<div class="inner">
				  <img src="{{ asset('assets/images/others/404.png') }}" alt="Error Images" />
				  <h1 class="title">Page not found!</h1>
				  <p>
					Sorry, but the page you were looking for could not be found.
				  </p>
				  <div class="back-totop-button cerchio d-inline-block">
					<a
						class="axil-button button-rounded hover-flip-item-wrapper"
						href="/"
					>
						<span class="hover-flip-item">
						<span data-text="Back to Homepage">Back to Homepage</span>
						</span>
					</a>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<!-- End Error Area  -->
		<!-- Start Back To Top  -->
		<a id="backto-top"></a>
		<!-- End Back To Top  -->
	</div>
@endsection

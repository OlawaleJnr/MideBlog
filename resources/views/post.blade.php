@extends('layouts.blog-post')

@section('content')
    <!-- Start Post Single Wrapper  -->
    <div class="post-single-wrapper axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Start Banner Area -->
                    <div class="banner banner-single-post post-formate post-layout axil-section-gapBottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Start Single Slide  -->
                                    <div class="content-block">
                                        <!-- Start Post Content  -->
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
                                            <!-- Post Title -->
                                            <h2 class="title">{{ $post->title }}</h2>
                                            <!-- Post Meta  -->
                                            <div class="post-meta-wrapper">
                                                <div class="post-meta">
                                                    <div class="post-author-avatar border-rounded">
                                                        <!-- Post Author Avatar -->
                                                        <img src="{{ $post->user->avatar ? $post->user->avatar->filename : '/storage/images/placeholder.png' }}" style="width:50px; height:50px" alt="Author Images">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="post-author-name">
                                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                                <span class="hover-flip-item">
                                                                    <!-- Post Author Name -->
                                                                    <span data-text="{{ $post->user->name }}">{{ $post->user->name }}</span>
                                                                </span>
                                                            </a>
                                                        </h6>
                                                        <ul class="post-meta-list">
                                                            <!-- Post Created At -->
                                                            <li>{{ $post->created_at->diffForHumans() }}</li>
                                                            <li>300k Views</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul class="social-share-transparent justify-content-end">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Post Content  -->
                                    </div>
                                    <!-- End Single Slide  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner Area -->

                    <div class="axil-post-details">
                        <p class="has-small-font-size">
                            Winners are recognized for outstanding app design,
                            innovation, ingenuity, and technical achievement
                        </p>
                        <!-- Post Image -->
                        <figure class="wp-block-image">
                            <img src="{{ $post->photo->picture }}" style="width:100%; height:310px;" alt="Post Images">
                            <!-- Post Image Caption -->
                            <figcaption>The Apple Design Award trophy, created by the Apple Design team, is a symbol of achievement and excellence.</figcaption>
                        </figure>

                        <!-- Post Details -->
                        <div>
                            @php
                                echo $post->body;
                            @endphp
                        </div>

                        <div class="tagcloud py-4">
                            <a href="#">{{ $post->category->name }}</a>
                        </div>

                        <div class="social-share-block">
                            <div class="post-like">
                                <a href="#"><i class="fal fa-thumbs-up text-primary"></i><span>2.2k Like</span></a>
                                <a href="#" class="pt-2"><i class="fal fa-heart text-danger"></i><span>2.2k Like</span></a>
                            </div>
                            <ul class="social-icon icon-rounded-transparent md-size">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>

                        <!-- Start Author  -->
                        <div class="about-author">
                            <div class="media">
                                <div class="thumbnail">
                                    <!-- Author Image -->
                                    <a href="#">
                                        <img src="{{ $post->user->avatar ? $post->user->avatar->filename : '/storage/images/placeholder.png' }}" style="width:105px; height:105px;"  alt="Author Images">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="author-info">
                                        <h5 class="title">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <!-- Author Name -->
                                                    <span data-text="{{ strtoupper($post->user->name) }}">{{ strtoupper($post->user->name) }}</span>
                                                </span>
                                            </a>
                                        </h5>
                                        <span class="b3 subtitle">Sr. UX Designer</span>
                                    </div>
                                    <div class="content">
                                        <p class="b1 description">At 29 years old, my favorite compliment is being
                                            told that I look like my mom. Seeing myself in her image, like this
                                            daughter up top, makes me so proud of how far I’ve come, and so thankful
                                            for where I come from.</p>
                                        <ul class="social-share-transparent size-md">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="far fa-envelope"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Author  -->
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Start Sidebar Area  -->
                    <div class="sidebar-inner">
                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_categories mb--30">
                            <ul>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="assets/images/post-images/category-image-01.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Tech</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="assets/images/post-images/category-image-02.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Style</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="assets/images/post-images/category-image-03.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Travel</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a href="#" class="inner">
                                        <div class="thumbnail">
                                            <img src="assets/images/post-images/category-image-04.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Food</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget  -->

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_search mb--30">
                            <h5 class="widget-title">Search</h5>
                            <form action="#">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

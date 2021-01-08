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

                        <!-- Start Comment Form Area  -->
                        <div class="axil-comment-area">
                            <div class="axil-total-comment-post">
                                <div class="title">
                                    <h4 class="mb--0">{{ $comments ? count($comments) . '+ Comments' : 'No Comments' }}</h4>
                                </div>
                                <div class="add-comment-button cerchio">
                                    <a class="axil-button button-rounded" href="javascript:void(0)" tabindex="0"><span>Add Your Comment</span></a>
                                </div>
                            </div>

                            <!-- Start Comment Respond  -->
                            <div class="comment-respond">
                                @auth
                                    <h4 class="title">Post a comment</h4>
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        @csrf
                                        <p class="comment-notes">
                                            <span id="email-notes">Your email address will not be published.</span>
                                            Required fields are marked
                                            <span class="required">*</span>
                                        </p>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="body">Leave a Reply</label>
                                                <textarea name="body"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit cerchio">
                                                <input type="submit" id="submit" class="axil-button button-rounded" value="Post Comment">
                                            </div>
                                        </div>
                                    </form>
                                @endauth

                                @guest
                                    <h4 class="title">Post a comment</h4>
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        @csrf
                                        <p class="comment-notes">
                                            <span id="email-notes">Your email address will not be published.</span>
                                            Required fields are marked
                                            <span class="required">*</span>
                                        </p>
                                        <div class="row row--10">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <input id="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Your Email</label>
                                                    <input id="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Your Website</label>
                                                    <input id="website" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Leave a Reply</label>
                                                    <textarea name="message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <p class="comment-form-cookies-consent">
                                                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                                    <label for="wp-comment-cookies-consent">Save my name, email, and
                                                        website in this browser for the next time I comment.</label>
                                                </p>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit cerchio">
                                                    <input name="submit" type="submit" id="submit" class="axil-button button-rounded" value="Post Comment">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endguest
                            </div>
                            <!-- End Comment Respond  -->

                            <!-- Start Comment Area  -->
                            <div class="axil-comment-area">
                                <h4 class="title">{{ $comments ? count($comments) . ' Comment' : 'No Comments' }}</h4>
                                @if($comments)
                                    @foreach ($comments as $comment)
                                        <ul class="comment-list">
                                            <!-- Start Single Comment  -->
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <div class="single-comment">
                                                        <div class="comment-img">
                                                            <img src="{{ $comment->photo ? $comment->photo : '/storage/images/placeholder.png' }}" style="height: 60px; width: 60px;" alt="Author Images">
                                                        </div>
                                                        <div class="comment-inner">
                                                            <h6 class="commenter">
                                                                <a class="hover-flip-item-wrapper" href="javascript:void(0)">
                                                                    <span class="hover-flip-item">
                                                                        <span data-text="{{ $comment->author }}">{{ $comment->author }}</span>
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <div class="comment-meta">
                                                                <div class="time-spent">{{ $comment->created_at->diffForHumans() }}</div>
                                                                <div class="reply-edit">
                                                                    <div class="reply">
                                                                        <a class="comment-reply-link hover-flip-item-wrapper" href="javascript:void(0)">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Reply">Reply</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="comment-text">
                                                                <p class="b2">
                                                                    {{ $comment->body }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- End Single Comment  -->
                                        </ul>
                                    @endforeach
                                @endif
                            </div>
                            <!-- End Comment Area  -->
                        </div>
                        <!-- End Comment Form Area  -->
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

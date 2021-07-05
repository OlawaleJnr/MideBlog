@extends('layouts.base', compact('notification'))

@section('title')
<title>Mide's Blog | Home</title>
@endsection

@section('content')
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
                      <span
                        data-text="{{ Str::upper($post->category->name) }}">{{ Str::upper($post->category->name) }}</span>
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
                      <span
                        data-text="{{ Str::upper($post->category->name) }}">{{ Str::upper($post->category->name) }}</span>
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
@endsection

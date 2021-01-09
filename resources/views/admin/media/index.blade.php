@extends('layouts.admin')

@section('css-style')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/fancybox/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/fancybox/css/jquery.fancybox-buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/fancybox/css/jquery.fancybox-thumbs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/imagehover/css/imagehover.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Breadcrumbs -->
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Media</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Gallery/Album</h5>
                <span>This Table displays all images uploaded for posts</span>
            </div>
            <div class="card-body">
                <div class="row no-gutters">
                    @if($photos)
                        @forelse($photos as $photo)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6 gallery-border">
                                <a class="fancybox zoom thumb_zoom" href="{{ $photo->picture }}"
                                    data-fancybox-group="gallery" title="{{ $photo->created_at->diffForHumans() }}">
                                    <img src="{{ $photo->picture }}" style="height: 250px; width:250px; " class="img-fluid gallery-style" alt="javascript:void(0)">
                                </a>
                            </div>
                        @empty

                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-scripts')
    <!-- Jquery & Bootstrap Js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('js/bundle.js') }}"></script>
    <script src="{{ asset('js/libs.js') }}"></script>
    <script src="{{ asset('js/gallery.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
    <script src="{{ asset('js/vendor/fancybox/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('js/vendor/fancybox/js/jquery.fancybox-buttons.js') }}"></script>
    <script src="{{ asset('js/vendor/fancybox/js/jquery.fancybox-thumbs.js') }}"></script>
    <script src="{{ asset('js/vendor/fancybox/js/jquery.fancybox-media.js') }}"></script>
@endsection

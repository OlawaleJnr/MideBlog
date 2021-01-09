@extends('layouts.admin')

@section('css-style')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/dropify/css/dropify.css') }}" rel="stylesheet">
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
                        <li class="breadcrumb-item active">Upload Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Upload Media</h5>
                <span>Advanced High File Upload</span>
            </div>
            <div class="card-body">
                <div class="">
                    <h5>Basic Dropify</h5>
                    <div class="m-t-15">
                        <input type="file" class="dropify"/>
                    </div>
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
    <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
    <script src="{{ asset('js/vendor/dropify/js/dropify.js') }}"></script>
@endsection

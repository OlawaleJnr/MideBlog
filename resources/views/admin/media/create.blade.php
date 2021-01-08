@extends('layouts.admin')

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

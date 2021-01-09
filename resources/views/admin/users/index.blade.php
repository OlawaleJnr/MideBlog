@extends('layouts.admin')

@section('css-style')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Breadcrumbs -->
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Users</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('deleted_user'))
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success outline alert-dismissible fade show" role="alert"><i data-feather="check-circle"></i>
                        <p class="text-dark">{{ session()->get('deleted_user') }}</p>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Container-fluid starts-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>All Users</h5>
                <span>This Table displays information about all subscribed users</span>
            </div>
            <div class="table-responsive">
                <table class="table table-border-vertical">
                    <thead>
                        <tr>
                          <th class="text-center" scope="col">S/N</th>
                          <th scope="col">Avatar</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">Status</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <th class="text-center" scope="row">{{ $user->id }}</th>
                                    <td>
                                        <img class="img-fluid img-40 rounded-circle mb-3" style="height: 40px;" src="{{ $user->avatar ? $user->avatar->filename : '/storage/images/placeholder.png' }}" alt="{{ $user->avatar ? $user->avatar->filename : 'n/a'}}">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
@endsection

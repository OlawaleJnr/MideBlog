@extends('layouts.admin')

@section('content')
    <!-- Breadcrumbs -->
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-5">
                    <h3>Users</h3>
                </div>
                <div class="col-7">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Create User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div>
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Create New User</h5>
                        </div>
                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="">
                                    @error('name')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="">
                                    @error('email')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label d-block" for="role_id">Role</label>
                                    <select class="js-example-basic-single col-sm-12 @error('role_id') is-invalid @enderror" name="role_id">
                                        <option value>Choose Options</option>
                                        <optgroup label="Available Roles">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('role_id')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label d-block" for="is_active">Status</label>
                                    <select class="js-example-basic-single col-sm-12  @error('is_active') is-invalid @enderror" name="is_active">
                                        <optgroup label="Status">
                                            <option value="0">Not Active</option>
                                            <option value="1">Active</option>
                                        </optgroup>
                                    </select>
                                    @error('is_active')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="">
                                    @error('password')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <label class="col-form-label" for="avatar_id">Avatar</label>
                                    <input class="form-control" type="file" name="avatar_id">
                                </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

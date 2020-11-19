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
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Manage User</li>
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
                            <h5>Edit User</h5>
                        </div>
                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-5">
                                    <img class="img-thumbnail" src="{{ $user->avatar ? $user->avatar->filename : '/storage/images/placeholder.png' }}" style="height:200px;" alt="Image description" data-original-title="" title="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label d-block" for="role_id">Role</label>
                                    <select class="js-example-basic-single col-sm-12 @error('role_id') is-invalid @enderror" name="role_id">
                                        <optgroup label="Available Roles">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label d-block" for="is_active">Status</label>
                                    <select class="js-example-basic-single col-sm-12  @error('is_active') is-invalid @enderror" name="is_active">
                                        <optgroup label="Status">
                                            <option value="0"  @if($user->is_active == 0) selected @endif>Not Active</option>
                                            <option value="1" @if($user->is_active == 1) selected @endif>Active</option>
                                        </optgroup>
                                    </select>
                                    @error('is_active')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ $user->password }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <label class="col-form-label" for="avatar_id">Avatar</label>
                                    <input class="form-control" type="file" name="avatar_id">
                                </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn-primary">Update User Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

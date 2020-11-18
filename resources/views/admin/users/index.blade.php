@extends('layouts.admin')

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
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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


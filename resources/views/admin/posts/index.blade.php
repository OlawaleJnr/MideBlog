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
                    <h3>Posts</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>All Posts</h5>
                <span>This Table displays information about all posts posted by registered users</span>
            </div>
            <div class="table-responsive">
                <table class="table table-border-vertical">
                    <thead>
                        <tr>
                          <th class="text-center" scope="col">S/N</th>
                          <th scope="col">Published By</th>
                          <th scope="col">Category</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Title</th>
                          <th scope="col">Body</th>
                          <th colspan="2" scope="col">Action</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($posts)
                            @forelse($posts as $post)
                                <tr>
                                    <td class="text-center">{{ $post->id }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td><img class="img-60" src="{{ $post->photo ? $post->photo->picture : '' }}" alt=""></td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ Str::limit($post->body, 30, '...') }}</td>
                                    <td><a href="{{ route('blog.post', $post->slug) }}" target="_blank">View Post</a></td>
                                    <td><a href="{{ route('comments.show', $post->id) }}" target="_blank">View Comments</a></td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Posts Available, <a href="{{ route('users.create') }}">Create one <i class="fa fa-plus-circle"></i></a></td>
                                </tr>
                            @endforelse
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

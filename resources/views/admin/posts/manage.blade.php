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
                <div class="col-5">
                    <h3>Posts</h3>
                </div>
                <div class="col-7">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Posts</li>
                        <li class="breadcrumb-item active">Manage Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="col-xl-12 col-md-12 xl-100 appointment-sec box-col-6">
            <div class="row">
                <div class="col-xl-12 col-md-12 appointment">
                    <div class="card">
                        <div class="card-header card-no-border">
                            <div class="header-top">
                                <h5 class="m-0">Manage Post</h5>
                                <div class="card-header-right-icon">
                                <select class="button btn btn-primary">
                                    <option>Today</option>
                                    <option>Tomorrow</option>
                                    <option>Yesterday</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="appointment-table table-responsive">
                                <table class="table table-bordernone">
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>
                                                    <img class="img-fluid img-40 rounded-circle mt-4" style="height: 40px;" src="{{ $post->photo ? $post->photo->picture : '/storage/images/placeholder.png'  }}" alt="Image description" data-original-title="" title="">
                                                </td>
                                                <td class="img-content-box text-center py-3">
                                                    <span class="d-block">{{ $post->title }}</span>
                                                    <span class="d-block">category: {{ $post->category->name }}</span>
                                                    <span class="font-roboto">posted by: {{ $post->user->name }}</span>
                                                </td>
                                                <td class="px-2">
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="button btn btn-sm btn-primary mt-4"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td class="text-right">
                                                    <a role="button" onclick="
                                                        event.preventDefault();
                                                        deleteUser();
                                                        function deleteUser(){
                                                            swal({
                                                                title: 'Are you sure?',
                                                                text: 'Once deleted, you will not be able to recover this post!',
                                                                icon: 'warning',
                                                                buttons: {
                                                                    cancel: {
                                                                        text: 'Cancel',
                                                                        value: null,
                                                                        visible: true,
                                                                    },
                                                                    confirm: {
                                                                        text: 'Yes, Delete it!',
                                                                        value: 'confirm',
                                                                        visible: true
                                                                    },
                                                                },
                                                                dangerMode: true,
                                                            })
                                                            .then((willDeletePost) => {
                                                                if(willDeletePost){
                                                                    document.getElementById('delete-user-{{ $post->id }}').submit();
                                                                    swal({
                                                                        text: 'This Post has been deleted!',
                                                                        icon: 'success',
                                                                        closeOnClickOutside: false,
                                                                        buttons: false
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    " class="button btn btn-sm btn-danger mt-4"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <form class="d-none" action="{{ route('posts.destroy', $post->id ) }}" method="post" id="delete-user-{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
@endsection

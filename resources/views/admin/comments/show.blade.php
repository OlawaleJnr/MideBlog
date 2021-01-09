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
                    <h3>Comments</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Display Comments</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Displaying Comments for : {{ $post->title }}</h5>
                <span>This Table displays information about all comments posted by registered users</span>
            </div>
            @if($comments)
                <div class="table-responsive">
                    <table class="table table-border-vertical">
                        <thead>
                            <tr>
                            <th class="text-center" scope="col">S/N</th>
                            <th scope="col">Author</th>
                            <th scope="col">Email</th>
                            <th scope="col">Comment Body</th>
                            <th colspan="3" scope="col">Action</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td class="text-center">{{ $comment->id }}</td>
                                    <td>{{ $comment->author }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ Str::limit($comment->body, 40, '...')  }}</td>
                                    <td ><a href="{{ route('blog.post', $comment->post_id) }}" target="_blank">View Post</a></td>
                                    <td>
                                        @if($comment->is_active == 1)
                                            <form action="{{ route('comments.unapprove', $comment->id) }}" id="unapprove-comment-{{ $comment->id }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="0">
                                                <a href="javascript:void(0)" onclick="
                                                    event.preventDefault();
                                                    unapproveComment();
                                                    function unapproveComment()
                                                    {
                                                        swal({
                                                            title: 'Are you sure?',
                                                            text: 'You are about to unapprove this comment!',
                                                            icon: 'warning',
                                                            buttons: {
                                                                cancel: {
                                                                    text: 'Cancel',
                                                                    value: null,
                                                                    visible: true,
                                                                },
                                                                confirm: {
                                                                    text: 'Yes, Unapprove!',
                                                                    value: 'confirm',
                                                                    visible: true
                                                                },
                                                            },
                                                            dangerMode: true,
                                                        })
                                                        .then((willUnapproveComment) => {
                                                            if(willUnapproveComment){
                                                                document.getElementById('unapprove-comment-{{ $comment->id }}').submit();
                                                                swal({
                                                                    text: 'This Comment has been unapproved',
                                                                    icon: 'success',
                                                                    closeOnClickOutside: false,
                                                                    buttons: false
                                                                });
                                                            }
                                                        });
                                                    }
                                                ">Unapprove Comment</a>
                                            </form>
                                        @else
                                            <form action="{{ route('comments.approve', $comment->id) }}" id="approve-comment-{{ $comment->id }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="1">
                                                <a href="javascriptLvoid(0)" onclick="
                                                    event.preventDefault();
                                                    approveComment();
                                                    function approveComment()
                                                    {
                                                        swal({
                                                            title: 'Are you sure?',
                                                            text: 'You are about to approve this comment!',
                                                            icon: 'info',
                                                            buttons: {
                                                                cancel: {
                                                                    text: 'Cancel',
                                                                    value: null,
                                                                    visible: true,
                                                                },
                                                                confirm: {
                                                                    text: 'Yes, Approve!',
                                                                    value: 'confirm',
                                                                    visible: true
                                                                },
                                                            },
                                                            dangerMode: true,
                                                        })
                                                        .then((willApproveComment) => {
                                                            if(willApproveComment){
                                                                document.getElementById('approve-comment-{{ $comment->id }}').submit();
                                                                swal({
                                                                    text: 'This Comment has been Approved',
                                                                    icon: 'success',
                                                                    closeOnClickOutside: false,
                                                                    buttons: false
                                                                });
                                                            }
                                                        });
                                                    }
                                                ">Approve Comment</a>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('comments.destroy', $comment->id)}}" id="delete-comment-{{ $comment->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)" onclick="
                                                event.preventDefault();
                                                deleteComment();
                                                function deleteComment()
                                                {
                                                    swal({
                                                        title: 'Are you sure?',
                                                        text: 'You are about to delete this comment!',
                                                        icon: 'warning',
                                                        buttons: {
                                                            cancel: {
                                                                text: 'Cancel',
                                                                value: null,
                                                                visible: true,
                                                            },
                                                            confirm: {
                                                                text: 'Yes, Delete!',
                                                                value: 'confirm',
                                                                visible: true
                                                            },
                                                        },
                                                        dangerMode: true,
                                                    })
                                                    .then((willApproveDelete) => {
                                                        if(willApproveDelete){
                                                            document.getElementById('delete-comment-{{ $comment->id }}').submit();
                                                            swal({
                                                                text: 'This Comment has been Deleted',
                                                                icon: 'success',
                                                                closeOnClickOutside: false,
                                                                buttons: false
                                                            });
                                                        }
                                                    });
                                                }
                                            ">Delete Comment</a>
                                        </form>
                                    </td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td>{{ $comment->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">No comments available for this post</p>
            @endif
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

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
                    <h3>Comment Replies</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Display Comments Replies</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Displaying Comments for : {{ $comment->body }}</h5>
                <span>This Table displays information about all comments posted by registered users</span>
            </div>
            @if($replies)
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
                            @foreach ($replies as $reply)
                                <tr>
                                    <td class="text-center">{{ $reply->id }}</td>
                                    <td>{{ $reply->author }}</td>
                                    <td>{{ $reply->email }}</td>
                                    <td>{{ Str::limit($reply->body, 40, '...')  }}</td>
                                    <td ><a href="{{ route('blog.post', $comment->post_id) }}" target="_blank">View Post</a></td>
                                    <td>
                                        @if($reply->is_active == 1)
                                            <form action="{{ route('replies.update', $reply->id) }}" id="unapprove-reply-{{ $reply->id }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="0">
                                                <a href="javascript:void(0)" onclick="
                                                    event.preventDefault();
                                                    unapproveReply();
                                                    function unapproveReply()
                                                    {
                                                        swal({
                                                            title: 'Are you sure?',
                                                            text: 'You are about to unapprove this reply!',
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
                                                        .then((willUnapproveReply) => {
                                                            if(willUnapproveReply){
                                                                document.getElementById('unapprove-reply-{{ $reply->id }}').submit();
                                                                swal({
                                                                    text: 'This Reply has been unapproved',
                                                                    icon: 'success',
                                                                    closeOnClickOutside: false,
                                                                    buttons: false
                                                                });
                                                            }
                                                        });
                                                    }
                                                ">Unapprove Reply</a>
                                            </form>
                                        @else
                                            <form action="{{ route('replies.update', $reply->id) }}" id="approve-reply-{{ $reply->id }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="is_active" value="1">
                                                <a href="javascript:void(0)" onclick="
                                                    event.preventDefault();
                                                    approveReply();
                                                    function approveReply()
                                                    {
                                                        swal({
                                                            title: 'Are you sure?',
                                                            text: 'You are about to approve this reply!',
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
                                                        .then((willApproveReply) => {
                                                            if(willApproveReply){
                                                                document.getElementById('approve-reply-{{ $reply->id }}').submit();
                                                                swal({
                                                                    text: 'This Reply has been Approved',
                                                                    icon: 'success',
                                                                    closeOnClickOutside: false,
                                                                    buttons: false
                                                                });
                                                            }
                                                        });
                                                    }
                                                ">Approve Reply</a>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('replies.destroy', $reply->id)}}" id="delete-reply-{{ $reply->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)" onclick="
                                                event.preventDefault();
                                                deleteReply();
                                                function deleteReply()
                                                {
                                                    swal({
                                                        title: 'Are you sure?',
                                                        text: 'You are about to delete this reply!',
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
                                                            document.getElementById('delete-reply-{{ $reply->id }}').submit();
                                                            swal({
                                                                text: 'This Reply has been Deleted',
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

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
                        <li class="breadcrumb-item active">Manage User</li>
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
                                <h5 class="m-0">Manage User</h5>
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
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <img class="img-fluid img-40 rounded-circle mb-3" style="height: 40px;" src="{{ $user->avatar->filename }}" alt="Image description" data-original-title="" title="">
                                                    @if($user->is_active == 0)
                                                        <div class="status-circle bg-danger"></div>
                                                    @elseif($user->is_active == 1)
                                                        <div class="status-circle bg-success"></div>
                                                    @endif
                                                </td>
                                                <td class="img-content-box">
                                                    <span class="d-block">{{ $user->name }}</span><span class="font-roboto">{{ $user->role->name }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.edit',  $user->id) }}" class="button btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('users.destroy',  $user->id) }}" role="button" onclick="
                                                        event.preventDefault();
                                                        deleteUser();
                                                        function deleteUser(){
                                                            swal({
                                                                title: 'Are you sure?',
                                                                text: 'Once deleted, you will not be able to recover this user!',
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
                                                            .then((willDeleteUser) => {
                                                                if(willDeleteUser){
                                                                    document.getElementById('delete-user-{{ $user->id }}').submit();
                                                                    swal({
                                                                        text: 'This User has been deleted!',
                                                                        icon: 'success',
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    " class="button btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <form class="d-none" action="{{ route('users.destroy',  $user->id) }}" method="post" id="delete-user-{{ $user->id }}">
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

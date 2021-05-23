@extends('layouts.admin')

@section('css-style')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    {{-- Plugin --}}
    <link href="{{ asset('vendor/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatable-extension/datatable-extension.css') }}" rel="stylesheet">
@endsection

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
                            <div class="dt-ext appointment-table table-responsive">
                                @if($users)
                                    <table class="table stripe" id="user-manage-details">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td class="img-content-box">
                                                        <div class="col-md-10 col-8">
                                                            <span class="d-block">{{ $user->name }}</span><span class="font-roboto">{{ $user->role->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('users.edit',  $user->id) }}" class=""><i class="fa fa-edit fa-2x"></i></a>
                                                        &nbsp; &nbsp;
                                                        <a href="{{ route('users.destroy',  $user->id) }}" onclick="
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
                                                        " class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
                                                    </td>
                                                    <form class="d-none" action="{{ route('users.destroy',  $user->id) }}" method="post" id="delete-user-{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">S/N</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @endif
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
    {{-- Plugin Js  --}}
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable-extension/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#user-manage-details').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>
@endsection

@extends('layouts.admin')

@section('content')
    <!-- Breadcrumbs -->
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Categories</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 xl-40">
                <div class="card">
                    <div class="card-header">
                        <h5>Create New Category</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-form-label" for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary text-center btn-block">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 xl-60">
                <div class="default-according style-1 faq-accordion" id="accordionoc">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link pl-0" data-toggle="collapse" data-target="#collapseicon" aria-expanded="true" aria-controls="collapseicon"><h5>Categories</h5></button>
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Updated at</th>
                                                <th colspan="2" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($categories)
                                                @forelse($categories as $category)
                                                    <tr>
                                                        <th scope="row">{{ $category->id }}</th>
                                                        <td>{{ $category->name }}</td>
                                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                                                        <td><a href="{{ route('categories.edit', $category->id ) }}">Edit</a></td>
                                                        <td><a href="{{ route('categories.destroy', $category->id ) }}" onclick="
                                                            event.preventDefault();
                                                            deleteCategory();
                                                            function deleteCategory(){
                                                                swal({
                                                                    title: 'Are you sure?',
                                                                    text: 'Once deleted, you will not be able to recover {{ $category->name }}!',
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
                                                                        document.getElementById('delete-category-{{ $category->id }}').submit();
                                                                        swal({
                                                                            text: 'This Category has been deleted!',
                                                                            icon: 'success',
                                                                            closeOnClickOutside: false,
                                                                            buttons: false
                                                                        });
                                                                    }
                                                                });
                                                            }
                                                        ">Delete</a></td>
                                                        <form class="d-none" action="{{ route('categories.destroy', $category->id ) }}" method="post" id="delete-category-{{ $category->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </tr>
                                                @empty

                                                @endforelse
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.master')

@section('title', 'Category Create')

@section('content')

<div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>
        <div class="row">
            <div class="col-md-4">
                @include("layout.admin_sidebar")
            </div>
            <div class="col-md-8">
                @include("layout.report_message")
                @if(\App\Classes\Session::has("delete_success"))
                    {{\App\Classes\Session::flash("delete_success")}}
                @endif

                @if(\App\Classes\Session::has("delete_fail"))
                    {{\App\Classes\Session::flash("delete_fail")}}
                @endif
                
                <!-- Form_Start -->
                <form action="<?php echo URL_ROOT . 'admin/category/create'; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>

                    <input type="hidden" name="token" value="{{App\Classes\CSRFToken::_token()}}">

                    <div class="row no-gutters py-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary english">Create</button>
                        </div>
                    </div>
                </form>
                <!-- Form_End -->
                <ul class="list-group mt-5">
                    @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="<?php echo URL_ROOT . '/admin/category/all'; ?>" style="text-decoration: none;color:darkblue;">{{$category->name}}</a>
                        <span class="float-end">
                            <i class="fa fa-edit text-warning"></i>
                            <a href="<?php echo URL_ROOT . "admin/category/$category->id/delete"; ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
    

    
    


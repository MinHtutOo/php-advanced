@extends('layout.master')

@section('title', 'Admin Home')

@section('content')

    <div class="container my-5">
        <div class="d-flex">
            <div class="col-md-4">
                @include("layout.admin_sidebar")
            </div>
            <div>
                <img src="<?php echo URL_ROOT . 'assets/images/eat.jpg'; ?>" alt="">
            </div>
        </div>
    </div>

@endsection
@extends("layout.master")

@section("title", "Product Home")

@section("content")

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                @include("layout.admin_sidebar")
            </div>
            <div class="col-md-8">
                <h1>Product</h1>
            </div>
        </div>
    </div>

@endsection
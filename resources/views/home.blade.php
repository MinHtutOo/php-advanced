@extends('layout.master')

@section('title', 'E-commerce')

@section('content')

<div class="container my-5">
    <h1 class="text-primary english">Most Popular</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-center">{{$product->name}}</div>
                    <div class="card-body" style="background-image: url('{{$product->image}}');">
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="/E-Commerce/public/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye" id="eye"></i>
                            </a>

                            <span>${{$product->price}}</span>
                            
                            <button class="btn btn-info btn-sm text-center" onclick="addToCart('{{$product->id}}')">
                                <i class="fa fa-shopping-cart" id="cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="d-flex justify-content-center">
                {!! $pages !!}
            </div>
    </div>


    <h1 class="text-primary english">Featured</h1>
    <div class="row">
        @foreach($featured as $product)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-center">{{$product->name}}</div>
                    <div class="card-body" style="background-image: url('{{$product->image}}');">
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                        <a href="/E-Commerce/public/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye" id="eye"></i>
                            </a>

                            <span>${{$product->price}}</span>
                            
                            <button class="btn btn-info btn-sm text-center" onclick="addToCart('{{$product->id}}')">
                                <i class="fa fa-shopping-cart" id="cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

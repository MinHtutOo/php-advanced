@extends("layout.master")

@section("title", "Product Home")

@section("content")

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                @include("layout.admin_sidebar")
            </div>
            <div class="col-md-8">
                @if(\App\Classes\Session::has("product_insert_success"))
                    {{\App\Classes\Session::flash("product_insert_success")}}
                @endif


                <!-- Table Start -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td><img src="{{$product->image}}" class="img-fluid" style="max-width:100px; max-height:150px;"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <a href="/E-Commerce/public/admin/product/{{$product->id}}/edit" class="edit">
                                            <i class="fa fa-edit text-warning" id="edit"><span class="space">Edit</span></i>
                                        </a>

                                        <a href="/E-Commerce/public/admin/product/{{$product->id}}/delete" class="delete">
                                            <i class="fa fa-trash text-danger" id="trash"><span class="space">Delete</span></i>
                                        </a>                                          
                                    </td>
                                </tr>
                            @endforeach    
                        </tbody>
                    </table>
                <!-- Table End -->

                <div class="mt-3 offset-md-5">
                    {!! $pages !!}
                </div>


            </div>
        </div>
    </div>

@endsection
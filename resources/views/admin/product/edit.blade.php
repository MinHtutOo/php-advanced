@extends("layout.master")

@section("title", "Product Edit")

@section("content")

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                @include("layout.admin_sidebar")
            </div>
            <div class="col-md-8">
                @include("layout.report_message")
                <!-- Form Start -->
                    <form class="table-bordered pt-3 pb-3 px-5" action="<?php echo URL_ROOT . "admin/product/$product->id/edit"; ?>" method="post" enctype="multipart/form-data">
                    <h3 class="text-center english my-3 text-info">Create Product</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="any" class="form-control" id="price" name="price" value="{{$product->price}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_id" class="form-label">Category</label>
                                    <select class="form-select" aria-label="Default select example" id="cat_id" name="cat_id">
                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}" <?php echo $cat->id == $product->cat_id ? 'selected' : '' ;?> >{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sub_cat_id" class="form-label">Sub Category</label>
                                    <select class="form-select" aria-label="Default select example" id="sub_cat_id" name="sub_cat_id">
                                        @foreach($sub_cats as $cat)
                                            <option value="{{$cat->id}}" <?php echo $cat->id == $product->sub_cat_id ? 'selected' : '' ;?> >{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Image Input</label>
                            <input class="form-control bg-secondary text-white" type="file" id="file" name="file">
                        </div>

                        <input type="hidden" name="old_image" value="{{$product->image}}">

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
                        </div>

                        <input type="hidden" name="token" value="{{App\Classes\CSRFToken::_token()}}">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reseet" class="btn btn-outline-secondary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-primary" type="button">Update</button>
                        </div>
                    
                    </form>
                <!-- Form End -->
            </div>
        </div>
    </div>

@endsection
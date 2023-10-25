<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController
{
    public function home()
    {
        $pds = Product::all();
        list($products, $pages) = paginate(5, count($pds), new Product());
        $products = json_decode(json_encode($products));
        view("admin/product/home", compact('products', 'pages'));
    }

    public function create()
    {
        $cats = Category::all();
        $sub_cats = SubCategory::all();
        view("admin/product/create", compact('cats', 'sub_cats'));
    }

    public function store()
    {
        $post = Request::get('post');
        $file = Request::get('file');

        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name"=>["require"=>true, "unique"=>"products", "minLength"=>"5"],
                "description"=>["require"=>true, "minLength"=>"5"],
            ];

            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->hasError()) {
                $errors = $validator->getErrors();
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
            }else {
                // beautify($file);
                if(!empty($file->file->name)) {
                    $uploadFile = new UploadFile();
                    if($uploadFile->move($file)) {
                        $path = $uploadFile->getPath();
                        
                        $product = new Product();
                        $product->name = $post->name;
                        $product->price = $post->price;
                        $product->cat_id = $post->cat_id;
                        $product->sub_cat_id = $post->sub_cat_id;
                        $product->description = $post->description;
                        $product->image = $path;

                        if($product->save()) {
                            $products = Product::all();
                            Session::flash("product_insert_success", "Insert Successfully");
                            Redirect::to("/E-Commerce/public/admin/product/home", compact("products"));
                        }else {
                            $errors = ["Insert Fail!"];
                            $cats = Category::all();
                            $sub_cats = SubCategory::all();
                            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                        }
                    } else {
                        $errors = ["Check image size and type!"];
                        $cats = Category::all();
                        $sub_cats = SubCategory::all();
                        view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                    }
                } else {
                    $errors = ["Require image!"];
                    $cats = Category::all();
                    $sub_cats = SubCategory::all();
                    view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                }
            }
        }else { 
            $errors = ["Token Mis Match Error!"];
            $cats = Category::all();
            $sub_cats = SubCategory::all();
            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
        }
        // beautify($post);
        // beautify($file);
    }

    public function edit($id)
    {
        $cats = Category::all();
        $sub_cats = SubCategory::all();
        $product = Product::where("id", $id)->first();
        view('admin/product/edit', compact('product','cats','sub_cats'));
    }

    public function update($id)
    {
        $post = Request::get('post');
        $file = Request::get('file');
        $f_path = "";

        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name"=>["require"=>true, "unique"=>"products", "minLength"=>"5"],
                "description"=>["require"=>true, "minLength"=>"5"],
            ];
            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->hasError()) {
                $errors = $validator->getErrors();
                $product = Product::where("id", $id)->first();
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                view('admin/product/edit', compact('errors','product','cats','sub_cats'));
            }else {
                if(empty($file->file->name)) {
                    $f_path = $post->old_image;
                }else {
                    $uploadFile = new UploadFile();
                    if($uploadFile->move($file)) {
                        $f_path = $uploadFile->getPath();
                    }else {
                        $product = Product::where("id", $id)->first();
                        $cats = Category::all();
                        $sub_cats = SubCategory::all();
                        $errors = ["file_move_error"=>"Can't move upload file"];
                        view('admin/product/edit', compact('errors','product','cats','sub_cats'));
                    }
                }
                $product = Product::where("id", $id)->first();
                
                $product->name = $post->name;
                $product->price = $post->price;
                $product->cat_id = $post->cat_id;
                $product->sub_cat_id = $post->sub_cat_id;
                $product->description = $post->description;
                $product->image = $f_path;

                if($product->update()) {
                    Session::flash("product_insert_success", "Product Update Successfully");
                    $pds = Product::all();
                    list($products,$pages) = paginate(3,count($pds),new Product());
                    Redirect::to("/E-Commerce/public/admin/product/home", compact('products','pages'));
                }else {
                    $errors = ["Update Fail!"];
                    $product = Product::where("id", $id)->first();
                    $cats = Category::all();
                    $sub_cats = SubCategory::all();
                    view('admin/product/edit', compact('errors','product','cats','sub_cats'));
                }
            }
        } else {
            Session::flash("product_update_fail", "Product Update Fail");
            Redirect::to("/E-Commerce/public/admin/product/".$id."/edit");
        }
    }

    public function delete($id)
    {
        $con = Product::destroy($id);
        if($con) {
            Session::flash("product_insert_success", "Product Delete Successfully");
            Redirect::to("/E-Commerce/public/admin/product/home");
        } else {
            Session::flash("product_insert_success" , "Product not Deleted!");
            Redirect::to("/E-Commerce/public/admin/product/home");
        }
    }
}

?>
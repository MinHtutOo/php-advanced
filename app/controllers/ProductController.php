<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController
{
    public function home()
    {
        view("admin/product/home");
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

                $success = "Good to Go"; 
                $cats = Category::all();
                $sub_cats = SubCategory::all();
                view("admin/product/create", compact('cats', 'sub_cats', 'success'));
            }
        }else { 
            $errors = ["Token Mis Match Error!"];
            $cats = Category::all();
            $sub_cats = SubCategory::all();
            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
        }
        beautify($post);
        beautify($file);
    }
}

?>
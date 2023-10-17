<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UpdateFile;
use App\Classes\ValidateRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        view("/admin/category/create", compact('categories'));
    }

    public function store()
    {
        //beautify(Request::old("post", "name"));
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["require"=>true, "minLength"=>"5", "unique"=>"categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->hasError()) {
                $categories = Category::all();
                $errors = $validator->getErrors();
                view("/admin/category/create", compact('categories', 'errors'));
            } else {
                $slug = slug($post->name);

                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                ]);

                if($con) {
                    $categories = Category::all();
                    $success = "Category Created Successfully!";
                    view("/admin/category/create", compact('categories', 'success'));
                }else {
                    echo "Fail";
                }
            }
            // beautify(Request::all());
            // echo "<hr>";
            // $updateFile = new UpdateFile();
            // var_dump($updateFile->move(Request::get("file")));
        }else {
            Session::flash("error", "CSRF Field Error");
            Redirect::back();
        }
        
    }

    public function delete($id)
    {
        $con = Category::destroy($id);
        if($con) {
            Session::flash("delete_success", "Category Delete Successfully");
            Redirect::to("/E-Commerce/public/admin/category/create");
        } else {
            Session::flash("delete_fail" , "Category not Deleted!");
            Redirect::to("/E-Commerce/public/admin/category/create");
        }
    }
}

?>
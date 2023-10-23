<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all()->count();
        list($cats,$pages) = paginate(3, $categories, new Category());
        $cats = json_decode(json_encode($cats));

        $subcategories = SubCategory::all()->count();
        list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
        $sub_cats = json_decode(json_encode($sub_cats));
        view("admin/category/create", compact('cats', 'pages', 'sub_cats', 'sub_pages'));
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
                
                $errors = $validator->getErrors();
                $categories = Category::all()->count();
                list($cats,$pages) = paginate(3, $categories, new Category());
                $cats = json_decode(json_encode($cats));
                view("admin/category/create", compact('cats', 'errors', 'pages'));
            } else {
                $slug = slug($post->name);

                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                ]);

                if($con) {
                    $success = "Category Created Successfully!";
                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3, $categories, new Category());
                    $cats = json_decode(json_encode($cats));
                    view("admin/category/create", compact('cats', 'success', 'pages'));
                }else {
                    $errors = "Category Created Fail";
                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3,$categories, new Category());
                    $cats = json_decode(json_encode($cats));
                    view("admin/category/create",compact('cats','errors','success','pages'));
                }
            }
            // beautify(Request::all());
            // echo "<hr>";
            // $uploadFile = new UploadFile();
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

    public function update()
    {
        $post = Request::get('post');

        if(CSRFToken::checkToken($post->token)) {

            $rules = [
                "name" => ["require"=>true, "minLength"=>"5", "unique"=>"categories"]
            ];

            $validator = new ValidateRequest();
            $validator->checkVaidate($post, $rules);

            if($validator->getErrors()) {
                header('HTTP/1.1 422 Validation Error!', true, 422);
                $errors = $validator->getErrors();
                echo json_encode($errors);
                exit;
            }else {
                Category::where("id", $post->id)->update(["name"=>$post->name]);
                echo json_encode("Category Updated Successfully");
                exit;
            }
        }else {
            header('HTTP/1.1 422 Token Mix-Match Error!', true, 422);
            echo json_encode(["error" => "Token Mix-Match Error!"]);
            exit;
        }

        
    }
}

?>
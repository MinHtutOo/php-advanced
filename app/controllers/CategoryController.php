<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UpdateFile;

class CategoryController extends BaseController
{
    public function index()
    {
        view("/admin/category/create");
    }

    public function store()
    {
        //beautify(Request::old("post", "name"));
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)) {
            beautify(Request::get("file"));
            echo "<hr>";
            $updateFile = new UpdateFile();
            var_dump($updateFile->move(Request::get("file")));
        }else {
            Session::flash("error", "CSRF Field Error");
            Redirect::back();
        }
        
    }
}

?>
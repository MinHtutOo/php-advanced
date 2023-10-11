<?php

namespace App\Controllers;

class CategoryController extends BaseController
{
    public function index()
    {
        view("admin/category/create");
    }

    public function store()
    {
        beautify($_POST);
        echo "I am here";
    }
}

?>
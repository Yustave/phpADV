<?php
namespace App\controllers;

class CategoryController extends BaseController{
    
    public function index(){
        view("admin/category/create");
    }

    public function store(){
        echo "<pre>".print_r($_POST,true)."</pre>";
    }
}

?>
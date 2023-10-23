<?php
namespace App\controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Redirect;
use App\Classes\CSRFToken;

class CategoryController extends BaseController{
    
    public function index(){
        view("admin/category/create");
    }

    public function store(){
        $post = Request::get("post");
        if(CSRFToken::checktoken($post->token)){
            echo "T";
        }else{
            Session::flash("error","CSRF field Error!");
            Redirect::back();
        }
        ;
    }
}

?>
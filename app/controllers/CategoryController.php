<?php
namespace App\controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Models\Category;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\UpdateFile;
use App\Classes\ValidateRequest;

class CategoryController extends BaseController{
    
    public function index(){
        $cats = Category::all();
        view("admin/category/create",compact('cats'));
    }

    public function store(){
        $post = Request::get("post");
        if(CSRFToken::checktoken($post->token)){
            $rules = [
                "name"=> ["require"=>true,"minLength"=>"5","unique"=>"categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->hasError()){
                print_r($validator->getErrors());
            }else{
                echo "good";
            }
            
        }else{
            Session::flash("error","CSRF field Error!");
            Redirect::back();
        }
    }
}

?>
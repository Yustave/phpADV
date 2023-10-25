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
        $cate = Category::all()->count();
        list($cats,$pages) = paginate(3,$cate,"categories");
        view("admin/category/create",compact('cats','pages'));
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
                $cats = Category::all();
                $errors = $validator->getErrors();
                view("admin/category/create",compact('cats','errors'));
            }else{
                $slug = slug($post->name);

                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                    ]);
                if($con){
                    $cats = Category::all();
                    $success = "Category Created";
                    view("admin/category/create",compact('cats','success'));
                }else{
                    echo "fail";
                }    
            }
            
        }else{
            Session::flash("error","CSRF field Error!");
            Redirect::back();
        }
    }

    public function delete($id){
        $con = Category::destroy($id);
        if ($con) {
            Session::flash("del_success", "Category deleted Successfully!");
            Redirect::to(URL_ROOT."admin/category/create");
        } else {
            Session::flash("del_fail", "Category deletion failed! Try again.");
            Redirect::to(URL_ROOT."admin/category/create");
        }
    }
}
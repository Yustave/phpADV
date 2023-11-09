<?php
namespace App\controllers;

use App\Classes\Request;
use App\Classes\Session;
use App\Models\Category;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\UpdateFile;
use App\Models\SubCategory;
use App\Classes\ValidateRequest;

class CategoryController extends BaseController{
    
    public function index(){
        $cate = Category::all()->count();
        list($cats,$pages) = paginate(5,$cate, new Category());
        $cats = json_decode(json_encode($cats));

        $subcategories = SubCategory::all()->count();
        list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
        $sub_cats = json_decode(json_encode($sub_cats));
        
        view("admin/category/create", compact('cats', 'pages', 'sub_cats', 'sub_pages'));
    }

    public function store(){
        $post = Request::get("post");
        if(CSRFToken::checktoken($post->token)){
            $rules = [
                "name"=> ["require"=>true,"minLength"=>"3","unique"=>"categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->hasError()){
                
                $errors = $validator->getErrors();
                $cate = Category::all()->count();
                list($cats,$pages) = paginate(5,$cate, new Category());
                $cats = json_decode(json_encode($cats));

                $subcategories = SubCategory::all()->count();
                list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
                $sub_cats = json_decode(json_encode($sub_cats));
                view("admin/category/create", compact('cats', 'pages', 'sub_cats', 'sub_pages'));
            }else{
                $slug = slug($post->name);

                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                    ]);
                if($con){
                    
                    $success = "Category Created";

                    $cate = Category::all()->count();
                    list($cats,$pages) = paginate(5,$cate,new Category());
                    $cats = json_decode(json_encode($cats));
                    
                    $subcategories = SubCategory::all()->count();
                    list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
                    $sub_cats = json_decode(json_encode($sub_cats));

                    view("admin/category/create",compact('cats','success','pages','sub_cats', 'sub_pages'));
                }else{
                    $errors = "Category Created Fail";

                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3,$categories, new Category());
                    $cats = json_decode(json_encode($cats));

                    $subcategories = SubCategory::all()->count();
                    list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
                    $sub_cats = json_decode(json_encode($sub_cats));

                    view("admin/category/create",compact('cats','errors','success','pages','sub_cats', 'sub_pages'));
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

    public function update(){
            $post = Request::get('post');
    
            if(CSRFToken::checkToken($post->token)) {
    
                $rules = [
                    "name" => ["require"=>true, "minLength"=>"3", "unique"=>"categories"]
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
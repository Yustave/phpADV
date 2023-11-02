<?php

namespace App\Controllers;

use App\Models\Product;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Category;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\UploadFile;
use App\Models\SubCategory;
use App\Classes\ValidateRequest;

class ProductController extends BaseController{
    public function home(){
        view("admin/product/home");
    }

    public function create(){
        $cats = Category::all();
        $sub_cats=SubCategory::all();
        view("admin/product/create",compact('cats','sub_cats'));
    }

    public function store(){
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
                if(!empty($file->file->name)) {
                    $uploadFile = new UploadFile();
                    if($uploadFile->move($file)) {
                        $path = $uploadFile->getPath();
                        
                        $product = new Product();
                        $product->name = $post->name;
                        $product->price = $post->price;
                        $product->cat_id = $post->cat_id;
                        $product->sub_cat_id = $post->sub_cat_id;
                        $product->description = $post->description;
                        $product->image = $path;

                        if($product->save()) {
                            $products = Product::all();
                            Session::flash("product_insert_success", "Insert Successfully");
                            Redirect::to("/E-Commerce/public/admin/product/home", compact("products"));
                        }else {
                            $errors = ["Insert Fail!"];
                            $cats = Category::all();
                            $sub_cats = SubCategory::all();
                            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                        }
                    } else {
                        $errors = ["Check image size and type!"];
                        $cats = Category::all();
                        $sub_cats = SubCategory::all();
                        view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                    }
                } else {
                    $errors = ["Image Require!"];
                    $cats = Category::all();
                    $sub_cats = SubCategory::all();
                    view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
                }
            }
        }else { 
            $errors = ["Token Mis Match Error!"];
            $cats = Category::all();
            $sub_cats = SubCategory::all();
            view("admin/product/create", compact('cats', 'sub_cats', 'errors'));
        }

    }
}
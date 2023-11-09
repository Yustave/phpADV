<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Models\SubCategory;

class SubCategoryController extends BaseController{
    public function store(){
        
        $post = Request::get('post');

        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["unique"=>"sub_categories", "minLength"=>"5"]
            ];
            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->getErrors()) {
                header('HTTP/1.1 422 Validation Error!', true, 422);
                $errors = $validator->getErrors();
                echo json_encode($errors);
                exit;
            }else {
                $subcat = new SubCategory();
                $subcat->name = $post->name;
                $subcat->cat_id = $post->parent_cat_id;
                if($subcat->save()){
                    echo "Sub Category Created Successfully";
                    exit;
                }else{
                    header('HTTP/1.1 422 Sub Category Create fail',true,422);
                    $data = ["name"=>"Sub Category Create fail"];
                    echo json_encode($data);
                    exit;
                }
            }
        } else {
            header('HTTP/1.1 422 Token Mix-Match Error!', true, 422);
            echo "Token Mix_Match Error!";
            exit;
        }
        
    }

    public function update() {
        $post = Request::get("post");

        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["unique"=>"sub_categories", "minLength"=>"5"]
            ];
            $validator = new ValidateRequest();
            $validator->checkVaidate($post,$rules);
            if($validator->getErrors()) {
                header('HTTP/1.1 422 Validation Error!', true, 422);
                $errors = $validator->getErrors();
                echo json_encode($errors);
                exit;
            }else {
                SubCategory::where("id", $post->id)->update(["name" => $post->name]);
                echo "Sub Category Edited Successfully!";
                exit;
            }
        } else {
            header('HTTP/1.1 422 Token Mix-Match Error!', true, 422);
            echo "Token Mix_Match Error!";
            exit;
        }
    }

    public function delete($id){
        $con = SubCategory::destroy($id);
        if($con) {
            Session::flash("delete_success", "SubCategory Delete Successfully");
            Redirect::to("/E-Commerce/public/admin/category/create");
        } else {
            Session::flash("delete_fail" , "SubCategory not Deleted!");
            Redirect::to("/E-Commerce/public/admin/category/create");
        }
    }

    public function getSubcategories($id){
        $subcategories = SubCategory::where('cat_id', $id)->get();

        header('Content-Type: application/json');
        echo json_encode($subcategories);
    }
    
}

?>
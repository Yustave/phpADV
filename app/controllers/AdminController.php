<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

class AdminController{
    public function index(){
        $cate = Category::all()->count();
        list($cats,$pages) = paginate(5,$cate, new Category());
        $cats = json_decode(json_encode($cats));

        $subcategories = SubCategory::all()->count();
        list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
        $sub_cats = json_decode(json_encode($sub_cats));
        view("admin/home", compact('cats', 'pages', 'sub_cats', 'sub_pages'));
    }
}

?>
<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class IndexController extends BaseController{
    public function show(){
        $products = Product::all();
        $pds =Product::all()->count();
        list($products,$products_pages) = paginate(6,$pds,new Product());
        $products = json_decode(json_encode($products));

        $cate = Category::all()->count();
        list($cats,$pages) = paginate(5,$cate, new Category());
        $cats = json_decode(json_encode($cats));

        $subcategories = SubCategory::all()->count();
        list($sub_cats,$sub_pages) = paginate(3, $subcategories, new SubCategory());
        $sub_cats = json_decode(json_encode($sub_cats));
        view("home",compact('products','cats', 'pages', 'sub_cats','sub_pages','products_pages'));
    }

    public function productDetail($id)
    {
        $product = Product::where("id",$id)->first();
        return view("user/product",compact("product"));
    }


}

?>
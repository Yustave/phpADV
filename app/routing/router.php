<?php

use App\Routing\RouteDispacher;
use function PHPSTORM_META\map;

$router = new AltoRouter();
$router->setBasePath("/E-commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show","Home Route");

# Category Start

    $router->map("GET", "/admin", "App\Controllers\AdminController@index","Admin Home");

    $router->map("GET", "/admin/category/create", "App\Controllers\CategoryController@index","Category Create");

    $router->map("POST", "/admin/category/create", "App\Controllers\CategoryController@store","Category Store");

    $router->map("GET", "/admin/category/[i:id]/delete", "App\Controllers\CategoryController@delete","Category Delete");

    $router->map("POST", "/admin/category/update", "App\Controllers\CategoryController@update", "Category update");

    $router->map("POST", "/admin/subcategory/create", "App\Controllers\SubCategoryController@store","SubCategory Create");

    $router->map("POST", "/admin/subcategory/update", "App\Controllers\SubCategoryController@update","SubCategory Update");

    $router->map("GET", "/admin/subcategory/[i:id]/delete", "App\Controllers\SubCategoryController@delete","SubCategory Delete");

# Category End

# Product Start

    $router->map("GET", "/admin/product/home", "App\Controllers\ProductController@home","Product Home");

    $router->map("GET", "/admin/product/create", "App\Controllers\ProductController@create","Product Create");

    $router->map("POST", "/admin/product/create", "App\Controllers\ProductController@store","Product Store");

    $router->map("GET", "/admin/product/[i:id]/edit", "App\Controllers\ProductController@edit","Product Edit");

    $router->map("POST", "/admin/product/[i:id]/edit", "App\Controllers\ProductController@update","Product Update");

    $router->map("GET", "/admin/product/[i:id]/delete", "App\Controllers\ProductController@delete","Product Delete");    
# Product End

new RouteDispacher($router);
?>
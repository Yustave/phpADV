<?php

use App\Routing\RouteDispacher;
use function PHPSTORM_META\map;

$router = new AltoRouter();
$router->setBasePath("/E-commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show", "Home Route");

$router->map("GET", "/admin", "App\Controllers\AdminController@index", "Admin Home");
$router->map("GET", "/admin/category/create", "App\Controllers\CategoryController@index", "Category create");
$router->map("POST", "/admin/category/create", "App\Controllers\CategoryController@store", "Category home");

new RouteDispacher($router)
?>
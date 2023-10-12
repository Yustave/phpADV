<?php

use App\Routing\RouteDispacher;
use function PHPSTORM_META\map;

$router = new AltoRouter();
$router->setBasePath("/E-commerce/public");
$router->map("GET", "/", "App\Controllers\IndexController@show", "Home Route");

new RouteDispacher($router)
?>
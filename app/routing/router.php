<?php

$router = new AltoRouter();

$router->setBasePath("/E-Commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show","Home Route");

$router->map("GET", "/admin/category", "App\Controllers\CategoryController@index","Category Create");

$router->map("POST", "/admin/category", "App\Controllers\CategoryController@store","Category Store");

new \App\Routing\RouteDispatcher($router);

?>
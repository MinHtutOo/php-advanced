<?php

$router = new AltoRouter();

$router->setBasePath("/E-Commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show","Home Route");

new \App\Routing\RouteDispatcher($router);

?>
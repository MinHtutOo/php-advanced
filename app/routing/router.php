<?php

$router = new AltoRouter();

$router->setBasePath("/E-Commerce/public");

$router->map("GET", "/", "App\Controllers\BaseController@show","Home Route");

new \App\Routing\RouteDispatcher($router);

?>
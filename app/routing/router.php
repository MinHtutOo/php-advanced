<?php

$router = new AltoRouter();

$router->setBasePath("/E-Commerce/public");

    $router->map("GET", "/", "App\Controllers\IndexController@show","Home Route");

    $router->map("POST", "/cart", "App\Controllers\IndexController@cart","Cart Route");

    $router->map("GET", "/cart", "App\Controllers\IndexController@showCart","Show Cart");

    $router->map("POST", "/payout", "App\Controllers\IndexController@payout","Payout");

    $router->map("GET", "/product/[i:id]/detail", "App\Controllers\IndexController@productDetail","Product Detail");
    
    $router->map("POST", "/payment/stripe","App\Controllers\PaymentController@stripePayment","Payment Route");

require_once "admin_route.php";
require_once "user_route.php";

new \App\Routing\RouteDispatcher($router);

?>
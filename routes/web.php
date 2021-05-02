<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Cart Service";
});
$router->get('/cart', 'CartController@index');
$router->post('/cart', 'CartController@create');
$router->get('/cart/{cartId}/products', 'CartProductController@index');
$router->post('/cart/{cartId}/products/{productId}', 'CartProductController@create');
$router->delete('/cart/{cartId}/products/{productId}', 'CartProductController@destroy');
$router->put('/cart/{cartId}/products/{productId}/quantity', 'CartProductController@update');
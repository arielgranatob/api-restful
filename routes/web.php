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
    return 'Use /api';
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('post', 'PostController@createPost');
    $router->get('post', 'PostController@getAllPost');
    $router->get('post/{id}', 'PostController@getOnlyPost');
    $router->delete('post/{id}', 'PostController@deletePost');
    $router->put('post/{id}', 'PostController@putPost');
    $router->patch('post/{id}', 'PostController@patchPost');
});

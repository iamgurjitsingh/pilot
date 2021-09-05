<?php

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

//$router->get('/', function () use ($router) {
//    //return $router->app->version();
//});


$router->get('/', [
    'uses' => 'RegisterController@customerResgitration',
    'as'   => 'register.customer.registration',
]);

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->post('/login', [
        'uses' => 'AuthController@login',
        'as'   => 'auth.login',
    ]);

    $router->post('/register', 'AuthController@register');
    $router->post('/logout', 'AuthController@logout');

    $router->get('/registrations', [
        'uses' => 'RegisterController@index',
        'as'   => 'register.index',
    ]);

    $router->post('/store', [
        'uses' => 'RegisterController@store',
        'as'   => 'register.store',
    ]);

    $router->get('/registration/{id}', [
        'uses' => 'RegisterController@show',
        'as'   => 'register.show',
    ]);

    $router->put('/registration/{id}', [
        'uses' => 'RegisterController@update',
        'as'   => 'register.update',
    ]);

    $router->delete('/registration/{id}', [
        'uses' => 'RegisterController@destroy',
        'as'   => 'register.destroy',
    ]);
});

$router->group(['prefix' => 'demo'], function() use ($router) {
    $router->get('/list', [
        'as' => 'register.list',
        'uses' => 'RegisterController@list'
    ]);
    $router->get('/register/create', [
        'as' => 'register.create',
        'uses' => 'RegisterController@create'
    ]);
    $router->get('/register/{id}/edit', [
        'as' => 'register.edit',
        'uses' => 'RegisterController@edit'
    ]);
    $router->patch('/register/{id}', [
        'as' => 'register.update',
        'uses' => 'RegisterController@update'
    ]);
});

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
    return $router->app->version();
});

//Prefeitura de São Carlos
$router->get('/test', 'SaoCarlosController@test');
$router->post('/consultar', 'SaoCarlosController@consultar');
$router->post('/cancelar', 'SaoCarlosController@cancelar');

//Prefeitura de Curitiba
$router->get('/test', 'CuritibaController@test');
$router->post('/consultar', 'CuritibaController@consultar');
$router->post('/cancelar', 'CuritibaController@cancelar');

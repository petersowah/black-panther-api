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

$router->get('/', function () use ($router) {
	return 'Black Panther v1.0.0 - Wakanda Forever!';
});

$router->group(['prefix' => 'api/v1'], function() use ($router){
	$router->get('characters', ['uses' => 'CharacterController@index']);
	$router->post('characters', ['uses' => 'CharacterController@create']);
	$router->get('characters/{uuid}', ['uses' => 'CharacterController@show']);
	$router->put('characters/{uuid}', ['uses' => 'CharacterController@update']);
	$router->delete('characters/{uuid}', ['uses' => 'CharacterController@destroy']);
});
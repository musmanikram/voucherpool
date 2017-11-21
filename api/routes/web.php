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
    return $router->app->version();
});





$router->group(
	['prefix' => 'api'],

	function () use ($router)
	{
		$router->get('recipients', 'RecipientsController@index');
		$router->post('recipients/add', 'RecipientsController@store');
		$router->get('recipients/{id}', 'RecipientsController@show');
		$router->put('recipients/{id}', 'RecipientsController@update');
		$router->delete('recipients/delete/{id}', 'RecipientsController@destroy');

		$router->get('specialoffers', 'SpecialOffersController@index');
		$router->post('specialoffers/add', 'SpecialOffersController@store');
		$router->get('specialoffers/{id}', 'SpecialOffersController@show');
		$router->put('specialoffers/{id}', 'SpecialOffersController@update');
		$router->delete('specialoffers/delete/{id}', 'SpecialOffersController@destroy');
	}

);
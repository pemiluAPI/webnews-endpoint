<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('news');
});

Route::pattern('id', '[0-9]+');

Route::group(array('prefix' => 'news'), function()
{
	Route::get('/', array('uses' => 'PostController@getAll'));

	Route::get('/{id?}', array('uses' => 'PostController@getOne'));

});

Route::group(array('prefix' => 'sources'), function()
{
	Route::get('/', array('uses' => 'PostSourceController@getAll'));
});

App::missing(function($exception)
{
	return XApi::response(array('error'=>400, 'results'=>null), 400);
});
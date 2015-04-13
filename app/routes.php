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




// Route::group(['prefix' => 'api/v1'], function(){
	Route::get('/', ['as' => 'index', 'uses' => 'SessionController@index']);
	Route::post('/login', ['as' => 'login', 'uses' => 'SessionController@store']);
	Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
	Route::get('/profile',['as' => 'showprofile', 'uses' => 'SessionController@profile']);

	Route::get('/register', ['as' => 'register', 'uses' => 'UserController@create']);
	Route::post('/store', ['as' => 'store', 'uses' => 'UserController@store']);
	Route::get('/showusers', ['as' => 'showusers', 'uses' => 'UserController@index']);
	Route::resource('user', 'UserController',[
		'only' => [
			'edit', 'update', 'destroy'
		]
	]);

// });



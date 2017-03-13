<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Admin Login Routes
|--------------------------------------------------------------------------
|
*/
	Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
	    Route::get('login','Adminauth\AuthController@showLoginForm');
		Route::post('login','Adminauth\AuthController@login');
		Route::get('password/reset/{token?}','Adminauth\PasswordController@showResetForm');
		Route::post('password/reset', 'Adminauth\PasswordController@reset');
	});
	Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
	    Route::get('logout','Adminauth\AuthController@logout');
	    Route::get('register', 'Adminauth\AuthController@showRegistrationForm');
	    Route::post('register', 'Adminauth\AuthController@register');
	});

/*
|--------------------------------------------------------------------------
| User Login Routes
|--------------------------------------------------------------------------
|
*/
	Route::group(['middleware' => 'web'], function () {
	    Route::auth();
	});



Route::group(['namespace' => 'User', 
			'prefix' => 'user', 
			'middleware' => 'auth'], function() {

	Route::get('/dashboard', 'UserController@index');

});

Route::group([ 'prefix' => 'template', 
			'middleware' => 'web'], function() {

	Route::get('{name}', 'TemplateController@template');
	Route::get('layouts/{layout}', 'TemplateController@templatelayouts');
	Route::get('forms/{name}', 'TemplateController@templateforms');
	Route::get('pages/{name}', 'TemplateController@templatepages');
	Route::get('tables/{name}', 'TemplateController@templatetables');
	Route::get('ui/elements/{name}', 'TemplateController@templateuielements');

});
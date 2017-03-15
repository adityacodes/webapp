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
	Route::group(['middleware' => 'web', 'prefix' => 'gtpadmin'], function () {
	    Route::get('login','Adminauth\AuthController@showLoginForm');
		Route::post('login','Adminauth\AuthController@login');
		Route::get('password/reset/{token?}','Adminauth\PasswordController@showResetForm');
		Route::post('password/reset', 'Adminauth\PasswordController@reset');
	});
	Route::group(['middleware' => 'admin', 'prefix' => 'gtpadmin'], function () {
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
	Route::group(['middleware' => 'web', 'prefix' => 'user'], function () {
		Route::get('login', 'Auth\AuthController@getLogin');
		Route::post('login', 'User\LoginController@postLogin');
		Route::get('logout', 'Auth\AuthController@logout');
		// Password Reset Routes...
		Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
		Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
		Route::post('password/reset', 'Auth\PasswordController@reset');
		// Registration routes...
		Route::get('register', 'Auth\AuthController@showRegistrationForm');
		Route::post('register', 'User\RegistrationController@postRegister');
		Route::get('register/verify/{confirmationCode}', 'User\RegistrationController@confirm');
		// Route::put('captcha','RegistrationController@captcha');
	});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'User', 
			'prefix' => 'user', 
			'middleware' => 'auth'], function() {

	Route::get('/dashboard', [
		'as' => 'user.dashboard',
		'uses' => 'UserController@index'
	]);
	Route::get('/courses', [
		'as' => 'user.courses',
		'uses' => 'UserController@courses'
	]);
	Route::get('/messages', [
		'as' => 'user.messages',
		'uses' => 'UserController@messages'
	]);
	Route::get('/messages/{id}', [
		'as' => 'messages.show',
		'uses' => 'UserController@messagesById'
	]);
	Route::get('/settings', [
		'as' => 'user.settings',
		'uses' => 'UserController@settings'
	]);
	Route::get('/notifications', [
		'as' => 'user.notifications',
		'uses' => 'UserController@notifications'
	]);
	Route::get('/change-password', [
		'as' => 'user.changepassword',
		'uses' => 'UserController@changepassword'
	]);
	Route::get('/feedback', [
		'as' => 'user.feedback',
		'uses' => 'UserController@feedback'
	]);
	Route::get('/profile', [
		'as' => 'user.profile',
		'uses' => 'UserController@profile'
	]);
	Route::get('/{course}/modules', [
		'as' => 'user.modules',
		'uses' => 'UserController@modules'
	]);

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Admin', 
			'prefix' => 'gtpadmin', 
			'middleware' => 'admin'], function() {

	Route::get('/dashboard', [
		'as' => 'dashboard',
		'uses' => 'AdminController@index'
	]);

	Route::resource('/post', 'PostController');
	Route::resource('/notification', 'NotificationController');

});
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

Route::get('/admin/login','Adminauth\AuthController@showLoginForm');
Route::post('/admin/login','Adminauth\AuthController@login');
Route::get('/admin/password/reset/{token?}','Adminauth\PasswordController@showResetForm');
Route::post('/admin/password/reset', 'Adminauth\PasswordController@reset');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/logout','Adminauth\AuthController@logout');
    Route::get('admin/register', 'Adminauth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'Adminauth\AuthController@register');

    Route::get('/admin', 'Admin\Employee@index');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::get('/home', 'HomeController@index');
	
	
});

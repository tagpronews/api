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
// examples
Route::get('/', 'HomeController@index');
Route::get('error', 'HomeController@badRequest');
Route::get('transform', 'HomeController@transformExample');
Route::get('transformItem', 'HomeController@transformItemExample');
// examples end

Route::group(['middleware' => 'v1'], function () {

    Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
        Route::post('login', 'Auth\AuthController@login');
        Route::post('register', 'Auth\AuthController@register');
        Route::post('confirm', 'Auth\AuthController@confirm');
        Route::post('resetPassword', 'Auth\AuthController@resetPassword');
        Route::post('resetPasswordComplete', 'Auth\AuthController@resetPasswordComplete');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('auth/logout', 'Auth\AuthController@logout');
    });
});

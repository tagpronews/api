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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('confirm', 'AuthController@confirm');
    Route::post('resetPassword', 'AuthController@resetPassword');
    Route::post('resetPasswordComplete', 'AuthController@resetPasswordComplete');
    Route::get('logout', 'AuthController@logout');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('groups', 'Permissions\GroupController',
        ['except' => ['create', 'edit']]
    );
    Route::resource('groups.roles', 'Permissions\RoleController',
        ['except' => ['create', 'edit']]
    );
});

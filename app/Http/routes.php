<?php

Route::get('/', 'HomeController@index');

Route::post('feedback', 'HomeController@feedback');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function ()
{
    Route::get('news', 'News\NewsController@index');

    Route::group(['namespace' => 'Permissions'], function ()
    {
        Route::resource('groups', 'GroupController',
            ['except' => ['create', 'edit']]
        );
        Route::resource('groups.roles', 'RoleController',
            ['except' => ['create', 'edit']]
        );
        Route::resource('groups.roles.permissions', 'PermissionController',
            ['except' => ['create', 'edit']]
        );
    });
});

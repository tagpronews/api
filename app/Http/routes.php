<?php

Route::get('/', 'HomeController@index');

Route::post('feedback', 'HomeController@feedback');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function ()
{
    Route::resource('news', 'News\NewsController',
        ['except' => ['create', 'edit']]
    );

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

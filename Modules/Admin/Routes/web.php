<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth:web', 'info-web'], 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('pages', 'Pages\PagesController');

    Route::resource('menus', 'Menus\MenusController', ['except' => ['index', 'create', 'edit']]);
    Route::get('view-menus/{menu?}', 'Menus\MenusController@view')->name('menus.index');
    Route::get('menus/create/{menu?}', 'Menus\MenusController@create')->name('menus.create');
    Route::get('menus/{id}/edit/{menu?}', 'Menus\MenusController@edit')->name('menus.edit');
    Route::get('menus/sort-order/{menu?}', 'Menus\MenusController@sort')->name('menus.sort');
    Route::put('menus/sort-order/{menu?}', 'Menus\MenusController@updateSort')->name('menus.sort-update');

    Route::resource('slides', 'Advertises\SlidesController', ['except' => ['update']]);
    Route::post('slides/{slides}', 'Advertises\SlidesController@update')->name('slides.update');

    Route::resource('advertises', 'Advertises\AdvertisesController', ['except' => ['update']]);
    Route::post('advertises/{advertise}', 'Advertises\AdvertisesController@update')->name('advertises.update');

    Route::resource('roles', 'Roles\RolesController')->names('role');
    Route::resource('permission-role', 'Roles\PermissionRoleController')->names('role_has_permissions');

    Route::group(['prefix' => 'users'], function() {
        Route::get('account-info', 'Users\UsersController@accountInfo')->name('users.account-info');
        Route::put('account-info/{id}', 'Users\UsersController@updateAccount')->name('users.update-account');
        Route::put('change-pass/{id}', 'Users\UsersController@updateChangePass')->name('users.update-pass');
    });
    Route::resource('users', 'Users\UsersController');

    // Route::resource('media', 'MediaController');
});

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

Route::prefix('common')->group(function() {
    Route::get('/', 'CommonController@index');
});

Route::group(['middleware' => ['auth:web', 'info-web'], 'prefix' => 'admin'], function() {
    Route::post('choose-district', 'Administratives\DistrictController@chooseDistrict')->name('district.choose-district');
    Route::post('choose-ward', 'Administratives\WardController@chooseWard')->name('ward.choose-ward');

    Route::resource('products', 'Products\ProductsController');
    Route::resource('categories', 'Categories\CategoriesController', ['except' => ['create']]);
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/post', 'Categories\CategoriesController@viewPost')->name('categories.post.index');
        Route::get('/news', 'Categories\CategoriesController@viewNews')->name('categories.news.index');
        Route::get('/product', 'Categories\CategoriesController@viewProduct')->name('categories.product.index');
        Route::get('/create/{type}', 'Categories\CategoriesController@create')->name('categories.create');
    });
});

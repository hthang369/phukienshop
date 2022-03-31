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

Route::group(['middleware' => ['access-home'], 'prefix' => ''], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('cart', 'CartController', ['except' => ['update', 'delete']]);
    Route::post('add-cart', 'CartController@addCart')->name('cart.add');
    Route::put('update-cart', 'CartController@updateCart')->name('cart.update');
    Route::put('delete-cart', 'CartController@deleteCart')->name('cart.delete');
    // Route::get('/post/{title}', 'HomeController@showPost')->name('page.show-post');
    // Route::get('/detail/{title}', 'HomeController@showPostDetail')->name('page.show-detail');

    Route::get('/{title}', 'CategoryController@show')->name('page.show');
    Route::get('/{title}/{slug}', 'ProductController@showProduct')  ->name('page.show-product');
});

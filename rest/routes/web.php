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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index');

    Route::get('/dishes', 'DishController@admin')->name('admin.dishes');

    Route::get('/dishes/{dish}/edit', 'DishController@edit')->name('admin.dish.edit');

    Route::put('/dishes/{dish}', 'DishController@update')->name('admin.dish.update');

    Route::delete('/dishes/{dish}', 'DishController@destroy')->name('admin.dish.delete');

    Route::get('/dishes/create', 'DishController@create')->name('admin.dish.create');

    Route::post('/dishes', 'DishController@store')->name('admin.dish.store');

    Route::resource('/main', 'MainController');

    Route::resource('/user', 'UserController');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dishes', 'DishController@index')->name('dishes.page');

Route::get('/dishes/{dish}', 'DishController@show')->name('single.dish');

Route::post('/cart', 'ShoppingCartController@addToCart')->name('add.cart');

Route::get('/cart', 'ShoppingCartController@index')->name('show.cart');

Route::post('/cartDishDelete', 'ShoppingCartController@destroy')->name('cart.dish.delete');

Route::post('/deleteByOne', 'ShoppingCartController@deleteByOne')->name('deleteByOne');

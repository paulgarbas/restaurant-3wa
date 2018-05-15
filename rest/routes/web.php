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

Route::get('/', 'HomeController@index')->name('main.page');

Auth::routes();

// Admin
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index');

    Route::get('/dishes', 'DishController@admin')->name('admin.dishes');

    Route::get('/dishes/{dish}/edit', 'DishController@edit')->name('admin.dish.edit');

    Route::put('/dishes/{dish}', 'DishController@update')->name('admin.dish.update');

    Route::delete('/dishes/{dish}', 'DishController@destroy')->name('admin.dish.delete');

    Route::get('/dishes/create', 'DishController@create')->name('admin.dish.create');

    Route::post('/dishes', 'DishController@store')->name('admin.dish.store');

    Route::get('/reservations', 'ReservationController@index')->name('admin.reservations');

    Route::get('/reservations/{reservation}/edit', 'ReservationController@edit')->name('admin.reservation.edit');

    Route::put('/reservations/{reservation}', 'ReservationController@update')->name('admin.reservation.update');

    Route::delete('reservations/{reservation}' ,'ReservationController@destroy')->name('admin.reservation.delete');

    Route::get('/reservations/create', 'ReservationController@create')->name('admin.reservation.create');

    Route::post('/reservations', 'ReservationController@store')->name('admin.reservation.store');

    Route::resource('/main', 'MainController');

    Route::resource('/user', 'UserController');

    Route::get('/orders', 'OrderController@showToAdmin')->name('admin.orders');
});


Route::get('/dishes', 'DishController@index')->name('dishes.page');

Route::get('/dishes/{dish}', 'DishController@show')->name('single.dish');

Route::post('/cart', 'ShoppingCartController@addToCart')->name('add.cart');

Route::get('/cart', 'ShoppingCartController@index')->name('show.cart');

Route::post('/cartDishDelete', 'ShoppingCartController@destroy')->name('cart.dish.delete');

Route::post('/deleteByOne', 'ShoppingCartController@deleteByOne')->name('deleteByOne');

Route::post('/reservation', 'ReservationController@store')->name('reservation');

Route::get('/checkout', 'OrderController@checkout')->name('checkout')->middleware('auth');



Route::get('/addDish/{dishId}', 'CartController@addItem')->name('addTo.cart');

Route::get('/cart', 'CartController@showCart')->name('show.cart');

Route::delete('/cart/{cartItem}', 'CartController@destroy')->name('delete.item.fromCart');

// User
Route::get('/profile', 'UserController@show')->name('user.profile')->middleware('auth');

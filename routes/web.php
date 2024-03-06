<?php

use Illuminate\Support\Facades\Route;

//Cart and order routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::delete('/cart/destroy/', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@removeItem')->name('cart.removeItem');
Route::get('/order/purchase', 'App\Http\Controllers\OrderController@purchase')->name('order.purchase');

//Product routes
Route::get('/products', 'ProductsController@index')->name('product.index');
Route::get('/products/create', 'ProductsController@create')->name('product.create');
Route::post('/products/store', 'ProductsController@store')->name('product.store');
Route::get('/products/show/{id}', 'ProductsController@show')->name('product.show');
Route::delete('products/show/{id}', 'ProductsController@destroy')->name('product.destroy');
Route::get('/products/edit/{id}', 'ProductsController@edit')->name('product.edit');
Route::put('products/update/{id}', 'ProductsController@update')->name('product.update'); 

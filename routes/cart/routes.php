<?php

use Illuminate\Support\Facades\Route;

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'CartController@add')->name('cart.add');
Route::delete('/cart/destroy/', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/remove/{id}', 'CartController@removeItem')->name('cart.removeItem');

<?php

use Illuminate\Support\Facades\Route;

//Cart routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::delete('/cart/destroy/', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@removeItem')->name('cart.removeItem');

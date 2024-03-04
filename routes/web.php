<?php

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/drop/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@removeItem')->name('cart.removeItem');

<?php

use Illuminate\Support\Facades\Route;

Route::post('/orders/store/', 'OrderController@store')->name('orders.create');
Route::get('/orders/preorder/', 'OrderController@preorder')->name('orders.preorder');
Route::get('/orders/', 'OrderController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');

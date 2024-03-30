<?php

use Illuminate\Support\Facades\Route;

Route::post('/orders/store/', 'OrdersController@store')->name('orders.create');
Route::get('/orders/preorder/', 'OrdersController@preorder')->name('orders.preorder');
Route::get('/orders/', 'OrdersController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrdersController@show')->name('orders.show');

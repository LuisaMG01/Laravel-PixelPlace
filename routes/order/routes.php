<?php

use Illuminate\Support\Facades\Route;

Route::post('/orders/store/', 'App\Http\Controllers\OrderController@store')->name('orders.create');
Route::get('/orders/preorder/', 'App\Http\Controllers\OrderController@preorder')->name('orders.preorder');
Route::get('/orders/', 'App\Http\Controllers\OrderController@index')->name('orders.index');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('orders.show');

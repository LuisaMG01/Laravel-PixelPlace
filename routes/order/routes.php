<?php

use Illuminate\Support\Facades\Route;

Route::post('/order/store/', 'App\Http\Controllers\OrderController@store')->name('order.create');
Route::get('/order/preorder/', 'App\Http\Controllers\OrderController@preorder')->name('order.preorder');

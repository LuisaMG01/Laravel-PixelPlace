<?php

use Illuminate\Support\Facades\Route;

Route::post('/orders/store/', 'App\Http\Controllers\OrderController@store')->name('order.create');
Route::get('/orders/preorder/', 'App\Http\Controllers\OrderController@preorder')->name('order.preorder');

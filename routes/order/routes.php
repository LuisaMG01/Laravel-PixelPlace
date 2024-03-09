<?php

use Illuminate\Support\Facades\Route;

Route::get('/order/purchase', 'App\Http\Controllers\OrderController@purchase')->name('order.purchase');

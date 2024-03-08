<?php

use Illuminate\Support\Facades\Route;

//Product routes
Route::get('/products', 'App\Http\Controllers\ProductsController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductsController@create')->name('product.create');
Route::post('/products/store', 'App\Http\Controllers\ProductsController@store')->name('product.store');
Route::get('/products/show/{id}', 'App\Http\Controllers\ProductsController@show')->name('product.show');
Route::delete('products/show/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('product.destroy');
Route::put('/products/edit/{id}', 'App\Http\Controllers\ProductsController@edit')->name('product.edit');
Route::put('products/update/{id}', 'App\Http\Controllers\ProductsController@update')->name('product.update'); 
<?php

use Illuminate\Support\Facades\Route;

//Product routes
Route::get('/products', 'ProductsController@index')->name('product.index');
Route::get('/products/create', 'ProductsController@create')->name('product.create');
Route::post('/products/store', 'ProductsController@store')->name('product.store');
Route::get('/products/show/{id}', 'ProductsController@show')->name('product.show');
Route::delete('products/show/{id}', 'ProductsController@destroy')->name('product.destroy');
Route::get('/products/edit/{id}', 'ProductsController@edit')->name('product.edit');
Route::put('products/update/{id}', 'ProductsController@update')->name('product.update');
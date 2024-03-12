<?php

use Illuminate\Support\Facades\Route;

//Product routes
Route::get('/products', 'ProductsController@index')->name('product.index');
Route::get('/products/create', 'ProductsController@create')->name('product.create');
Route::post('/products/store', 'ProductsController@store')->name('product.store');
Route::get('/products/show/{id}', 'ProductsController@show')->name('product.show');
Route::delete('/products/show/{id}', 'ProductsController@destroy')->name('product.destroy');
Route::get('/products/edit/{id}', 'ProductsController@edit')->name('product.edit');
Route::put('/products/update/{id}', 'ProductsController@update')->name('product.update'); 
Route::get('/products/reviews/create/{id}', 'ReviewsController@create')->name('review.create');
Route::post('/products/reviews/store', 'ReviewsController@store')->name('review.store');
Route::get('/products/reviews/show/{id}', 'ReviewsController@show')->name('review.show');
Route::delete('/products/reviews/show/{id}', 'ReviewsController@destroy')->name('review.destroy');
Route::get('/products/reviews/edit/{id}', 'ReviewsController@edit')->name('review.edit');
Route::put('/products/reviews/update/{id}', 'ReviewsController@update')->name('review.update'); 
<?php

use Illuminate\Support\Facades\Route;

//Product routes
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/show/{id}', 'ProductsController@show')->name('products.show');
Route::get('/products/reviews/create/{id}', 'ReviewsController@create')->name('reviews.create');
Route::post('/products/reviews/store', 'ReviewsController@store')->name('reviews.store');
Route::get('/products/reviews/show/{id}', 'ReviewsController@show')->name('reviews.show');
Route::delete('/products/reviews/show/{id}', 'ReviewsController@destroy')->name('reviews.destroy');
Route::get('/products/reviews/edit/{id}', 'ReviewsController@edit')->name('reviews.edit');
Route::put('/products/reviews/update/{id}', 'ReviewsController@update')->name('reviews.update');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;

//Product routes
Route::get('/products', 'ProductsController@index')->name('product.index');
Route::get('/products/create', 'ProductsController@create')->name('product.create');
Route::post('/products/store', 'ProductsController@store')->name('product.store');
Route::get('/products/show/{id}', 'ProductsController@show')->name('product.show');
Route::delete('products/show/{id}', 'ProductsController@destroy')->name('product.destroy');
Route::get('/products/edit/{id}', 'ProductsController@edit')->name('product.edit');
Route::put('products/update/{id}', 'ProductsController@update')->name('product.update'); 
Route::get('/create', 'ChallengeController@create')
    ->name('challenge.create');

Route::get('/create', 'ChallengeController@create')
    ->name('challenge.create');

Route::get('/show/{id}', 'ChallengeController@show')
    ->name('challenge.show_challenge');

Route::get('/index', 'ChallengeController@index')
    ->name('challenge.index');

Route::post('/store', 'ChallengeController@store')
    ->name('challenge.store');

Route::delete('/delete/{id}', 'ChallengeController@delete')
    ->name('challenge.delete');


<?php

use Illuminate\Support\Facades\Route;


Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('categories.create');
Route::post('/categories', 'App\Http\Controllers\CategoryController@store')->name('categories.store');
Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');
Route::get('/categories/{category}/edit', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');
Route::put('/categories/{category}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('categories.destroy');

<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {

    // Routes of Admin
    Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home.index');

    Route::get('/admin/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('admin.orders.index');
    Route::get('/admin/orders/show/{id}', 'App\Http\Controllers\Admin\OrderController@show')->name('admin.orders.show');

    Route::get('/admin/categories', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.categories.index');
    Route::put('/admin/categories/update/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('admin.categories.update');
    Route::delete('/admin/categories/destroy/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy')->name('admin.categories.destroy');
    Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('admin.categories.store');

    Route::get('/admin/products', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.products.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\ProductController@store')->name('admin.products.store');
    Route::put('/admin/products/update/{id}', 'App\Http\Controllers\Admin\ProductController@update')->name('admin.products.update');
    Route::delete('/admin/products/destroy/{id}', 'App\Http\Controllers\Admin\ProductController@destroy')->name('admin.products.destroy');

    Route::get('/admin/users', 'App\Http\Controllers\Admin\UserController@index')->name('admin.users.index');
    Route::put('/admin/users/update/{id}', 'App\Http\Controllers\Admin\UserController@update')->name('admin.users.update');
    Route::delete('/admin/users/destroy/{id}', 'App\Http\Controllers\Admin\UserController@destroy')->name('admin.users.destroy');
    Route::post('/admin/users/store', 'App\Http\Controllers\Admin\UserController@store')->name('admin.users.store');

    Route::get('/admin/challenges', 'App\Http\Controllers\Admin\ChallengeController@index')->name('admin.challenges.index');
    Route::post('/admin/challenges/store', 'App\Http\Controllers\Admin\ChallengeController@store')->name('admin.challenges.store');
    Route::put('/admin/challenges/update/{id}', 'App\Http\Controllers\Admin\ChallengeController@update')->name('admin.challenges.update');
    Route::delete('/admin/challenges/destroy/{id}', 'App\Http\Controllers\Admin\ChallengeController@destroy')->name('admin.challenges.destroy');
});

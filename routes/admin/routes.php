<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {

    // Routes of Admin
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name("admin.categories.index");
    Route::put('/admin/categories/update/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.categories.update');
    Route::delete('/admin/categories/destroy/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@destroy')->name('admin.categories.destroy');
    Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name('admin.categories.store');

    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.products.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.products.store');
    Route::put('/admin/products/update/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.products.update');
    Route::delete('/admin/products/destroy/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name('admin.products.destroy');

    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.users.index');
    Route::put('/admin/users/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.users.update');
    Route::delete('/admin/users/destroy/{id}', 'App\Http\Controllers\Admin\AdminUserController@destroy')->name('admin.users.destroy');
    Route::post('/admin/users/store', 'App\Http\Controllers\Admin\AdminUserController@store')->name('admin.users.store');

    Route::get('/admin/challenges', 'App\Http\Controllers\Admin\AdminChallengeController@index')->name('admin.challenges.index');
    Route::post('/admin/challenges/store', 'App\Http\Controllers\Admin\AdminChallengeController@store')->name('admin.challenges.store');
    Route::post('/admin/challenges/update/{id}', 'App\Http\Controllers\Admin\AdminChallengeController@update')->name('admin.challenges.update');
    Route::get('/admin/challenges/destroy/{id}', 'App\Http\Controllers\Admin\AdminChallengeController@destroy')->name('admin.challenges.destroy');
});

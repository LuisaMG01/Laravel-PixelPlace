<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {

    // Routes of Admin
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::get('/admin/challenges', 'App\Http\Controllers\Admin\AdminChallengeController@index')->name('admin.challenges.index');
    Route::post('/admin/challenges/store', 'App\Http\Controllers\Admin\AdminChallengeController@store')->name('admin.challenges.store');
    Route::post('/admin/challenges/update/{id}', 'App\Http\Controllers\Admin\AdminChallengeController@update')->name('admin.challenges.update');
    Route::get('/admin/challenges/destroy/{id}', 'App\Http\Controllers\Admin\AdminChallengeController@destroy')->name('admin.challenges.destroy');
});

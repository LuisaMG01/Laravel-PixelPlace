<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'Admin\HomeController@index')->name('admin.home.index');

    Route::get('/admin/orders', 'Admin\OrdersController@index')->name('admin.orders.index');
    Route::get('/admin/orders/show/{id}', 'Admin\OrdersController@show')->name('admin.orders.show');

    Route::get('/admin/categories', 'Admin\CategoriesController@index')->name('admin.categories.index');
    Route::put('/admin/categories/update/{id}', 'Admin\CategoriesController@update')->name('admin.categories.update');
    Route::delete('/admin/categories/destroy/{id}', 'Admin\CategoriesController@destroy')->name('admin.categories.destroy');
    Route::post('/admin/categories/store', 'Admin\CategoriesController@store')->name('admin.categories.store');

    Route::get('/admin/products', 'Admin\ProductsController@index')->name('admin.products.index');
    Route::post('/admin/products/store', 'Admin\ProductsController@store')->name('admin.products.store');
    Route::put('/admin/products/update/{id}', 'Admin\ProductsController@update')->name('admin.products.update');
    Route::delete('/admin/products/destroy/{id}', 'Admin\ProductsController@destroy')->name('admin.products.destroy');

    Route::get('/admin/users', 'Admin\UsersController@index')->name('admin.users.index');
    Route::put('/admin/users/update/{id}', 'Admin\UsersController@update')->name('admin.users.update');
    Route::delete('/admin/users/destroy/{id}', 'Admin\UsersController@destroy')->name('admin.users.destroy');
    Route::post('/admin/users/store', 'Admin\UsersController@store')->name('admin.users.store');

    Route::get('/admin/challenges', 'Admin\ChallengesController@index')->name('admin.challenges.index');
    Route::post('/admin/challenges/store', 'Admin\ChallengesController@store')->name('admin.challenges.store');
    Route::put('/admin/challenges/update/{id}', 'Admin\ChallengesController@update')->name('admin.challenges.update');
    Route::delete('/admin/challenges/destroy/{id}', 'Admin\ChallengesController@destroy')->name('admin.challenges.destroy');
});

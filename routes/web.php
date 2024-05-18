<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LocaleCookieMiddleware;

Route::get('/locale/{locale}', 'HomeController@locale')->name('locale');

Route::middleware(LocaleCookieMiddleware::class)->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // User settings
    Route::get('/settings', 'UsersController@settings')->name('user.settings');
    Route::put('/settings/update/{id}', 'UsersController@update')->name('user.update');
    Route::get('user/orders/', 'UsersController@orderIndex')->name('user.orders');
    Route::get('user/orders/{id}', 'UsersController@orderShow')->name('user.order');

    Auth::routes();

    include __DIR__.'/product/routes.php';
    include __DIR__.'/cart/routes.php';
    include __DIR__.'/order/routes.php';
    include __DIR__.'/challenge/routes.php';
    include __DIR__.'/admin/routes.php';
});
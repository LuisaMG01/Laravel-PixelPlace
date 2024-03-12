<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

include __DIR__ . '/product/routes.php';
include __DIR__ . '/category/routes.php';
include __DIR__ . '/cart/routes.php';
include __DIR__ . '/order/routes.php';
include __DIR__ . '/challenge/routes.php';
include __DIR__ . '/admin/routes.php';


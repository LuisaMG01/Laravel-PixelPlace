<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('categories.create');
Route::post('/categories', 'App\Http\Controllers\CategoryController@store')->name('categories.store');
Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');
Route::get('/categories/{category}/edit', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');
Route::put('/categories/{category}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('categories.destroy');

Auth::routes();

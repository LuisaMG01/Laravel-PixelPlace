<?php

use App\Http\Controllers\ChallengeController;
use Illuminate\Support\Facades\Route;


// Challenge routes

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

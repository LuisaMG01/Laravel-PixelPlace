<?php

use Illuminate\Support\Facades\Route;

//Challenge routes
Route::get('/challenges', 'ChallengesController@index')->name('challenge.index');
Route::get('/challenges/create', 'ChallengesController@create')->name('challenge.create');
Route::post('/challenges/store', 'ChallengesController@store')->name('challenge.store');
Route::get('/challenges/show/{id}', 'ChallengesController@show')->name('challenge.show');
Route::delete('challenges/show/{id}', 'ChallengesController@destroy')->name('challenge.destroy');

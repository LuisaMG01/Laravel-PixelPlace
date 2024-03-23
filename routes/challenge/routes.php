<?php

use Illuminate\Support\Facades\Route;

//Challenge routes
Route::get('/challenges/{id}', 'ChallengesController@indexUser')->name('challenges.indexUser');
Route::get('/challenges', 'ChallengesController@index')->name('challenges.index');
Route::get('/challenges/filter', 'ChallengesController@filter')->name('challenges.filter');

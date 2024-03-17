<?php

use App\Http\Controllers\ChallengesController;

//Challenge routes
Route::get('/challenges/{id}', [ChallengesController::class, 'indexUser'])->name('challenges.indexUser');
Route::get('/challenges', [ChallengesController::class, 'index'])->name('challenges.index');
Route::get('/challenges/filter', [ChallengesController::class, 'filter'])->name('challenges.filter');

<?php

use App\Http\Controllers\Admin\ChallengeController;

//Challenge routes
Route::get('/challenges/{id}', [ChallengeController::class, 'indexUser'])->name('challenges.indexUser');
Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
Route::get('/challenges/filter', [ChallengeController::class, 'filter'])->name('challenges.filter');

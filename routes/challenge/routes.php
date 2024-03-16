<?php
use App\Http\Controllers\Admin\ChallengeController;
//Challenge routes
Route::get('/challenges/{id}', [ChallengeController::class, 'index'])->name('challenges.index');

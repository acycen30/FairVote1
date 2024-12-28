<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\VoteCountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/vote', [VoteController::class, 'create'])->name('vote.create');
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
    Route::get('/results', [VoteCountController::class, 'index'])->name('results');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin,organizer')->group(function () {
        Route::resource('voters', VoterController::class);
        Route::resource('candidates', CandidateController::class);
        Route::resource('positions', PositionController::class);
        Route::resource('vote-counts', VoteCountController::class);
    });
});

require __DIR__.'/auth.php';

Route::get('/error', function () {
    return response('Access Denied', 403);
})->name('error');

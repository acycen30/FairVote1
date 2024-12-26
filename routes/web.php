<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\VoteCountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/vote', [VoteController::class, 'create'])->name('vote.create');
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
Route::get('/results', [VoteCountController::class, 'index'])->name('results');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('voters', VoterController::class);
    Route::resource('candidates', CandidateController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('vote-counts', VoteCountController::class);
});

Route::middleware(['auth', 'role:organizer'])->group(function () {
    Route::get('/organizer', [OrganizerController::class, 'index'])->name('organizer.dashboard');
    Route::resource('voters', VoterController::class)->except(['destroy']);
    Route::resource('candidates', CandidateController::class)->except(['destroy']);
    Route::resource('positions', PositionController::class)->except(['destroy']);
    Route::resource('vote-counts', VoteCountController::class)->except(['destroy']);
});

require __DIR__.'/auth.php';

Route::get('/error', function () {
    return response('Access Denied', 403);
})->name('error');

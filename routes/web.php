<?php

use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\QuestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('points', PointController::class);
    Route::get('get/points', [PointController::class, 'getData'])->name('get-points');
    Route::resource('quests', QuestController::class);
    Route::get('get/quests', [QuestController::class, 'getData'])->name('get-quests');
});

Route::get('/twitter_acc', [ProfileController::class, 'twitterrAcc']);

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\QuestController;
use App\Http\Controllers\Api\Admin\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('points', PointController::class);
    Route::get('get/points', [PointController::class, 'getData'])->name('get-points');
    Route::resource('quests', QuestController::class);
    Route::get('get/quests', [QuestController::class, 'getData'])->name('get-quests');
});

Route::get('/twitter_acc', [ProfileController::class, 'twitterrAcc']);
Route::get('/testqeue', [HomeController::class, 'testjob']);

require __DIR__ . '/auth.php';

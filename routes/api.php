<?php

use App\Http\Controllers\Api\Admin\HomeController;
use App\Http\Controllers\Api\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserPointController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {
Route::post('/userfollow', [UserPointController::class,'follow']);
Route::post('/dataSync', [HomeController::class,'syncUserInformation']);
Route::post('/getlikepoints',[UserPointController::class, 'getlikeData']);
Route::get('/getmingomentions',[UserPointController::class, 'getMingoMentionsData']);
Route::get('/getquests',[UserPointController::class, 'getQuests']);
});

<?php

use App\Http\Controllers\Api\Admin\HomeController;
use App\Http\Controllers\Api\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserPointController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/login', [AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {
Route::post('/userfollow', [UserPointController::class,'follow']);
Route::post('/dataSync/{slug?}', [HomeController::class,'syncUserInformation']);
Route::post('/getlikepoints',[UserPointController::class, 'getlikeData']);
Route::get('/getmingomentions',[UserPointController::class, 'getMingoMentionsData']);
Route::get('/getquests',[UserPointController::class, 'getQuests']);
Route::get('/addfollowpoints',[UserPointController::class, 'addFollowPoints']);
Route::get('/addretweetpoints/{tweet_id}',[UserPointController::class, 'addRetweetPoints']);
Route::get('/questlikepoints/{tweet_id}',[UserPointController::class, 'addQuestLikedpoints']);
Route::get('/leaderboard',[HomeController::class, 'getLeaderBoardData']);
Route::get('/leaderboard',[HomeController::class, 'getLeaderBoardData']);
Route::get('/savecode',[HomeController::class, 'saveReferral']);

});

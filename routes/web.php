<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/twitter', 'Auth\LoginController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\LoginController@handleTwitterCallback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

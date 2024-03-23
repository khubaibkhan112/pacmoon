<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/twitter', 'Auth\LoginController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\LoginController@handleTwitterCallback');
Route::any('{path}', function () {
    return view('spa');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/twitter', 'Auth\LoginController@redirectToTwitter');
Route::get('auth/twitter/callback', 'Auth\LoginController@handleTwitterCallback');
Route::get('{path}', function(){
    return view('spa');
})->where('path', '(.*)');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

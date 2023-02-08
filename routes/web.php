<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);


Route::prefix('dashboard')->middleware('auth')->group(
    function() {
        Route::get('/', function() {
            return view('dashboard.layout');
        });
        Route::resource('page', pageController::class);
        // Route::get('page', [pageController::class, "index"]);
    }
);
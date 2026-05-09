<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/profile', 'profile')->name('profile');
});

Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/', 'loginView')->name('loginView');
    Route::post('/', 'loginStore')->name('loginStore');
    Route::get('/register', 'registerView')->name('registerView');
    Route::post('/register', 'registerStore')->name('registerStore');
    Route::post('/logout', 'logout')->name('logout');
});
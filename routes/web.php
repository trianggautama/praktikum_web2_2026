<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;
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

Route::controller(MahasiswaController::class)->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{mahasiswa}', 'show')->name('show');
    Route::get('/{mahasiswa}/edit', 'edit')->name('edit');
    Route::put('/{mahasiswa}/edit', 'update')->name('update');
    Route::delete('/delete/{mahasiswa}', 'destroy')->name('delete');
});

Route::controller(NilaiController::class)->prefix('nilai')->name('nilai.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/show/{nilai}', 'show')->name('show');
    Route::get('/{nilai}/edit', 'edit')->name('edit');
    Route::put('/{nilai}/edit', 'update')->name('update');
    Route::delete('/delete/{nilai}', 'destroy')->name('delete');
});
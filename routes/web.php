<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class, 'index']);

Route::get('/profile/{nama}', function ($nama) {
    
    return view('profile', ['nama' => $nama]);
});
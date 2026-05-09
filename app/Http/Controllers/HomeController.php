<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {        
        return view('home');
    }

    public function profile()
    {
        $profile = Auth::user();

        return view('profile', compact('profile'));
    }
}

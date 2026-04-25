<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Pandu', 'email' => 'BbH7h@example.com'];
        
        return view('home',compact('data'));
    }
}

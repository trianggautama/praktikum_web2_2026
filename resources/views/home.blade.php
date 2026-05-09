@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h3>Halo Selamat Datang , user {{Auth::user()->nama}}</h3>
                <p>
                    ini adalah halaman login
                </p>
            </div>
        </div>
    </div>
@endsection
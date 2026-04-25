@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container mt-4">
        <h1>Ini Halaman Home</h1>
        <p>Nama : {{$data['name']}}</p>
        <p>Email : {{$data['email']}}</p>
    </div>
@endsection
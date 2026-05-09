@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="container mt-4">
   <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Profile User</h3>
                </div>
                <div class="col">
                    <div class="float-end">
                        <a href="{{route('home')}}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="table">
                <table class="table">
                    <tr>
                        <td width="20%">Nama</td>
                        <td width="1%"></td>
                        <td>
                            {{$profile->nama}}
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">Username</td>
                        <td width="1%"></td>
                        <td>
                            {{$profile->username}}
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">Tanggal Register</td>
                        <td width="1%"></td>
                        <td>
                            {{$profile->created_at->format('d F Y')}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
   </div>
</div>
@endsection
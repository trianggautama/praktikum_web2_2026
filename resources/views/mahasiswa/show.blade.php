@extends('layouts.app')
@section('title', 'Detail Mahasiswa')
@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Detail Data Mahasiswa</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 30%">NIM</th>
                    <td>{{ $mahasiswa->nim }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $mahasiswa->alamat }}</td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td>{{ $mahasiswa->jurusan }}</td>
                </tr>
                @if($mahasiswa->foto)
                <tr>
                    <th>Foto</th>
                    <td><img src="{{ asset('storage/'.$mahasiswa->foto) }}" alt="Foto" class="img-thumbnail" width="150"></td>
                </tr>
                @endif
            </table>
            <div class="d-flex justify-content-between">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

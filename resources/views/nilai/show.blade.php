@extends('layouts.app')
@section('title', 'Daftar Nilai')
@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> Detail Data Nilai</h5>
            </div>
            <div class="card-body">
               <table class="table table-bordered">
                    <tr>
                        <td style="width: 30%">NIM</td>
                        <td>{{ $nilai->mahasiswa->nim }}</td>
                    </tr>
                     <tr>
                        <td>Nama Mahasiswa</td>
                        <td>{{ $nilai->mahasiswa->nama }}</td>
                    </tr>
                     <tr>
                        <td>Mata Kuliah</td>
                        <td>{{ $nilai->mata_kuliah }}</td>
                    </tr>
                     <tr>
                        <td>Nilai</td>
                        <td>{{ $nilai->nilai }}</td>
                    </tr>
                     <tr>
                        <td>Klasifikasi</td>
                        <td>{{ $nilai->klasifikasi }}</td>
                    </tr>
               </table>
               <div class="d-flex justify-content-between">
                    <a href="{{ route('nilai.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-sm btn-warning">Edit</a>
               </div>
            </div>
        </div>
    </div>
@endsection
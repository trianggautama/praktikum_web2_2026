@extends('layouts.app')
@section('title', 'Daftar Nilai')
@section('content')
    <div class="container mt-4 mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> Data Nilai</h5>
                <a href="{{ route('nilai.create') }}" class=" btn btn-light btn-sm">+ Tambah Data</a>
            </div>
            <div class="card-body">
                <form action="{{route('nilai.index')}}" method="get" class="row g-2 mb-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari NIM atau Nama..." value="{{ old('search') }}">
                    </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Mata Kuliah</th>
                                <th>Nilai</th>
                                <th>Klasifikasi</th>
                                <th class="text-center" style="width: 200px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($datas as $nilai)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nilai->mahasiswa->nim }}</td>
                                    <td>{{ $nilai->mahasiswa->nama }}</td>
                                    <td>{{ $nilai->mata_kuliah }}</td>
                                    <td>{{ $nilai->nilai }}</td>
                                    <td>{{ $nilai->klasifikasi }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('nilai.show', $nilai->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('nilai.delete', $nilai->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse    
                        </tbody>  
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{$datas->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('title', 'Data Mahasiswa')
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
            <h5 class="mb-0">Data Mahasiswa</h5>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-light btn-sm">+ Tambah Data</a>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.index') }}" method="GET" class="row g-2 mb-3">
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
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th class="text-center" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($datas as $item)
                            <tr>
                                <td>{{ $loop->iteration + ($datas->currentPage() - 1) * $datas->perPage() }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('mahasiswa.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

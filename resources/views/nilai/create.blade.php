@extends('layouts.app')
@section('title', 'Daftar Nilai')
@section('content')
    <div class="container mt-4 mb-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> Tambah Data Nilai</h5>
            </div>
            <div class="card-body">
                <form action="{{route('nilai.store')}}" method="post">
                  @csrf 
                  <div class="mb-3">
                    <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('mahasiswa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="mb-3">
                    <label for="mata_kuliah" class="form-label"> Mata Kuliah</label>
                    <select name="mata_kuliah" id="mata_kuliah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Algoritma 1">Algoritma 1</option>
                        <option value="Algoritma 2">Algoritma 2</option>
                        <option value="Pemrograman Visual 1">Pemrograman Visual 1</option>
                        <option value="Pemrograman Visual 2">Pemrograman Visual 2</option>
                        <option value="Pemrograman Web 1">Pemrograman Web 1</option>
                        <option value="Pemrograman Web 2">Pemrograman Web 2</option>
                    </select>
                    @error('mata_kuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror" value="{{ old('nilai') }}" required>
                    @error('nilai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="d-flex content-justify-between">
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection
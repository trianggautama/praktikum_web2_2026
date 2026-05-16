@extends('layouts.app')
@section('title', 'Daftar Nilai')
@section('content')
<div class="container mt-4 mb-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> Edit Data Nilai</h5>
            </div>
            <div class="card-body">
                <form action="{{route('nilai.update',$nilai->id)}}" method="post">
                  @csrf 
                  @method('PUT')
                  <div class="mb-3">
                    <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}" {{ old('mahasiswa_id', $nilai->mahasiswa_id) == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('mahasiswa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="mb-3">
                    <label for="mata_kuliah" class="form-label"> Mata Kuliah</label>
                    <select name="mata_kuliah" id="mata_kuliah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Algoritma 1" {{ old('mata_kuliah', $nilai->mata_kuliah) == 'Algoritma 1' ? 'selected' : '' }}>Algoritma 1</option>
                        <option value="Algoritma 2" {{ old('mata_kuliah', $nilai->mata_kuliah) == 'Algoritma 2' ? 'selected' : '' }}>Algoritma 2</option>
                        <option value="Pemrograman Visual 1" {{ old('mata_kuliah', $nilai->mata_kuliah) == 'Pemrograman Visual 1' ? 'selected' : '' }}>Pemrograman Visual 1</option>
                        <option value="Pemrograman Visual 2" {{ old('mata_kuliah', $nilai->mata_kuliah) == 'Pemrograman Visual 2' ? 'selected' : '' }}>Pemrograman Visual 2</option>
                        <option value="Pemrograman Web 1" {{ old('mata_kuliah', $nilai->mata_kuliah) == 'Pemrograman Web 1' ? 'selected' : '' }}>Pemrograman Web 1</option>
                        <option value="Pemrograman Web 2" {{ old('mata_kuliah', $nilai->mata_kuliah) == 'Pemrograman Web 2' ? 'selected' : '' }}>Pemrograman Web 2</option>
                    </select>
                    @error('mata_kuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror" value="{{ old('nilai', $nilai->nilai) }}" required>
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
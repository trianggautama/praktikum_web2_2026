@extends('layouts.app')
@section('title', 'Edit Data Mahasiswa')
@section('content')
<div class="container mt-4 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Edit Data Mahasiswa</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                    value="{{ old('nama', $mahasiswa->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" 
                    value="{{ old('nim', $mahasiswa->nim) }}" required>
                    @error('nim')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') 
                        is-invalid @enderror" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" 
                        {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" 
                        {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control 
                        @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" required>
                        @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control 
                        @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" required>
                        @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') 
                    is-invalid @enderror" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid 
                    @enderror" value="{{ old('jurusan', $mahasiswa->jurusan) }}" required>
                    @error('jurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

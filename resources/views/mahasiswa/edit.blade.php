@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="container">
    <h1>Edit Data Mahasiswa</h1>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}"required>
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
            <option value="L" {{ $mahasiswa->jk == 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ $mahasiswa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prodi">PRODI</label>
            <input type="text" name="prodi" class="form-control" value="{{ $mahasiswa->prodi }}" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ $karyawan->tgl_lahir->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <input type="checkbox" class="form-check-input" id="nonreg" name="nonreg"
                           {{ old('nonreg') ? 'checked' : '' }}>
            <label class="form-check-label" for="nonreg">Mahasiswa Non-Reguler</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
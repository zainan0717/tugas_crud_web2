@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="container">
    <h1>Tambah Data Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prodi">PRODI</label>
            <input type="text" name="prodi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="nonreg" value="0">
            <input type="checkbox" class="form-check-input" id="nonreg" name="nonreg" value="1" 
                {{ old('nonreg', $mahasiswa->nonreg ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="nonreg">Mahasiswa Non-Reguler</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
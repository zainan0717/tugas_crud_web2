@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="container">
    <h1>Detail Mahasiswa</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mahasiswa->nama }}</h5>
            <p class="card-text">NIM: {{ $mahasiswa->nim }}</p>
            <p class="card-text">Jenis kelamin: {{ $mahasiswa->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
            <p class="card-text">PRODI: {{ $mahasiswa->prodi }}</p>
            <p class="card-text">Tanggal Lahir: {{ $mahasiswa->tgl_lahir->format('d-M-Y') }}</p>
            <p class="card-text">Status: {{ $mahasiswa->nonreg ? 'Non-Reguler' : 'Reguler' }}</p>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
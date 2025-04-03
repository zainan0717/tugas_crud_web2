@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>
    <div class="card">
        <div class="card-body">
            @if($karyawan->foto)
            <img src="{{ asset('storage/'.$karyawan->foto) }}" width="150" class="mb-3">
            @endif
            <h5 class="card-title">{{ $karyawan->nama }}</h5>
            <p class="card-text">NIP: {{ $karyawan->nip }}</p>
            <p class="card-text">Jenis kelamin: {{ $karyawan->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
            <p class="card-text">Tanggal Lahir: {{ $karyawan->tgl_lahir->format('d-M-Y') }}</p>
            <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
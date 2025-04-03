@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>
    <div class="card">
        <div class="card-body">
            @if($buku->foto_cover)
            <img src="{{ asset('storage/'.$buku->foto_cover) }}" width="150" class="mb-3">
            @endif
            <h5 class="card-title">{{ $buku->judul }}</h5>
            <p class="card-text">Kode Buku: {{ $buku->kodebuku }}</p>
            <p class="card-text">Pengarang: {{ $buku->pengarang }}</p>
            <p class="card-text">Penerbit: {{ $buku->penerbit }}</p>
            <p class="card-text">Tahun: {{ $buku->tahun }}</p>
            <a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
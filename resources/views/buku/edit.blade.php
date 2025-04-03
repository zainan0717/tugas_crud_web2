@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1>Edit Data Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kodebuku">Kode Buku</label>
            <input type="text" name="kodebuku" class="form-control" value="{{ $buku->kodebuku }}" required>
        </div>
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ $buku->tahun }}" required>
        </div>
        <div class="form-group">
            <label for="foto_cover">Upload Foto Cover</label>
            <input type="file" name="foto_cover" class="form-control">
            @if($buku->foto_cover)
            <img src="{{ asset('storage/'.$buku->foto_cover) }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
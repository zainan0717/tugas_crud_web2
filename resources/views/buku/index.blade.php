@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-users"></i> Daftar Buku</h2>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Buku
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Pengarangn</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Cover</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr onclick="window.location='{{ route('buku.show', $buku->id) }}';" 
            style="cursor: pointer;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buku->kodebuku }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun }}</td>
                <td>
                    @if($buku->foto_cover)
                    <img src="{{ asset('storage/'.$buku->foto_cover) }}" width="50" class="img-thumbnail">
                    @endif
                </td>
                <td class="action-buttons">
                    <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-info" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
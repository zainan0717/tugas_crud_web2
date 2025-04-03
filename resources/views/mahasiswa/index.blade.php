@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-users"></i> Daftar Mahasiswa</h2>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Mahasiswa
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>PRODI</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr onclick="window.location='{{ route('mahasiswa.show', $mahasiswa->id) }}';" 
            style="cursor: pointer;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                <td>{{ $mahasiswa->prodi }}</td>
                <td>{{ $mahasiswa->tgl_lahir->format('d-M-Y') }}</td>
                <td>
                    <span class="badge {{ $mahasiswa->nonreg ? 'bg-warning' : 'bg-success' }}">
                        {{ $mahasiswa->nonreg ? 'Non-Reguler' : 'Reguler' }}
                    </span>
                </td>
                <td class="action-buttons">
                    <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-info" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
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
@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-users"></i> Daftar Karyawan</h2>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Karyawan
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
            <tr onclick="window.location='{{ route('karyawan.show', $karyawan->id) }}';" 
            style="cursor: pointer;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $karyawan->nip }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                <td>{{ $karyawan->tgl_lahir->format('d-M-Y') }}</td>
                <td>
                    @if($karyawan->foto)
                    <img src="{{ asset('storage/'.$karyawan->foto) }}" width="50" class="img-thumbnail">
                    @endif
                </td>
                <td class="action-buttons">
                    <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-sm btn-info" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
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
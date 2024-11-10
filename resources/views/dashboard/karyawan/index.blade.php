@extends('dashboard.layouts.main')
@section('title', 'Data Karyawan')
@section('navAdm', 'active')

@section('content')

<div class="d-flex justify-content-between mb-3 align-items-center">
    <a href="/karyawan/create" class="btn btn-primary mb-3" style="background-color: #2d3c54; border-color: #2d3c54;">Tambah Karyawan</a>

    <form action="{{ url('/karyawan') }}" method="GET" class="d-flex w-auto">
        <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary ms-2" style="background-color: #2d3c54; border-color: #2d3c54;">Cari</button>
    </form>
</div>

@if(session('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card col-span-2 xl:col-span-1">
    <div class="card-header" style="background-color: #2d3c54; color: white;">Karyawan</div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $karyawan)
            <tr>
                <td class="text-center">{{ $karyawans->firstItem() + $loop->index }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->nik }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->nohp }}</td>
                <td>{{ $karyawan->departemen->nama_departemen }}</td>
                <td>{{ $karyawan->jabatan->nama_jabatan }}</td>
                <td class="text-center">
                    <a href="/karyawan/{{ $karyawan->id }}" title="Lihat Detail" class="btn btn-success btn-sm me-2" style="border-radius: 50%; padding: 5px 10px;">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="/karyawan/{{ $karyawan->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm me-2" style="border-radius: 50%; padding: 5px 10px;">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/karyawan/{{ $karyawan->id }}" title="Hapus Data" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" style="border-radius: 50%; padding: 5px 10px;" onclick="return confirm('Yakin akan menghapus data ini?')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<div class="d-flex justify-content-center">
    {{ $karyawans->links() }}
</div>
@endsection

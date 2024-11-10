@extends('dashboard.layouts.main')
@section('title', 'Penggajian Karyawan')
@section('navGaji', 'active')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <a href="/gaji/create" class="btn btn-primary mb-3" style="background-color: #2d3c54; border-color: #2d3c54;">Tambah Gaji</a>
</div>

{{-- dropdown tahun dan bulan --}}
<div class="mb-3">
    <form method="GET" action="{{ route('gaji.index') }}">
        <div class="row">
            <div class="col-md-4">
                <select name="tahun" class="form-select">
                    <option value="">Pilih Tahun</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="bulan" class="form-select">
                    <option value="">Pilih Bulan</option>
                    @foreach($months as $month)
                        <option value="{{ $month }}" {{ request('bulan') == $month ? 'selected' : '' }}>{{ $month }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
</div>

@if(session('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- tabel data gaji --}}
<div class="card col-span-2 xl:col-span-1">
    <div class="card-header" style="background-color: #2d3c54; color: white;">Data Penggajian</div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jabatan</th>
                <th>Tanggal Gajian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gajis as $gaji)
            <tr class="text-center">
                <td>{{ $gajis->firstItem() + $loop->index }}</td>
                <td>{{ $gaji->karyawan->nama }}</td>
                <td>{{ $gaji->karyawan->nik }}</td>
                <td>{{ $gaji->jabatan->nama_jabatan }}</td>
                <td>{{ $gaji->bulan_tahun }}</td>
                <td>
                    @if($gaji->status == 'Belum Diterima')
                        <form action="{{ route('gaji.ubah-status', $gaji->id) }}" method="post" class="d-inline">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Ubah Status</button>
                        </form>
                    @else
                        <span class="badge bg-success">Diterima</span>
                    @endif
                </td>
                <td class="text-nowrap">
                    <a href="/gaji/{{ $gaji->id }}/cetak-pdf" class="btn btn-primary btn-sm" target="_blank" style="border-radius: 50%; padding: 5px 10px;">
                        <i class="bi bi-printer"></i>
                    </a> |
                    <a href="/gaji/{{ $gaji->id }}" title="Lihat Detail" class="btn btn-success btn-sm" style="border-radius: 50%; padding: 5px 10px;">
                        <i class="bi bi-eye"></i>
                    </a> |
                    <a href="/gaji/{{ $gaji->id }}/edit" title="Edit Gaji" class="btn btn-warning btn-sm" style="border-radius: 50%; padding: 5px 10px;">
                        <i class="bi bi-pencil-square"></i>
                    </a> |
                    <form action="/gaji/{{ $gaji->id }}" title="Hapus Gaji" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" style="border-radius: 50%; padding: 5px 10px;" onclick="return confirm('Yakin akan menghapus data gaji ini?')">
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
    {{ $gajis->links() }}
</div>

@endsection

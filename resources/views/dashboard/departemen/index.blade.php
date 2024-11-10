@extends('dashboard.layouts.main')
@section('title', 'Data Departemen')
@section('navAdm', 'active')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <a href="/departemen/create" class="btn btn-primary" style="background-color: #2d3c54; border-color: #2d3c54;">Tambah Departemen</a>

    <!-- Form Search (aligned to the right) -->
    <form action="{{ url('/departemen') }}" method="GET" class="d-flex">
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
    <div class="card-header" style="background-color: #2d3c54; color: white;">Departemen</div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departemens as $departemen)
            <tr>
                <td class="text-center">{{ $departemens->firstItem() + $loop->index }}</td>
                <td>{{ $departemen->nama_departemen }}</td>
                <td class="text-center">
                    <a href="/departemen/{{ $departemen->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm me-2" style="border-radius: 50%; padding: 5px 10px;">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/departemen/{{ $departemen->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button title="Hapus Data" class="btn btn-danger btn-sm" style="border-radius: 50%; padding: 5px 10px;" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                            <i class="bi bi-trash"></i>
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
    {{ $departemens->links() }}
</div>

@endsection

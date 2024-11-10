@extends('dashboard.layouts.main')

@section('content')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Karyawan</h1>
</div> --}}
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-custom text-white">
        <h5 class="card-title mb-0">Informasi Karyawan</h5>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row" class="bg-light">Nama</th>
              <td>{{ $karyawan->nama }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">NIK</th>
              <td>{{ $karyawan->nik }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Tempat Lahir</th>
              <td>{{ $karyawan->tempat_lahir }}</td>
            </tr>
            <tr>
                <th scope="row" class="bg-light">Tanggal Lahir</th>
                <td>{{ \Carbon\Carbon::parse($karyawan->tgl_lahir)->translatedFormat('d F Y') }}</td>
              </tr>
            <tr>
              <th scope="row" class="bg-light">Email</th>
              <td>{{ $karyawan->email }}</td>
            </tr>
            <tr>
                <th scope="row" class="bg-light">NO HP</th>
                <td>{{ $karyawan->nohp }}</td>
            </tr>
            <tr>
                <th scope="row" class="bg-light">Tanggal Masuk</th>
                <td>{{ \Carbon\Carbon::parse($karyawan->tgl_masuk)->translatedFormat('d F Y') }}</td>
              </tr>
            <tr>
            <tr>
              <th scope="row" class="bg-light">Departemen</th>
              <td>{{ $karyawan->departemen->nama_departemen }}</td>
            </tr>
            <tr>
                <th scope="row" class="bg-light">Jabatan</th>
                <td>{{ $karyawan->jabatan->nama_jabatan }}</td>
              </tr>
            <tr>
              <th scope="row" class="bg-light">Alamat</th>
              <td>{{ $karyawan->alamat }}</td>
            </tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-between mt-4">
          <a href="/karyawan" class="btn btn-secondary">Kembali</a>
          <a href="/karyawan/{{ $karyawan->id }}/edit" class="btn btn-custom">Edit</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<style>
.bg-custom {
    background-color: #3A4D6B !important;
}

.btn-custom {
    background-color: #3A4D6B !important;
    border-color: #3A4D6B !important;
    color: white !important;
}

.btn-custom:hover {
    background-color: #33475C !important;
    border-color: #33475C !important;
}


</style>

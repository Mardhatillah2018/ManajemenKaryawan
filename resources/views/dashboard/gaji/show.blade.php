@extends('dashboard.layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-custom text-white">
        <h5 class="card-title mb-0">Detail Gaji</h5>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row" class="bg-light">Nama</th>
              <td>{{ $gaji->karyawan->nama }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">NIK</th>
              <td>{{ $gaji->karyawan->nik }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Departemen</th>
              <td>{{ $gaji->departemen->nama_departemen }}</td>
            </tr>
            <tr>
                <th scope="row" class="bg-light">Jabatan</th>
                <td>{{ $gaji->jabatan->nama_jabatan }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Gaji Pokok</th>
              <td>{{ number_format($gaji->jabatan->gaji_pokok, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Bonus</th>
              <td>{{ number_format($gaji->bonus, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Potongan</th>
              <td>{{ number_format($gaji->potongan, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Total Gaji</th>
              <td>{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Tanggal Gajian</th>
              <td>{{ \Carbon\Carbon::parse($gaji->bulan_tahun)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
              <th scope="row" class="bg-light">Status</th>
              <td>
                  @if($gaji->status == 'Belum Diterima')
                      <span class="badge bg-warning">Belum Diterima</span>
                  @else
                      <span class="badge bg-success">Diterima</span>
                  @endif
              </td>
            </tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-between mt-4">
          <a href="/gaji" class="btn btn-secondary">Kembali</a>
          <a href="/gaji/{{ $gaji->id }}/cetak-pdf" class="btn btn-custom d-flex align-items-center">
            <i class="bi bi-printer me-2"></i> Cetak
          </a>
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
    display: flex;
    align-items: center;
    padding: 8px 15px;
}

.btn-custom:hover {
    background-color: #33475C !important;
    border-color: #33475C !important;
}

.btn-custom i {
    font-size: 18px;
}

.me-2 {
    margin-right: 0.5rem;
}
</style>

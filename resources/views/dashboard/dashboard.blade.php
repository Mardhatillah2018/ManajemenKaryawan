@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="h3">Welcome {{ Auth::user()->name }}</h3>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm hover-card">
            <a href="{{ route('karyawan.index') }}" class="text-decoration-none">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="h4">
                        <i class="bi bi-people-fill fs-2" style="color: #3A4D6B;"></i>
                    </div>
                    <div class="text-end">
                        <h1 class="h3 num-4 mb-0" style="color: #3A4D6B;">
                            {{ $jumlahKaryawan }}
                        </h1>
                        <p style="color: #3A4D6B;" class="mb-0">Jumlah Karyawan</p>
                    </div>
                </div>
            </a>
            <div class="card-footer bg-white p-2 border-0"></div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm hover-card">
            <a href="{{ route('departemen.index') }}" class="text-decoration-none">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="h4">
                        <i class="bi bi-building fs-2" style="color: #3A4D6B;"></i>
                    </div>
                    <div class="text-end">
                        <h1 class="h3 num-4 mb-0" style="color: #3A4D6B;">
                            {{ $jumlahDepartemen }}
                        </h1>
                        <p style="color: #3A4D6B;" class="mb-0">Jumlah Departemen</p>
                    </div>
                </div>
            </a>
            <div class="card-footer bg-white p-2 border-0"></div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm hover-card">
            <a href="{{ route('jabatan.index') }}" class="text-decoration-none">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="h4">
                        <i class="bi bi-person-workspace fs-2" style="color: #3A4D6B;"></i>
                    </div>
                    <div class="text-end">
                        <h1 class="h3 num-4 mb-0" style="color: #3A4D6B;">
                            {{ $jumlahJabatan }}
                        </h1>
                        <p style="color: #3A4D6B;" class="mb-0">Jumlah Jabatan</p>
                    </div>
                </div>
            </a>
            <div class="card-footer bg-white p-2 border-0"></div>
        </div>
    </div>
</div>

<div class="row">
    {{-- pie chart distribusi jabatan --}}
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm" style="height: 400px; display: flex; flex-direction: column;">
            <div class="card-header" style="background-color: #3A4D6B;">
                <h5 class="card-title mb-0 text-white">Distribusi Jabatan</h5>
            </div>
            <div class="card-body p-0" style="flex-grow: 1; overflow: hidden;">
                <canvas id="jabatanChart" style="width: 100%; height: 100%;"></canvas>
            </div>
        </div>
    </div>

    {{-- 3 card statistik gaji --}}
    <div class="col-md-6 mb-4">
        <div class="row">
            {{-- statistik gaji --}}
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="h4">
                            <i class="bi bi-wallet2 fs-2" style="color: #3A4D6B;"></i>
                        </div>
                        <div class="text-end">
                            <h2 class="h4 num-4 mb-0" style="color: #3A4D6B;">
                                Rp{{ number_format($totalGaji, 0, ',', '.') }}
                            </h2>
                            <p style="color: #232f41;" class="mb-0">Total Gaji Dibayarkan ({{ $tahunTerakhir }})</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- statistik bonus --}}
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="h4">
                            <i class="bi bi-currency-dollar fs-2" style="color: #3A4D6B;"></i>
                        </div>
                        <div class="text-end">
                            <h2 class="h4 num-4 mb-0" style="color: #3A4D6B;">
                                Rp{{ number_format($totalBonus, 0, ',', '.') }}
                            </h2>
                            <p style="color: #232f41;" class="mb-0">Total Bonus ({{ $tahunTerakhir }})</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- statistik potongan --}}
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="h4">
                            <i class="bi bi-file-earmark-x fs-2" style="color: #3A4D6B;"></i>
                        </div>
                        <div class="text-end">
                            <h2 class="h4 num-4 mb-0" style="color: #3A4D6B;">
                                Rp{{ number_format($totalPotongan, 0, ',', '.') }}
                            </h2>
                            <p style="color: #232f41;" class="mb-0">Total Potongan ({{ $tahunTerakhir }})</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: background-color 0.3s, color 0.3s;
    }
    .hover-card:hover {
        background-color: #3A4D6B; /* Warna biru saat di-hover */
    }
    .hover-card:hover .text-end h1,
    .hover-card:hover .text-end p,
    .hover-card:hover i {
        color: #ffffff !important; /* Warna putih untuk teks dan ikon saat di-hover */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // grafik distribusi jabatan
    var jabatanCtx = document.getElementById('jabatanChart').getContext('2d');
    var jabatanChart = new Chart(jabatanCtx, {
        type: 'pie',
        data: {
            labels: @json($jabatanLabels),
            datasets: [{
                label: 'Jumlah Karyawan per Jabatan',
                data: @json($jabatanCounts),
                backgroundColor: [
                    '#3A4D6B',
                    '#5D7D8D',
                    '#8D9DAD',
                    '#3A4D6B',
                    '#5D7D8D',
                    '#8D9DAD'
                ],
                borderColor: [
                    '#3A4D6B', '#5D7D8D', '#8D9DAD', '#3A4D6B', '#5D7D8D', '#8D9DAD'
                ],
                borderWidth: 1
            }]
        }
    });
</script>

@endsection

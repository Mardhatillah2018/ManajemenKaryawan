<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Jabatan;
use App\Models\Gaji;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // statistik karyawan
        $jumlahKaryawan = Karyawan::count();
        $jumlahDepartemen = Departemen::count();
        $jumlahJabatan = Jabatan::count();

        // tahun terakhir gaji
        $tahunTerakhir = Gaji::max(DB::raw('YEAR(bulan_tahun)'));

        // statistik keuangan tahun akhir
        $totalGaji = Gaji::whereYear('bulan_tahun', $tahunTerakhir)->sum('total_gaji');
        $totalBonus = Gaji::whereYear('bulan_tahun', $tahunTerakhir)->sum('bonus');
        $totalPotongan = Gaji::whereYear('bulan_tahun', $tahunTerakhir)->sum('potongan');

        // karyawan per departemen
        $jumlahKaryawanPerDepartemen = Karyawan::selectRaw('departemen_id, count(*) as total')
            ->groupBy('departemen_id')
            ->get();

        // karyawan per jabatan
        $jumlahKaryawanPerJabatan = Karyawan::selectRaw('jabatan_id, count(*) as total')
            ->groupBy('jabatan_id')
            ->with('jabatan') // Mengambil relasi jabatan
            ->get();

        $jabatanLabels = $jumlahKaryawanPerJabatan->map(function ($item) {
            return $item->jabatan->nama_jabatan;
        });

        $jabatanCounts = $jumlahKaryawanPerJabatan->pluck('total'); // jumlah total karyawan perjabatan

        return view('dashboard.dashboard', compact(
            'jumlahKaryawan',
            'jumlahDepartemen',
            'jumlahJabatan',
            'totalGaji',
            'totalBonus',
            'totalPotongan',
            'jumlahKaryawanPerDepartemen',
            'jumlahKaryawanPerJabatan',
            'jabatanLabels',
            'jabatanCounts',
            'tahunTerakhir'
        ));
    }

}

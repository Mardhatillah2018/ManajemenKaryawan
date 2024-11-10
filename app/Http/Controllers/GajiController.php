<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class GajiController extends Controller
{

    public function index(Request $request)
    {
        // untuk filter data tahun yang tersedia
        $years = Gaji::selectRaw('YEAR(bulan_tahun) as year')->distinct()->get()->pluck('year');

        // untuk filter data bulan yang tersedia
        $months = collect(range(1, 12))->map(function ($month) {
             return Carbon::createFromFormat('m', $month)->monthName;
        });

        // ambil data gaji
        $query = Gaji::query();

        // filter tahun
        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('bulan_tahun', $request->tahun);
        }

        //filter bulan
        if ($request->has('bulan') && $request->bulan != '') {
            $monthNumber = Carbon::parse("01 {$request->bulan}")->format('m');
            $query->whereMonth('bulan_tahun', $monthNumber);
        }

        // data gaji
        $gajis = $query->with(['karyawan', 'jabatan'])->paginate(10);

        return view('dashboard.gaji.index', compact('gajis', 'years', 'months'));
    }

    public function create()
    {
        return view('dashboard.gaji.create', [
            'departemens' => Departemen::all(),
            'jabatans' => Jabatan::all(),
            'karyawans' => Karyawan::all(),
        ]);
    }

    public function store(Request $request)
    {
        // validasi input
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'bonus' => 'required|numeric',
            'potongan' => 'required|numeric',
            'bulan_tahun' => 'required|date',
            'status' => 'required|in:Diterima,Belum Diterima',
        ]);

        // data karyawan
        $karyawan = Karyawan::with('jabatan', 'departemen')->findOrFail($validated['karyawan_id']);

        $validated['total_gaji'] = $karyawan->jabatan->gaji_pokok + $validated['bonus'] - $validated['potongan'];

        // simpan data gaji
        Gaji::create([
            'karyawan_id' => $validated['karyawan_id'],
            'jabatan_id' => $karyawan->jabatan->id,
            'departemen_id' => $karyawan->departemen->id,
            'bonus' => $validated['bonus'],
            'potongan' => $validated['potongan'],
            'total_gaji' => $validated['total_gaji'],
            'bulan_tahun' => $validated['bulan_tahun'],
            'status' => $validated['status'],
        ]);

        return redirect('/gaji')->with('pesan', 'Data berhasil disimpan');
    }

    public function show(Gaji $gaji)
    {
        return view('dashboard.gaji.show', compact('gaji'));
    }

    public function edit($id)
    {
        // mengambil data untuk edit
        $gaji = Gaji::findOrFail($id);
        return view('dashboard.gaji.edit', [
            'departemens' => Departemen::all(),
            'jabatans' => Jabatan::all(),
            'karyawans' => Karyawan::all(),
            'gaji' => $gaji
        ]);
    }

    public function update(Request $request, $id)
    {
        // validasi input
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'bonus' => 'required|numeric',
            'potongan' => 'required|numeric',
            'bulan_tahun' => 'required|date',
            'status' => 'required|in:Belum Diterima,Diterima',
        ]);

        // data karyawan
        $karyawan = Karyawan::with('jabatan', 'departemen')->findOrFail($validated['karyawan_id']);

        // total gaji
        $validated['total_gaji'] = $karyawan->jabatan->gaji_pokok + $validated['bonus'] - $validated['potongan'];

        // update gaji
        $gaji = Gaji::findOrFail($id);
        $gaji->update([
            'karyawan_id' => $validated['karyawan_id'],
            'jabatan_id' => $karyawan->jabatan->id,
            'departemen_id' => $karyawan->departemen->id,
            'bonus' => $validated['bonus'],
            'potongan' => $validated['potongan'],
            'total_gaji' => $validated['total_gaji'],
            'bulan_tahun' => $validated['bulan_tahun'],
            'status' => $validated['status'],
        ]);

        return redirect('/gaji')->with('pesan', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Gaji::destroy($id);
        return redirect('/gaji')->with('pesan', 'Data berhasil dihapus');
    }

    public function ubahStatus($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->update(['status' => 'Diterima']);
        return redirect()->route('gaji.index')->with('pesan', 'Status gaji berhasil diperbarui');
    }

    public function cetakPdf($id)
    {
        // ambil data gaji
        $gaji = Gaji::findOrFail($id);

        $pdf = PDF::loadView('dashboard.gaji.cetakPdf', ['gaji' => $gaji]);
        return $pdf->stream('Slip-Gaji-' . $gaji->karyawan->nama . '.pdf');
    }


}

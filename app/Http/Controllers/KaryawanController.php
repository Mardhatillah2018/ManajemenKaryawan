<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // input pencarian
        $search = request('search');

        if ($search) {
            $karyawans = Karyawan::where('nama', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('nohp', 'like', '%' . $search . '%')
                ->orWhereHas('departemen', function($query) use ($search) {
                    $query->where('nama_departemen', 'like', '%' . $search . '%');
                })
                ->orWhereHas('jabatan', function($query) use ($search) {
                    $query->where('nama_jabatan', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10);
        } else {
            $karyawans = Karyawan::latest()->paginate(10);
        }

        return view('dashboard.karyawan.index', [
            'karyawans' => $karyawans
        ]);
    }

    public function create()
    {
        return view('dashboard.karyawan.create',[
            'departemens' =>Departemen::all(),
            'jabatans' =>Jabatan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nik' => 'required|unique:karyawans',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'tgl_masuk' => 'required',
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'alamat' => 'nullable',
         ]);

         //dd($validated);

         Karyawan::create($validated);
         return redirect('/karyawan')->with('pesan', 'Data berhasil disimpan');
    }

    public function show(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('dashboard.karyawan.show', compact('karyawan'));
    }

    public function edit(string $id)
    {
        $departemens = Departemen::all();
        $jabatans = Jabatan::all();
        $karyawan = Karyawan::findOrFail($id);

        return view('dashboard.karyawan.edit', compact('departemens', 'jabatans', 'karyawan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'nik' => 'required|max:15',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'email' => 'required|email',
            'nohp' => 'required',
            'tgl_masuk' => 'required|date',
            'departemen_id' => 'required|exists:departemens,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'alamat' => 'nullable',
        ]);

        // update data karyawan
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($validated);

        // update jabatan dan departemen di tabel gajis dan hitung ulang total_gaji
        $gajis = Gaji::where('karyawan_id', $id)->get();
        foreach ($gajis as $gaji) {
            $total_gaji = $karyawan->jabatan->gaji_pokok + $gaji->bonus - $gaji->potongan;
            $gaji->update([
                'jabatan_id' => $validated['jabatan_id'],
                'departemen_id' => $validated['departemen_id'],
                'total_gaji' => $total_gaji,
            ]);
        }

        return redirect('/karyawan')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        Karyawan::destroy($id);
        return redirect('karyawan')->with('pesan', 'Data berhasil dihapus');
    }

    public function jumlahKaryawan()
    {
        $jumlahKaryawan = Karyawan::count(); // menghitung total karyawan
        return view('dashboard.dashboard', compact('jumlahKaryawan'));
    }
}

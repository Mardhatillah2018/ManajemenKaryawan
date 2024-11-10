<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $search = request('search');
        $jabatans = Jabatan::latest()
            ->when($search, function ($query, $search) {
                return $query->where('nama_jabatan', 'like', "%$search%")
                            ->orWhere('gaji_pokok', 'like', "%$search%");
            })
            ->paginate(10);

        return view('dashboard.jabatan.index', ['jabatans' => $jabatans]);
    }


    public function create()
    {
        return view('dashboard.jabatan.create', ['jabatans'=>Jabatan::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|min:3',
            'gaji_pokok' => 'required|integer'
        ]);

        Jabatan::create($validated);
        return redirect('/jabatan')->with('pesan','Data berhasil disimpan');
    }

    public function show(Jabatan $jabatan)
    {
        //
    }

    public function edit(string $id)
    {
        $jabatan = Jabatan::find($id);
        return view('dashboard.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|min:3',
            'gaji_pokok' => 'required|integer'
        ]);

        Jabatan::where('id', $id)->update($validated);
        return redirect('jabatan')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        Jabatan::destroy($id);
        return redirect('jabatan')->with('pesan','Data berhasil dihapus');
    }
    public function jumlahJabatan()
    {
        $jumlahJabatan = Jabatan::count(); // menghitung total jabatan
        return view('dashboard.dashboard', compact('jumlahJabatan'));
    }
}

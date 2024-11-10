<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departemens = Departemen::when($search, function ($query, $search) {
            return $query->where('nama_departemen', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('dashboard.departemen.index', ['departemens' => $departemens]);
    }

    public function create()
    {
        return view('dashboard.departemen.create',['departemens' =>Departemen::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required|min:3',
         ]);

         //dd($validated);

         Departemen::create($validated);
         return redirect('/departemen')->with('pesan', 'Data berhasil disimpan');
    }

    public function show(departemen $departemen)
    {
        //
    }

    public function edit(string $id)
    {
        $departemen = Departemen::find($id);
        return view('dashboard.departemen.edit', compact('departemen'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required|min:3',
         ]);

         Departemen::where('id', $id)->update($validated);
         return redirect('departemen')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        Departemen::destroy($id);
        return redirect('departemen')->with('pesan', 'Data berhasil dihapus');
    }
    public function jumlahdepartemen()
    {
        $jumlahDepartemen = Departemen::count(); // Menghitung total produk
        return view('dashboard.dashboard', compact('jumlahDepartemen'));
    }
}

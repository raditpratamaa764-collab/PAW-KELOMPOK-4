<?php

namespace App\Http\Controllers;

use App\Models\Tambah;
use Illuminate\Http\Request;

class TambahController extends Controller
{
    public function index()
    {
        $tambah = Tambah::orderByDesc('No')->get();
        return view('tambah.index', compact('tambah'));
    }

    public function daftar()
    {
        return view('tambah.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|max:100',
            'jabatan' => 'required',
            'nomor'   => 'required',
        ]);

        Tambah::create([
            'Nama'    => $request->nama,
            'Jabatan' => $request->jabatan,
            'Nomor'   => $request->nomor,
        ]);

        return redirect()->route('tambah.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tambah = Tambah::findOrFail($id);
        return view('tambah.edit', compact('tambah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|max:100',
            'jabatan' => 'required',
            'nomor'   => 'required',
        ]);

        $tambah = Tambah::findOrFail($id);
        
        
        $tambah->update([
            'Nama'    => $request->nama,
            'Jabatan' => $request->jabatan,
            'Nomor'   => $request->nomor,
        ]);

        return redirect()->route('tambah.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Tambah $tambah)
    {
        $tambah->delete();
        return redirect()->route('tambah.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
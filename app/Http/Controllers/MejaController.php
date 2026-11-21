<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $data_meja = Meja::all(); 
        return view('meja.index', compact('data_meja'));
    }

    public function create()
    {
        return view('meja.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate ([
            'nomor_meja' => 'required|unique:data_meja,Nomor_Meja',
            'Kapasitas' => 'required|in:2,4,6',
            'area' => 'required|in:indoor,outdoor,VIP',
            'status' => 'required|in:Tersedia,Tidak Tersedia,Penuh',
        ]);
            

        Meja::create([
        'Nomor_Meja' => $data['nomor_meja'],
            'Kapasitas'  => $data['Kapasitas'],
            'Area'       => $data['area'],
            'Status'     => $data['status'],
        ]);
        return redirect()->route('meja.index')->with('success', 'Data meja berhasil ditambahkan.');
    }

    public function edit(Meja $meja)
    {
        return view('meja.edit', compact('meja'));
    }

    public function update(Request $request, Meja $meja)
    {
        if ($request->user()->can('ubahStrukturMeja', $meja)) {
            $data = $request->validate([
                'nomor_meja' => 'required|unique:data_meja,Nomor_Meja,' . $meja->Nomor_Meja . ',Nomor_Meja',
                'Kapasitas' => 'required|in:2,4,6',
                'area' => 'required|in:indoor,outdoor,VIP',
                'status' => 'required|in:Tersedia,Tidak Tersedia,Penuh',
            ]);

            $meja->update([
                'Nomor_Meja' => $data['nomor_meja'],
                'Kapasitas' => $data['Kapasitas'],
                'Area' => $data['area'],
                'Status' => $data['status'],
            ]);
        } else {
            $data = $request->validate([
                'status' => 'required|in:Tersedia,Tidak Tersedia,Penuh',
            ]);

            $meja->update([
                'Status' => $data['status'],
            ]);
        }

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil diperbarui.');
    }

    public function destroy(Meja $meja)
    {
        $meja->delete();
        
        return redirect()->route('meja.index')->with('success','Data meja berhasil di hapus.');
    }
}

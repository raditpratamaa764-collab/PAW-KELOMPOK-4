<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
{
    return view('pegawai.index', ['pegawai' => Pegawai::orderBy('No')->get()]);
}

public function create()  { return view('pegawai.create'); }

public function store(Request $request)
{
    $data = $request->validate([
        'Nama'    => 'required|string|max:255',
        'Jabatan' => 'required|in:Chef,Waiters,Cashier',
        'Nomor'   => 'required|string|max:20',
    ]);
    Pegawai::create($data);
    return redirect()->route('pegawai.index');
}

public function edit(Pegawai $pegawai)   { return view('pegawai.edit', compact('pegawai')); }

public function update(Request $request, Pegawai $pegawai)
{
    $data = $request->validate([
        'Nama'    => 'required|string|max:255',
        'Jabatan' => 'required|in:Chef,Waiters,Cashier',
        'Nomor'   => 'required|string|max:20',
    ]);
    $pegawai->update($data);
    return redirect()->route('pegawai.index');
}

public function destroy(Pegawai $pegawai)
{
    $pegawai->delete();
    return redirect()->route('pegawai.index');
}
}

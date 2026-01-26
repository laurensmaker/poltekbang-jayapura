<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::all();
        return view('backend.mahasiswa.index', compact('mahasiswa'));
    }

    public function create(){
        $jadwal = Jadwal::all();
        return view('backend.mahasiswa.create', compact('jadwal'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama'   => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp'  => 'required|string|max:20',
            'prodi'  => 'required|string',
        ]);

        // Simpan data ke database
        Mahasiswa::create([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
            'prodi'  => $request->prodi,
            'id_jadwal'  => $request->id_jadwal,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success_add', 'Data mahasiswa berhasil disimpan');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jadwal = Jadwal::all();
        return view('backend.mahasiswa.edit', compact('mahasiswa', 'jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp'  => 'required|string|max:20',
            'prodi'  => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
            'prodi'  => $request->prodi,
            'id_jadwal'  => $request->id_jadwal,
        ]);

        return redirect()->route('mahasiswa.index')
                         ->with('success_update', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('deleted', 'Data mahasiswa berhasil dihapus!');

    }


}

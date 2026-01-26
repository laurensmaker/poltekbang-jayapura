<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(){
        $matkul = Matakuliah::all();
        return view('backend.matakuliah.index', compact('matkul'));
    }

    public function create(){
        return view('backend.matakuliah.create');
    }

    public function store(Request $request){
        $matkul = $request->validate([
            'nama' => 'required',
            'kode_matkul' => 'required',
            'jumlah_sks' => 'required',
            'kategori' => 'required',
            'prodi' => 'required',
        ]);
        Matakuliah::create($matkul);
        return redirect()->route('matakuliah.index')->with('success_add', 'Data Matakuliah Berhasil ditambahkan!');
    }

    public function edit($id){
        $matkul = Matakuliah::find($id);
        return view('backend.matakuliah.edit', compact('matkul'));
    }

    public function update(Request $request, $id){
         $matkul = $request->validate([
            'nama' => 'required',
            'kode_matkul' => 'required',
            'jumlah_sks' => 'required',
            'kategori' => 'required',
            'prodi' => 'required'
        ]);

        $matkulUpdate = Matakuliah::find($id);
        $matkulUpdate->update($matkul);
        return redirect()->route('matakuliah.index')->with('success_update', 'Data Matakuliah Berhasil diupdate!');

    }

    public function destroy($id){
        $matkul = Matakuliah::find($id);
        $matkul->delete();
        return redirect()->route('matakuliah.index')->with('deleted', 'Data Matakuliah Berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        $dosen = Dosen::all();
        return view('backend.dosen.index', compact('dosen'));
    }

    public function create(){
        return view('backend.dosen.create');
    }

    public function store(Request $request){
        // dd($request);
        $dosen = $request->validate([
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'gelar_depan' => '',
            'gelar_belakang' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'prodi' => 'required',
        ]);

        Dosen::create($dosen);
        User::create([
            'name' => $request->nama_dosen,
            'email' => $request->email,
            'password' => $request->email,
            'level' => 'Dosen',
        ]);
        return redirect()->route('dosen.index')->with('success_add', 'Data Dosen Berhasil disimpan!');
    }

    public function edit($id){
        $dosen = Dosen::find($id);
        return view('backend.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id){
        $dosen = $request->validate([
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'gelar_depan' => '',
            'gelar_belakang' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'prodi' => 'required',
        ]);

        $dosenUpdate = Dosen::find($id);
        $dosenUpdate->update($dosen);
        return redirect()->route('dosen.index')->with('success_update', 'Data Dosen Berhasil diupdate!');
    }

    public function destroy($id){
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('deleted', 'Data Dosen Berhasil dihapus!');

    }


}

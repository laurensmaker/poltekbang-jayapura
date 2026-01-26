<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(){
        $jadwal = Jadwal::with('dosen', 'matakuliah')->get();
        return view('backend.jadwal.index', compact('jadwal'));
    }

    public function create(){
        $dosen = Dosen::all();
        $matkul = Matakuliah::all();
        return view('backend.jadwal.create', compact('dosen', 'matkul'));
    }

    public function store(Request $request){
        $jadwal = $request->validate([
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'hari' => 'required',
            'id_dosen' => 'required',
            'id_matakuliah' => 'required'
        ]);

        Jadwal::create($jadwal);
        return redirect()->route('jadwal.index')->with('success_add', 'Data Jadwal Berhasil disimpan!');
    }

    public function edit($id){
        $jadwal = Jadwal::find($id);
        $matkul = Matakuliah::all();
        $dosen = Dosen::all();
        return view('backend.jadwal.edit', compact('jadwal', 'matkul', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_matakuliah' => 'required|exists:matakuliah,id',
            'id_dosen'      => 'required|exists:dosen,id',
            'waktu_mulai'   => 'required',
            'waktu_selesai' => 'required',
            'hari'          => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'id_matakuliah' => $request->id_matakuliah,
            'id_dosen'      => $request->id_dosen,
            'waktu_mulai'   => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'hari'          => $request->hari,
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success_update', 'Data jadwal berhasil diperbarui');
    }

    public function destroy($id){
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect()
            ->route('jadwal.index')
            ->with('deleted', 'Data jadwal berhasil dihapus');
    }

    public function jadwalTlb()
    {
        $jadwal = Jadwal::with('matakuliah')
            ->whereHas('matakuliah', function($q){
                $q->where('prodi', 'Teknik Listrik Bandara'); // ID Prodi TLB
            })
            ->get();
            // dd($jadwal);

        return view('frontend.jadwal.jadwal-tlb', [
            'judul' => 'Jadwal Prodi Teknik Listrik Bandara',
            'jadwalTlb' => $jadwal
        ]);
    }

    public function jadwalMbu()
    {
        $jadwal = Jadwal::with('matakuliah')
            ->whereHas('matakuliah', function($q){
                $q->where('prodi', 'Manajemen Bandar Udara'); // ID Prodi TLB
            })
            ->get();
            // dd($jadwal);

        return view('frontend.jadwal.jadwal-mbu', [
            'judul' => 'Jadwal Prodi Manajemen Bandar Udara',
            'jadwalTlb' => $jadwal
        ]);
    }

}
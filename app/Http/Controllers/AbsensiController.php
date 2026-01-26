<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{


    public function index()
    {
        $user = Auth::user();

        // Pastikan hanya dosen
        if ($user->level !== 'Dosen') {
            abort(403, 'Akses ditolak');
        }

        // Ambil data dosen berdasarkan email login
        $dosen = Dosen::where('email', $user->email)->firstOrFail();

        // Ambil jadwal yang diampu dosen
        $jadwal = Jadwal::where('id_dosen', $dosen->id)
                        ->with('matakuliah')
                        ->get();

        // Ambil ID jadwal dosen
        $jadwalIds = $jadwal->pluck('id');

        // Ambil mahasiswa sesuai jadwal dosen
        $mahasiswa = Mahasiswa::whereIn('id_jadwal', $jadwalIds)->get();

        // Ambil absensi sesuai jadwal dosen
        $absensi = Absensi::whereIn('id_jadwal', $jadwalIds)->get();

        return view('backend.absensi.index', compact('jadwal', 'mahasiswa', 'absensi'));
    }

    public function show($id)
    {
        $jadwal = Jadwal::with(['matakuliah'])->findOrFail($id);

        $absensi = Absensi::where('id_jadwal', $id)
                        ->with('mahasiswa')
                        ->get();

        return view('backend.absensi.show', compact('jadwal', 'absensi'));
    }

    public function create(Request $request)
    {
        // ambil jadwal yang dipilih dari halaman sebelumnya
        $jadwal = Jadwal::with('matakuliah')->findOrFail($request->jadwal_id);

        // ambil mahasiswa yang mengontrak jadwal tersebut
        $mahasiswa = Mahasiswa::where('id_jadwal', $jadwal->id)->get();

        return view('backend.absensi.create', compact('jadwal', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'tanggal'   => 'required|date',
            'id_jadwal' => 'required',
            'status'    => 'required|array'
        ]);

        foreach ($request->status as $id_mahasiswa => $status) {

            Absensi::create([
                'tanggal'      => $request->tanggal,
                'status'       => $status,
                'keterangan'   => $request->keterangan[$id_mahasiswa] ?? null,
                'id_jadwal'    => $request->id_jadwal,
                'id_mahasiswa' => $id_mahasiswa,
            ]);
        };

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan');
    }




}

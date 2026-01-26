@extends('backend.layouts.main')

@section('content')

<h4 class="mb-3">Detail Absensi Mahasiswa</h4>

<div class="card mb-4">
    <div class="card-body">
        <p class="mb-1">
            <strong>Mata Kuliah :</strong> {{ $jadwal->matakuliah->nama }}
        </p>
        <p class="mb-1">
            <strong>Hari / Jam :</strong> {{ $jadwal->hari }} ({{ $jadwal->waktu_mulai }})
        </p>
        <p class="mb-0">
            <strong>Dosen :</strong> {{ auth()->user()->name }}
        </p>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal</th>
                    <th>Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($absensi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mahasiswa->nama }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            <span class="badge 
                                @if($item->status == 'Hadir') bg-success
                                @elseif($item->status == 'Izin') bg-warning
                                @elseif($item->status == 'Sakit') bg-info
                                @else bg-danger
                                @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Data absensi belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('absensi.index') }}" class="btn btn-secondary mt-3">
            Kembali
        </a>

    </div>
</div>

@endsection

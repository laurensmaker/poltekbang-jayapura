@extends('backend.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <h3 class="mb-4">Absensi Mahasiswa</h3>

        <div class="row">
            @forelse ($jadwal as $item)
                <div class="col-lg-4 col-sm-6">
                    <div class="stats-box card bg-white border-0 rounded-10 mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1">
                                        {{ $item->matakuliah->nama }}
                                    </h5>
                                    <span class="text-muted">
                                        {{ $item->hari }} | {{ $item->waktu_mulai }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <a href="{{ route('absensi.show', $item->id) }}" 
                                   class="fw-semibold text-white btn btn-sm btn-success text-decoration-none me-5">
                                    Lihat Absensi
                                </a>

                                <a href="{{ route('absensi.create', ['jadwal_id' => $item->id]) }}"
                                   class="fw-semibold text-white btn btn-sm btn-primary text-decoration-none">
                                    Isi Absensi
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        Belum ada jadwal absensi untuk dosen ini.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection

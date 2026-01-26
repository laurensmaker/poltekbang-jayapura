@extends('backend.layouts.main')

@section('content')
<div class="row">
    <div class="col-md-3">
        <a href="{{ route('absensi.index') }}" class=" mb-4 btn btn-secondary">Kembali</a>

    </div>
</div>
<h4 class="mb-3">Absensi Mahasiswa</h4>

<div class="card">
    <div class="card-body">

        {{-- <p>
            <strong>Mata Kuliah :</strong> {{ $jadwal->mataKuliah->nama_mk }} <br>
            <strong>Kelas :</strong> {{ $jadwal->kelas }} <br>
            <strong>Pertemuan :</strong> {{ $pertemuan }}
        </p> --}}

       <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            {{-- tanggal absensi --}}
            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

            {{-- id jadwal --}}
            <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">

            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        {{-- <th>NIM</th> --}}
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nama }}</td>
                        {{-- <td>{{ $mhs->nim }}</td> --}}

                        {{-- STATUS --}}
                        <td>
                            <select name="status[{{ $mhs->id }}]" class="form-select" required>
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Alpha">Alpha</option>
                            </select>
                        </td>

                        {{-- KETERANGAN --}}
                        <td>
                            <input type="text"
                                name="keterangan[{{ $mhs->id }}]"
                                class="form-control"
                                placeholder="Opsional">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success mt-3">
                Simpan Absensi
            </button>
        </form>

    </div>
</div>

@endsection

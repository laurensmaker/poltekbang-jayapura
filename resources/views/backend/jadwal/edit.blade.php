@extends('backend.layouts.main')
@section('content')

<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Form Edit Jadwal</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('jadwal.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home Jadwal</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2"> Edit Jadwal</span>
        </li>
    </ul>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <h4 class="fs-18 mb-4">Edit Jadwal</h4>

                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Matakuliah --}}
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Matakuliah</label>
                                <div class="form-group position-relative">
                                    <select name="id_matakuliah" class="form-select form-control ps-5 h-58">
                                        <option value="">-- Pilih Matakuliah --</option>
                                        @foreach ($matkul as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('id_matakuliah', $jadwal->id_matakuliah) == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="ri-book-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Dosen --}}
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Dosen / Pengajar</label>
                                <div class="form-group position-relative">
                                    <select name="id_dosen" class="form-select form-control ps-5 h-58">
                                        <option value="">-- Pilih Dosen --</option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('id_dosen', $jadwal->id_dosen) == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Waktu Mulai --}}
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Waktu Mulai</label>
                                <input type="time" name="waktu_mulai"
                                    value="{{ old('waktu_mulai', $jadwal->waktu_mulai) }}"
                                    class="form-control ps-5 h-58">
                            </div>
                        </div>

                        {{-- Waktu Selesai --}}
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Waktu Selesai</label>
                                <input type="time" name="waktu_selesai"
                                    value="{{ old('waktu_selesai', $jadwal->waktu_selesai) }}"
                                    class="form-control ps-5 h-58">
                            </div>
                        </div>

                        {{-- Hari --}}
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label">Hari Perkuliahan</label>
                                <select name="hari" class="form-select form-control ps-5 h-58">
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach (['Senin','Selasa','Rabu','Kamis','Jumaat'] as $hari)
                                        <option value="{{ $hari }}"
                                            {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>
                                            {{ $hari }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-5">
                            <button type="submit" class="btn btn-primary">
                                Update Jadwal
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

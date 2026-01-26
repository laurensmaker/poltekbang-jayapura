@extends('backend.layouts.main')
@section('content')

<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Form Edit Mahasiswa</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('mahasiswa.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home Mahasiswa</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2"> Edit Mahasiswa</span>
        </li>
    </ul>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <h4 class="fs-18 mb-4">Edit Data Mahasiswa</h4>

                <div class="tab-content">
                    <div class="tab-pane fade show active">

                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Nama Mahasiswa</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="nama"
                                                class="form-control text-dark ps-5 h-58"
                                                placeholder="Nama Mahasiswa"
                                                value="{{ old('nama', $mahasiswa->nama) }}">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Alamat</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="alamat"
                                                class="form-control text-dark ps-5 h-58"
                                                placeholder="Alamat"
                                                value="{{ old('alamat', $mahasiswa->alamat) }}">
                                            <i class="ri-map-pin-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Nomor HP</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="no_hp"
                                                class="form-control text-dark ps-5 h-58"
                                                placeholder="Nomor HP"
                                                value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                                            <i class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Pilih Prodi</label>
                                        <div class="form-group position-relative">
                                            <select name="prodi" class="form-select form-control ps-5 h-58">
                                                <option value="Teknik Listrik Bandara"
                                                    {{ $mahasiswa->prodi == 'Teknik Listrik Bandara' ? 'selected' : '' }}>
                                                    Teknik Listrik Bandara
                                                </option>
                                                <option value="Manajemen Bandar Udara"
                                                    {{ $mahasiswa->prodi == 'Manajemen Bandar Udara' ? 'selected' : '' }}>
                                                    Manajemen Bandar Udara
                                                </option>
                                            </select>
                                            <i class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Pilih Jadwal</label>
                                        <div class="form-group position-relative">
                                            <select name="id_jadwal" class="form-select form-control ps-5 h-58">
                                                <option value="">-- Pilih Jadwal --</option>

                                                @foreach ($jadwal as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_jadwal', $mahasiswa->id_jadwal) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->hari }} - {{ $item->waktu_mulai }} - {{ $item->matakuliah->nama }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <i class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary ms-2">
                                        Kembali
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

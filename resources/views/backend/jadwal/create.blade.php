@extends('backend.layouts.main')
@section('content')
 <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Form Jadwal</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('jadwal.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home Jadwal</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2"> Jadwal</span>
        </li>
    </ul>
</div>

 <div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <h4 class="fs-18 mb-4"> Jadwal</h4>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                        aria-labelledby="preview-tab" tabindex="0">
                        <form action="{{ route('jadwal.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Matakuliah</label>
                                        <div class="form-group position-relative">
                                            <select name="id_matakuliah" class="form-select form-control ps-5 h-58">
                                                <option value="">-- Pilih Matakuliah --</option>
                                                @foreach ($matkul as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>                                                    
                                                @endforeach
                                            </select>
                                            <i class="ri-book-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Dosen/Pengajar</label>
                                        <div class="form-group position-relative">
                                            <select name="id_dosen" class="form-select form-control ps-5 h-58">
                                                <option value="">-- Pilih Dosen --</option>
                                                @foreach ($dosen as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>                                                    
                                                @endforeach
                                            </select>
                                            <i class="ri-book-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Waktu Mulai</label>
                                        <div class="form-group position-relative">
                                            <input type="time" name="waktu_mulai" class="form-control text-dark ps-5 h-58"
                                                placeholder="Waktu Mulai">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Waktu Selesai</label>
                                        <div class="form-group position-relative">
                                            <input type="time" name="waktu_selesai" class="form-control text-dark ps-5 h-58"
                                                placeholder="Kode Matakuliah">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>                               
                               <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Hari Perkuliahan</label>
                                        <div class="form-group position-relative">
                                            <select name="hari" class="form-select form-control ps-5 h-58">
                                                <option value="">-- Pilih Hari --</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumaat">Jumaat</option>
                                            </select>
                                            <i class="ri-book-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                               
                              

                                <div class="col-lg-6 mt-5">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
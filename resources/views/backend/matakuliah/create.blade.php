@extends('backend.layouts.main')
@section('content')
 <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Form Matakuliah</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('matakuliah.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home Matakuliah</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2"> Matakuliah</span>
        </li>
    </ul>
</div>

 <div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <h4 class="fs-18 mb-4"> Matakuliah</h4>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                        aria-labelledby="preview-tab" tabindex="0">
                        <form action="{{ route('matakuliah.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Nama Matakuliah</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="nama" class="form-control text-dark ps-5 h-58"
                                                placeholder="Nama Matakuliah">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Kode Matakuliah</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="kode_matkul" class="form-control text-dark ps-5 h-58"
                                                placeholder="Kode Matakuliah">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Jumlah SKS</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="jumlah_sks" class="form-control text-dark ps-5 h-58"
                                                placeholder="Jumlah SKS">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Kategori Matakuliah</label>
                                        <div class="form-group position-relative">
                                            <select name="kategori" class="form-select form-control ps-5 h-58">
                                                <option value="">-- Pilih Kategori Matakuliah --</option>
                                                <option value="Teori">Teori</option>
                                                <option value="Praktek">Praktek</option>
                                            </select>
                                            <i class="ri-book-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Pilih Prodi</label>
                                        <div class="form-group position-relative">
                                            <select name="prodi" class="form-select form-control ps-5 h-58"
                                                aria-label="Default select example">
                                                <option value="Teknik Listrik Bandara" class="text-dark">Teknik Listrik Bandara</option>                                                    
                                                <option value="Manajemen Bandar Udara" class="text-dark">Manajemen Bandar Udara</option>                                                   
                                              
                                            </select>
                                            <i class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
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
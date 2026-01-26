@extends('backend.layouts.main')
@section('content')
 <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Form Dosen</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="{{ route('dosen.index') }}" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home Dosen</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2"> Dosen</span>
        </li>
    </ul>
</div>

 <div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <h4 class="fs-18 mb-4"> Dosen</h4>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                        aria-labelledby="preview-tab" tabindex="0">
                        <form action="{{ route('dosen.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Nama Dosen</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="nama_dosen" class="form-control text-dark ps-5 h-58"
                                                placeholder="Nama Dosen">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Kode Dosen</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="kode_dosen" class="form-control text-dark ps-5 h-58"
                                                placeholder="Kode Dosen">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Gelar Depan</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="gelar_depan" class="form-control text-dark ps-5 h-58"
                                                placeholder="Gelar Depan">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Gelar Belakang</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="gelar_belakang" class="form-control text-dark ps-5 h-58"
                                                placeholder="Gelar Belakang">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Email</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="email" class="form-control text-dark ps-5 h-58"
                                                placeholder="Email">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label class="label">Nomor HP</label>
                                        <div class="form-group position-relative">
                                            <input type="text" name="no_hp" class="form-control text-dark ps-5 h-58"
                                                placeholder="Nomor HP">
                                            <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
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
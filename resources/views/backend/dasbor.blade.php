@extends('backend.layouts.main')
@section('content')
  <div class="row justify-content-center">
                <div class="col-xxl-8">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-sm-6">
                            <div class="stats-box card bg-white border-0 rounded-10 mb-4">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                        <div class="flex-grow-1 me-3">
                                            <h3 class="body-font fw-bold fs-3 mb-2">{{ $totalDosen }}</h3>
                                            <span>Total Dosen</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="icon transition">
                                                <i data-feather="users" class="menu-icon tf-icons"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @if (auth()->user()->level == 'Dosen')
                                        <div class="d-flex align-items-center">
                                            <div class="svg-success me-2">
                                                {{-- <i data-feather="trending-up"></i> --}}
                                            </div>
                                            <a href="" class="fw-semibold"><span class="text-success">Lihat Detail</span> 
                                            </a>
                                        </div>
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="stats-box card bg-white border-0 rounded-10 mb-4">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                        <div class="flex-grow-1 me-3">
                                            <h3 class="body-font fw-bold fs-3 mb-2">{{ $totalMahasiswa }}</h3>
                                            <span>Total Mahasiswa</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="icon transition">
                                                <i data-feather="user-check" class="menu-icon tf-icons"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @if (auth()->user()->level == 'Dosen')
                                        <div class="d-flex align-items-center">
                                            <div class="svg-success me-2">
                                                {{-- <i data-feather="trending-down"></i> --}}
                                            </div>
                                            <a href="" class="fw-semibold"><span class="text-success">Lihat Detail</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="stats-box card bg-white border-0 rounded-10 mb-4">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                        <div class="flex-grow-1 me-3">
                                            <h3 class="body-font fw-bold fs-3 mb-2">{{ $totalMatakuliah }}</h3>
                                            <span>Total Matakuliah</span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="icon transition">
                                               <i data-feather="file-text" class="menu-icon tf-icons"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @if (auth()->user()->level == 'admin')
                                        <div class="d-flex align-items-center">
                                            <div class="svg-success me-2">
                                                {{-- <i data-feather="trending-up"></i> --}}
                                            </div>
                                            <a href="" class="fw-semibold"><span class="text-success">Lihat Detail</span> 
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
   
@endsection
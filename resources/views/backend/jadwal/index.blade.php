@extends('backend.layouts.main')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- DATA BERHASIL DITAMBAHKAN --}}
@if(session('success_add'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success_add') }}",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
@endif


{{-- DATA BERHASIL DIUPDATE --}}
@if(session('success_update'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Data Diperbarui!',
        text: "{{ session('success_update') }}",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
@endif


{{-- DATA BERHASIL DIHAPUS --}}
@if(session('deleted'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Data Terhapus!',
        text: "{{ session('deleted') }}",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
@endif
 <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <h3 class="mb-sm-0 mb-1 fs-18">Jadwal Perkuliahan</h3>
        <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="index.html" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                    <span>Jadwal Perkuliahan</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Jadwal Perkuliahan</span>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                   
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                            aria-labelledby="preview-tab" tabindex="0">
                            <div
                                class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
                                <h4 class="fw-semibold fs-18 mb-sm-0">Jadwal Perkuliahan</h4>
                                <a href="{{ route('jadwal.create') }}"
                                    class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                                    <span class="py-sm-1 d-block">
                                        <i class="ri-add-line text-white"></i>
                                        <span> Jadwal Perkuliahan</span>
                                    </span>
                                </a>
                            </div>
                            <div class="default-table-area members-list">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr class="text-center">                                                
                                                <th scope="col">Waktu Mulai</th>
                                                <th scope="col">Waktu Selesai</th>
                                                <th scope="col">Hari</th>
                                                <th scope="col">Matakuliah </th>
                                                <th scope="col">Dosen/pengajar </th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwal as $item)                                                
                                                <tr class="text-center">                                               
                                                
                                                    <td>
                                                        {{ $item->waktu_mulai }}
                                                    </td>
                                                    <td>
                                                        {{ $item->waktu_selesai }}  
                                                    </td>
                                                    <td>
                                                        {{ $item->hari }}
                                                    </td>
                                                    <td>
                                                        {{ $item->matakuliah->nama }}
                                                    </td>
                                                    <td>
                                                        {{ $item->dosen->nama_dosen }} {{ $item->dosen->gelar_belakang }}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown action-opt">
                                                            <button class="btn bg p-0" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i data-feather="more-horizontal"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                                
                                                                <li>
                                                                    <a class="dropdown-item" href="{{ route('jadwal.edit', $item->id) }}">
                                                                        <i data-feather="edit-3"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item text-danger btn-delete"
                                                                    data-id="{{ $item->id }}"
                                                                    data-nama="{{ $item->matakuliah->nama }}">
                                                                        <i data-feather="trash-2"></i> Hapus
                                                                    </a>

                                                                    <form id="form-delete-{{ $item->id }}"
                                                                        action="{{ route('jadwal.destroy', $item->id) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-sm-flex justify-content-between align-items-center text-center">
                                    <span class="fs-14">Showing 1 To 6 Of 20 Entries</span>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination mb-0 mt-3 mt-sm-0 justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link icon" href="members-list.html"
                                                    aria-label="Previous">
                                                    <i data-feather="arrow-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link active"
                                                    href="members-list.html">1</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="members-list.html">2</a></li>
                                            <li class="page-item"><a class="page-link"
                                                    href="members-list.html">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link icon" href="members-list.html"
                                                    aria-label="Next">
                                                    <i data-feather="arrow-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="code-tab-pane" role="tabpanel" aria-labelledby="code-tab"
                            tabindex="0">
                            <button
                                class="btn btn-outline-primary bg-white btn-sm copy-btn position-absolute top-0 end-0"
                                data-clipboard-target="#basicAlertsCode">
                                Copy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            let id = this.getAttribute('data-id');
            let nama = this.getAttribute('data-nama');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Jadwal: " + nama,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        });
    });
</script>
@endsection
@extends('frontend.layouts.main')
@section('content')

<section class="form-contact-2 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header Section -->
                <div class="text-center mb-5">
                    <div class="badge bg-primary mb-3" style="font-size: 0.9rem; padding: 8px 16px;">
                        Program Studi
                    </div>
                    <h1 class="display-5 fw-bold text-primary mb-2">
                        Jadwal Perkuliahan
                    </h1>
                    <h3 class="text-muted mb-4">
                        Manajemen Bandar Udara
                    </h3>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div class="text-start">
                            <small class="text-muted d-block">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Semester: {{ $semester ?? 'Ganjil 2025/2026' }}
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-print me-2"></i>Print
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-share-alt me-2"></i>Share
                        </button>
                    </div>
                    <button id="downloadPdf" class="btn btn-primary px-4">
                        <i class="fas fa-download me-2"></i>Download PDF
                    </button>
                </div>

                <!-- Schedule Table -->
                <div class="table-responsive shadow-lg rounded-3 overflow-hidden" id="jadwalArea">
                    <table class="table table-hover mb-0">
                        <thead class="bg-gradient-primary text-white">
                            <tr>
                                <th class="text-center py-3" style="width: 60px;">No</th>
                                <th class="py-3" style="width: 100px;">
                                    <i class="fas fa-calendar-day me-2"></i>Hari
                                </th>
                                <th class="py-3" style="width: 120px;">
                                    <i class="fas fa-clock me-2"></i>Jam
                                </th>
                                <th class="py-3">
                                    <i class="fas fa-book me-2"></i>Mata Kuliah
                                </th>
                                <th class="py-3" style="width: 100px;">
                                    <i class="fas fa-tag me-2"></i>Kategori
                                </th>
                                <th class="py-3">
                                    <i class="fas fa-chalkboard-teacher me-2"></i>Dosen Pengajar
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-light">
                            @forelse ($jadwalTlb as $item)
                            <tr class="align-middle">
                                <td class="text-center fw-bold text-primary">{{ $loop->iteration }}</td>
                                
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-primary-subtle text-primary p-2 me-2">
                                            {{ substr($item->hari ?? '-', 0, 3) }}
                                        </span>
                                        <span>{{ $item->hari ?? '-' }}</span>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="time-slot bg-info-subtle p-2 rounded text-center">
                                        <small class="fw-bold d-block">{{ $item->waktu_mulai ?? '-' }}</small>
                                        <small class="text-muted">sampai</small>
                                        <small class="fw-bold d-block">{{ $item->waktu_selesai ?? '-' }}</small>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="fw-bold text-dark">{{ $item->matakuliah->nama ?? '-' }}</div>
                                    <small class="text-muted">
                                        <i class="fas fa-code me-1"></i>
                                        {{ $item->matakuliah->kode ?? 'Kode' }}
                                    </small>
                                </td>
                                
                                <td>
                                    @php
                                        $kategori = $item->matakuliah->kategori ?? 'Umum';
                                        $badgeClass = [
                                            'Wajib' => 'bg-success-subtle text-success',
                                            'Pilihan' => 'bg-warning-subtle text-warning',
                                            'Praktikum' => 'bg-info-subtle text-info',
                                            'Umum' => 'bg-secondary-subtle text-secondary'
                                        ][$kategori] ?? 'bg-secondary-subtle text-secondary';
                                    @endphp
                                    <span class="badge {{ $badgeClass }} p-2">
                                        {{ $kategori }}
                                    </span>
                                </td>
                                
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">{{ $item->dosen->nama_dosen ?? 'Dosen' }}</div>
                                            <small class="text-muted">
                                                {{ $item->dosen->gelar_belakang ?? '' }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">Belum ada jadwal tersedia</h5>
                                        <p class="text-muted mb-0">Jadwal perkuliahan akan segera diumumkan</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Information Section -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="alert alert-info mb-0">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle fa-2x me-3"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Informasi Penting</h6>
                                    <p class="mb-0">Jadwal dapat berubah sewaktu-waktu. Silakan periksa secara berkala.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-light border mb-0">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-check fa-2x me-3 text-success"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Total Mata Kuliah</h6>
                                    <p class="mb-0 fw-bold">{{ count($jadwalTlb) }} Mata Kuliah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Styles */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%) !important;
    }
    
    .bg-primary-subtle {
        background-color: rgba(58, 123, 213, 0.1) !important;
    }
    
    .bg-success-subtle {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    
    .bg-warning-subtle {
        background-color: rgba(255, 193, 7, 0.1) !important;
    }
    
    .bg-info-subtle {
        background-color: rgba(23, 162, 184, 0.1) !important;
    }
    
    .bg-secondary-subtle {
        background-color: rgba(108, 117, 125, 0.1) !important;
    }
    
    .avatar-sm {
        width: 40px;
        height: 40px;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(58, 123, 213, 0.05) !important;
        transform: translateY(-1px);
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    
    .time-slot {
        border-left: 3px solid #3a7bd5;
    }
    
    /* For PDF download styling */
    @media print {
        .btn {
            display: none !important;
        }
        
        .table-hover tbody tr:hover {
            background-color: transparent !important;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<script>
document.getElementById('downloadPdf').addEventListener('click', function () {
    const element = document.getElementById('jadwalArea');
    const originalTitle = document.querySelector('h1').innerText;
    
    const opt = {
        margin: [10, 10, 10, 10],
        filename: 'jadwal_perkuliahan_manajemen_bandar_udara.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { 
            scale: 2,
            useCORS: true,
            letterRendering: true,
            backgroundColor: '#ffffff'
        },
        jsPDF: { 
            unit: 'mm', 
            format: 'a4', 
            orientation: 'landscape' // Landscape untuk tabel yang lebar
        },
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
    };

    // Tambah judul di PDF
    const originalContent = element.innerHTML;
    const titleHTML = `
        <div style="text-align: center; margin-bottom: 20px; padding: 10px; border-bottom: 2px solid #3a7bd5;">
            <h2 style="color: #3a7bd5; margin: 0;">${originalTitle}</h2>
            <p style="color: #666; margin: 5px 0 0 0;">Program Studi Manajemen Bandar Udara</p>
            <p style="color: #888; font-size: 0.9em; margin: 5px 0;">Dicetak pada: ${new Date().toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            })}</p>
        </div>
    `;
    
    element.innerHTML = titleHTML + originalContent;
    
    // Tampilkan loading state
    const originalText = this.innerHTML;
    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyiapkan PDF...';
    this.disabled = true;
    
    html2pdf().set(opt).from(element).save().then(() => {
        // Kembalikan ke keadaan semula
        element.innerHTML = originalContent;
        this.innerHTML = originalText;
        this.disabled = false;
    });
});

// Smooth scroll untuk tabel
document.addEventListener('DOMContentLoaded', function() {
    const tableRows = document.querySelectorAll('.table-hover tbody tr');
    tableRows.forEach(row => {
        row.style.transition = 'all 0.3s ease';
    });
});
</script>

@endsection
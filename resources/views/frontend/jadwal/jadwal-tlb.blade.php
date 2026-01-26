@extends('frontend.layouts.main')
@section('content')

<section class="py-5" id="jadwalWrapper">
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-danger">Jadwal Perkuliahan</h1>
            <h4>Teknik Listrik Bandara</h4>
            <p class="text-muted">Semester {{ $semester ?? 'Ganjil 2025/2026' }}</p>
        </div>

        <!-- Action Button -->
        <div class="d-flex justify-content-between mb-3">
            <button onclick="window.print()" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-print"></i> Print
            </button>

            <button id="downloadPdf" class="btn btn-danger btn-sm">
                <i class="fas fa-download"></i> Download PDF
            </button>
        </div>

        <!-- TABLE AREA -->
        <div class="table-responsive" id="jadwalArea">
            <table class="table table-bordered table-striped">
                <thead class="bg-danger text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mata Kuliah</th>
                        <th>Kategori</th>
                        <th>Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwalTlb as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->hari ?? '-' }}</td>
                            <td class="text-center">
                                {{ $item->waktu_mulai ?? '-' }} - {{ $item->waktu_selesai ?? '-' }}
                            </td>
                            <td>
                                <strong>{{ $item->matakuliah->nama ?? '-' }}</strong><br>
                                <small class="text-muted">{{ $item->matakuliah->kode ?? '' }}</small>
                            </td>
                            <td class="text-center">
                                {{ $item->matakuliah->kategori ?? 'Umum' }}
                            </td>
                            <td>
                                {{ $item->dosen->nama_dosen ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada jadwal
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</section>

@endsection

{{-- ================== STYLE ================== --}}
<style>
@media print {
    .btn {
        display: none !important;
    }

    body {
        background: #fff;
    }

    table {
        font-size: 11px;
    }
}
</style>

{{-- ================== SCRIPT ================== --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>

<script>
document.getElementById('downloadPdf').addEventListener('click', function () {

    const source = document.getElementById('jadwalArea').cloneNode(true);

    const header = document.createElement('div');
    header.innerHTML = `
        <div style="text-align:center;margin-bottom:20px">
            <h2 style="margin:0;color:#dc3545">Jadwal Perkuliahan</h2>
            <h4 style="margin:5px 0">Teknik Listrik Bandara</h4>
            <p style="font-size:12px;color:#555">
                Dicetak: ${new Date().toLocaleString('id-ID')}
            </p>
            <hr>
        </div>
    `;

    const wrapper = document.createElement('div');
    wrapper.appendChild(header);
    wrapper.appendChild(source);

    const opt = {
        margin: 10,
        filename: 'jadwal_perkuliahan_tlb.pdf',
        image: { type: 'jpeg', quality: 0.95 },
        html2canvas: {
            scale: 2,
            scrollY: 0,
            useCORS: true
        },
        jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'landscape'
        }
    };

    html2pdf().set(opt).from(wrapper).save();
});
</script>

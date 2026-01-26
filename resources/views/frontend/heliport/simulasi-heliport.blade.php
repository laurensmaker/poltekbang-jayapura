@extends('frontend.layouts.main')
@section('content')
<section class="form-contact-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <!-- Header Section -->
                <div class="text-center mb-5">
                    <div class="section-title">
                        <span class="badge bg-primary fs-6 fw-normal mb-3 px-4 py-2">Belajar</span>
                        <h1 class="display-5 fw-bold mb-3">Simulasi <span class="text-primary">Heliport</span></h1>
                        <p class="lead text-muted">Konfigurasikan parameter heliport dan lihat simulasi visualnya</p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <div class="row">
                            <!-- Form Column -->
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <h4 class="fw-bold mb-4 text-primary">
                                    <i class="bi bi-gear-fill me-2"></i>Parameter Konfigurasi
                                </h4>
                                
                                <form id="heliportForm">
                                    <div class="row g-3">
                                        <!-- Nama Heliport -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-building me-1"></i>Nama Heliport
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-fonts"></i>
                                                </span>
                                                <input type="text" id="namaHeliport" value="PPJ" 
                                                       class="form-control border-start-0" 
                                                       placeholder="Masukkan nama heliport">
                                            </div>
                                        </div>

                                        <!-- Diameter TLOF -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-circle me-1"></i>Diameter TLOF (m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">Ø</span>
                                                <input type="number" id="tlof" value="9" step="0.1" 
                                                       class="form-control" min="1">
                                                <span class="input-group-text bg-light">m</span>
                                            </div>
                                        </div>

                                        <!-- Diameter FATO -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-circle me-1"></i>Diameter FATO (m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">Ø</span>
                                                <input type="number" id="fato" value="15" step="0.1" 
                                                       class="form-control" min="1">
                                                <span class="input-group-text bg-light">m</span>
                                            </div>
                                        </div>

                                        <!-- Safety Area -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-shield-check me-1"></i>Safety Area (m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-arrows-angle-expand"></i>
                                                </span>
                                                <input type="number" id="safety" value="3" step="0.1" 
                                                       class="form-control" min="0">
                                                <span class="input-group-text bg-light">m</span>
                                            </div>
                                        </div>

                                        <!-- Lebar Ring Kuning -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-circle-half me-1"></i>Lebar Ring Kuning (m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-border-width"></i>
                                                </span>
                                                <input type="number" id="ring" value="0.5" step="0.1" 
                                                       class="form-control" min="0.1" max="2">
                                                <span class="input-group-text bg-light">m</span>
                                            </div>
                                        </div>

                                        <!-- Tinggi Huruf H -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-text-center me-1"></i>Tinggi Huruf H (m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">H</span>
                                                <input type="number" id="tinggiH" value="3" step="0.1" 
                                                       class="form-control" min="1">
                                                <span class="input-group-text bg-light">m</span>
                                            </div>
                                        </div>

                                        <!-- Lebar Garis Huruf H -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-dash-lg me-1"></i>Lebar Garis Huruf H (m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-arrow-right-left"></i>
                                                </span>
                                                <input type="number" id="lebarGaris" value="0.4" step="0.1" 
                                                       class="form-control" min="0.1">
                                                <span class="input-group-text bg-light">m</span>
                                            </div>
                                        </div>

                                        <!-- Heading -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-compass me-1"></i>Heading (°)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </span>
                                                <input type="number" id="heading" value="0" step="1" 
                                                       class="form-control" min="0" max="360">
                                                <span class="input-group-text bg-light">°</span>
                                            </div>
                                        </div>

                                        <!-- Skala Gambar -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-arrows-fullscreen me-1"></i>Skala Gambar (px/m)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-aspect-ratio"></i>
                                                </span>
                                                <input type="number" id="scale" value="20" step="1" 
                                                       class="form-control" min="5" max="100">
                                                <span class="input-group-text bg-light">px/m</span>
                                            </div>
                                        </div>

                                        <!-- Warna Permukaan -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">
                                                <i class="bi bi-palette me-1"></i>Warna Permukaan
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="bi bi-droplet"></i>
                                                </span>
                                                <input type="color" id="warna" value="#2e8b57" 
                                                       class="form-control form-control-color p-2">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <button type="button" id="generate" 
                                                    class="btn btn-primary btn-lg w-100 py-3">
                                                <i class="bi bi-play-circle me-2"></i>Generate Simulasi
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Quick Info -->
                                <div class="alert alert-info mt-4">
                                    <div class="d-flex">
                                        <i class="bi bi-info-circle-fill fs-5 me-3"></i>
                                        <div>
                                            <h6 class="alert-heading fw-bold">Tips:</h6>
                                            <p class="mb-0 small">Setelah mengatur parameter, klik "Generate Simulasi" untuk melihat hasil. Anda dapat mengunduh gambar dengan tombol download.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Preview Column -->
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-4 text-primary">
                                    <i class="bi bi-eye-fill me-2"></i>Preview Simulasi
                                </h4>
                                
                                <!-- Canvas Container -->
                                <div class="card border-0 bg-light rounded-3 mb-4">
                                    <div class="card-body p-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="fw-bold mb-0">Visualisasi Heliport</h6>
                                            <button type="button" id="download" 
                                                    class="btn btn-success btn-sm">
                                                <i class="bi bi-download me-1"></i>Download
                                            </button>
                                        </div>
                                        <div class="text-center">
                                            <canvas id="canvas" width="500" height="500" 
                                                    class="img-fluid border rounded shadow-sm"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Legend -->
                                <div class="card border-0 bg-light rounded-3">
                                    <div class="card-body">
                                        <h6 class="fw-bold mb-3">Legenda:</h6>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="color-box me-2" style="background-color: #808080; width: 20px; height: 20px;"></div>
                                                    <span class="small">Safety Area</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="color-box me-2" style="background-color: #4f6dff22; width: 20px; height: 20px;"></div>
                                                    <span class="small">FATO Area</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="color-box me-2" style="background-color: #2e8b57; width: 20px; height: 20px;"></div>
                                                    <span class="small">TLOF Area</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="color-box me-2" style="background-color: yellow; width: 20px; height: 20px;"></div>
                                                    <span class="small">Ring Kuning</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Note -->
                <div class="text-center mt-4">
                    <p class="text-muted small">
                        <i class="bi bi-lightbulb me-1"></i>
                        Simulasi ini membantu visualisasi konfigurasi heliport sesuai dengan parameter yang ditentukan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById("generate").addEventListener("click", function () {
        // Get values
        let nama = document.getElementById("namaHeliport").value;
        let tlof = parseFloat(document.getElementById("tlof").value);
        let fato = parseFloat(document.getElementById("fato").value);
        let safety = parseFloat(document.getElementById("safety").value);
        let ring = parseFloat(document.getElementById("ring").value);
        let tinggiH = parseFloat(document.getElementById("tinggiH").value);
        let lebarGaris = parseFloat(document.getElementById("lebarGaris").value);
        let heading = parseFloat(document.getElementById("heading").value);
        let scale = parseFloat(document.getElementById("scale").value);
        let warna = document.getElementById("warna").value;

        // Canvas setup
        let c = document.getElementById("canvas");
        let ctx = c.getContext("2d");

        // Clear canvas
        ctx.clearRect(0, 0, c.width, c.height);

        // Center of canvas
        let cx = c.width / 2;
        let cy = c.height / 2;

        // Save context and rotate
        ctx.save();
        ctx.translate(cx, cy);
        ctx.rotate(heading * Math.PI / 180);

        // =====================
        // SAFETY AREA (SQUARE)
        // =====================
        let totalSize = (fato + (2 * safety)) * scale;

        ctx.fillStyle = "#808080";
        ctx.fillRect(
            -totalSize / 2,
            -totalSize / 2,
            totalSize,
            totalSize
        );

        ctx.strokeStyle = "white";
        ctx.lineWidth = 2;
        ctx.strokeRect(
            -totalSize / 2,
            -totalSize / 2,
            totalSize,
            totalSize
        );

        // =====================
        // FATO (Circle)
        // =====================
        ctx.beginPath();
        ctx.fillStyle = "#4f6dff22";
        ctx.arc(0, 0, (fato / 2) * scale, 0, Math.PI * 2);
        ctx.fill();

        // Add FATO border
        ctx.beginPath();
        ctx.strokeStyle = "#4f6dff";
        ctx.lineWidth = 2;
        ctx.arc(0, 0, (fato / 2) * scale, 0, Math.PI * 2);
        ctx.stroke();

        // =====================
        // TLOF (Circle)
        // =====================
        ctx.beginPath();
        ctx.fillStyle = warna;
        ctx.arc(0, 0, (tlof / 2) * scale, 0, Math.PI * 2);
        ctx.fill();

        // =====================
        // RING
        // =====================
        ctx.beginPath();
        ctx.lineWidth = ring * scale;
        ctx.strokeStyle = "yellow";
        ctx.arc(0, 0, (tlof / 2 * scale) - (ring * scale / 2), 0, Math.PI * 2);
        ctx.stroke();

        // =====================
        // H MARKING
        // =====================
        ctx.fillStyle = "white";
        let barW = lebarGaris * scale;
        let barH = tinggiH * scale;

        // Left vertical bar
        ctx.fillRect(-barH / 2, -barH / 2, barW, barH);
        // Right vertical bar
        ctx.fillRect(barH / 2 - barW, -barH / 2, barW, barH);
        // Horizontal bar
        ctx.fillRect(-barW / 2, -barW / 2, barW, barW);

        // Add H border for better visibility
        ctx.strokeStyle = "rgba(0,0,0,0.3)";
        ctx.lineWidth = 1;
        ctx.strokeRect(-barH / 2, -barH / 2, barW, barH);
        ctx.strokeRect(barH / 2 - barW, -barH / 2, barW, barH);
        ctx.strokeRect(-barW / 2, -barW / 2, barW, barW);

        // =====================
        // NAMA HELIPORT
        // =====================
        ctx.fillStyle = "white";
        ctx.strokeStyle = "rgba(0,0,0,0.5)";
        ctx.lineWidth = 2;
        ctx.font = "bold 24px Arial";
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";
        
        // Text with shadow effect
        ctx.strokeText(nama, 0, -((tlof / 2 * scale) + 40));
        ctx.fillText(nama, 0, -((tlof / 2 * scale) + 40));

        // =====================
        // COORDINATE CROSS
        // =====================
        ctx.strokeStyle = "rgba(255,255,255,0.3)";
        ctx.lineWidth = 1;
        
        // Horizontal line
        ctx.beginPath();
        ctx.moveTo(-c.width/2 + 20, 0);
        ctx.lineTo(c.width/2 - 20, 0);
        ctx.stroke();
        
        // Vertical line
        ctx.beginPath();
        ctx.moveTo(0, -c.height/2 + 20);
        ctx.lineTo(0, c.height/2 - 20);
        ctx.stroke();

        ctx.restore();
    });

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("generate").click();
    });

    // Download functionality
    document.getElementById("download").addEventListener("click", function () {
        let canvas = document.getElementById("canvas");
        let image = canvas.toDataURL("image/png");
        
        let a = document.createElement("a");
        a.href = image;
        
        let nama = document.getElementById("namaHeliport").value || "heliport";
        a.download = nama.replace(/\s+/g, '_') + "_simulasi.png";
        
        a.click();
    });
</script>

<style>
    .color-box {
        border-radius: 3px;
        border: 1px solid #dee2e6;
    }
    
    .input-group-text {
        background-color: #f8f9fa;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .card {
        transition: transform 0.2s;
    }
    
    .card:hover {
        transform: translateY(-2px);
    }
    
    #canvas {
        background-color: #f8f9fa;
        max-width: 100%;
        height: auto;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6b4290 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    
    .btn-success {
        background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%);
        border: none;
    }
</style>
@endsection
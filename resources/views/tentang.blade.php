@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="border-top: 5px solid #2563eb !important;">
        
        {{-- Hero Header (Biru Dominan) --}}
        <div class="text-center p-5 text-white" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1d4ed8 100%);">
            <div class="position-relative d-inline-block mb-3">
                <img src="{{ asset('storage/images/foto.jpg') }}" alt="Foto Pengembang" 
                     class="rounded-circle img-thumbnail shadow-lg" 
                     style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #60a5fa; background-color: #1e293b;">
            </div>
            
            <h3 class="fw-bold mb-1 text-white">Nama Pengembang</h3>
            <p class="mb-3" style="color: #93c5fd; font-size: 1.1rem; font-weight: 500;">Fullstack Web Developer</p>
            <span class="badge px-3 py-2 rounded-pill shadow-sm" style="background-color: #2563eb; color: #ffffff;">
                <i class="bi bi-patch-check-fill me-1"></i> Pengembang SAUNG BIRU RASA POS
            </span>
        </div>

        <div class="card-body p-4 p-md-5" style="background-color: #f0f9ff;">
            
            {{-- Tech Stack & Tools (Nuansa Biru) --}}
            <div class="text-center mb-5">
                <h6 class="fw-bold text-uppercase tracking-wider small mb-3" style="color: #1e40af; letter-spacing: 1px;">
                    <i class="bi bi-tools me-1"></i> Tech Stack & Tools
                </h6>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge px-3 py-2 rounded-3 shadow-sm" style="background-color: #1e40af; color: #ffffff;"><i class="bi bi-box-seam me-1"></i> Laravel 12</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm" style="background-color: #0284c7; color: #ffffff;"><i class="bi bi-code-square me-1"></i> PHP 8.3</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm" style="background-color: #2563eb; color: #ffffff;"><i class="bi bi-bootstrap me-1"></i> Bootstrap 5</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm" style="background-color: #1d4ed8; color: #ffffff;"><i class="bi bi-database me-1"></i> MySQL</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm" style="background-color: #0f172a; color: #ffffff;"><i class="bi bi-layers me-1"></i> Blade Template</span>
                </div>
            </div>

            <hr class="my-4 opacity-25" style="color: #2563eb;">

            {{-- Card Informasi (Border & Akses Biru) --}}
            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <div class="p-4 rounded-4 border bg-white shadow-sm h-100" style="border-left: 5px solid #2563eb !important; border-color: #bfdbfe;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2 rounded-3 text-white" style="background-color: #2563eb;">
                                <i class="bi bi-code-slash fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e3a8a;">Pengembangan Aplikasi</h6>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.7;">
                            Sistem ini dirancang dan dikembangkan secara khusus untuk mengotomatisasi proses transaksi di kasir, mempermudah manajemen stok produk secara real-time, serta meminimalisir potensi kesalahan pencatatan manual.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 rounded-4 border bg-white shadow-sm h-100" style="border-left: 5px solid #1d4ed8 !important; border-color: #bfdbfe;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2 rounded-3 text-white" style="background-color: #1d4ed8;">
                                <i class="bi bi-shop fs-4"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e3a8a;">Informasi Usaha & Sistem</h6>
                        </div>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2 text-secondary">
                                <strong style="color: #1e293b;">Nama Toko:</strong> 
                                <span class="fw-semibold text-primary">SAUNG BIRU RASA</span>
                            </li>
                            <li class="mb-2 text-secondary">
                                <strong style="color: #1e293b;">Versi Sistem:</strong> 
                                <span class="badge bg-blue text-primary border border-primary-subtle" style="background-color: #dbeafe;">1.0.0</span>
                            </li>
                            <li class="mb-0 text-secondary">
                                <strong style="color: #1e293b;">Status Layanan:</strong> 
                                <span class="badge bg-success">Aktif / Online</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
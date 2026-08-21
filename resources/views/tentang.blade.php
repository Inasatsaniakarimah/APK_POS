@extends('layouts.app')

@section('content')

@section('title', 'Tentang')

<div class="container py-4 position-relative">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden background-color: #ffffff;">
        <div class="text-center p-5 position-relative" style="background: linear-gradient(135deg, #aacbf3 0%, #bbd9fb 50%, #9cc3f3 100%); color: #1e3a8a;">
            <a href="{{ route('dashboard') }}" 
               class="btn btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 d-flex align-items-center justify-content-center" 
               style="width: 38px; height: 38px; opacity: 0.9; transition: all 0.2s;"
               title="Kembali ke Dashboard">
                <i class="bi bi-x-lg text-primary fs-6"></i>
            </a>

            <div class="position-relative d-inline-block mb-3">
                <img src="{{ asset('storage/images/foto.jpg') }}" alt="Foto Pengembang" 
                     class="rounded-circle img-thumbnail shadow-sm border-3 border-white" 
                     style="width: 130px; height: 130px; object-fit: cover; background-color: #f0f9ff;">
            </div>
            
            <h4 class="fw-bold mb-1" style="color: #1e3a8a;">INASA TSANIA KARIMAH</h4>
            <p class="mb-3" style="color: #1e40af; font-size: 1rem; font-weight: 500;">Fullstack Web Developer</p>
            <span class="badge px-3 py-2 rounded-pill shadow-sm bg-white fw-semibold" style="color: #2563eb !important;">
                <i class="bi bi-patch-check-fill me-1" style="color: #2563eb;"></i>SAUNG BIRU RASA POS
            </span>
        </div>

        <div class="card-body p-4 p-md-5" style="background-color: #f0f7ff;">
            <div class="text-center mb-5">
                <h6 class="fw-bold text-uppercase tracking-wider small mb-3" style="color: #2563eb; letter-spacing: 1px;">
                    <i class="bi bi-tools me-1"></i> Tech Stack & Tools
                </h6>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge px-3 py-2 rounded-3 shadow-sm text-white" style="background-color: #3b82f6;"><i class="bi bi-box-seam me-1"></i> Laravel 12</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm text-white" style="background-color: #0284c7;"><i class="bi bi-code-square me-1"></i> PHP 8.3</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm text-white" style="background-color: #60a5fa;"><i class="bi bi-bootstrap me-1"></i> Bootstrap 5</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm text-white" style="background-color: #0369a1;"><i class="bi bi-database me-1"></i> MySQL</span>
                    <span class="badge px-3 py-2 rounded-3 shadow-sm text-white" style="background-color: #93c5fd; color: #1e3a8a !important;"><i class="bi bi-layers me-1"></i> Blade Template</span>
                </div>
            </div>

            <hr class="my-4" style="border-color: #dbeafe;">

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <div class="p-4 rounded-4 border bg-white shadow-sm h-100" style="border-left: 4px solid #60a5fa !important; border-color: #e0f2fe;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2 rounded-3 text-white shadow-sm" style="background-color: #60a5fa;">
                                <i class="bi bi-code-slash fs-5"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e40af;">Pengembangan Aplikasi</h6>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.7;">
                            Sistem ini dirancang dan dikembangkan secara khusus untuk mengotomatisasi proses transaksi di kasir, mempermudah manajemen stok produk secara real-time, serta meminimalisir potensi kesalahan pencatatan manual.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 rounded-4 border bg-white shadow-sm h-100" style="border-left: 4px solid #3b82f6 !important; border-color: #e0f2fe;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                             <div class="p-2 rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="background-color: #c7d2fe; ">
                               <i class="bi bi-shop fs-5"></i>
                           </div>
                            <h6 class="fw-bold mb-0" style="color: #1e40af;">Tentang Saung Biru Rasa</h6>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.7;">
                            <strong style="color: #2563eb;">SAUNG BIRU RASA</strong> merupakan usaha kuliner yang menyajikan beragam pilihan menu makanan dan minuman khas dengan cita rasa terbaik. Kami berkomitmen untuk memberikan pelayanan yang cepat, higienis, serta suasana yang nyaman bagi setiap pelanggan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

@section('title', 'Tentang')

<div class="d-flex align-items-center justify-content-center min-vh-100 py-4" style="background-color: #f1f5f9;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        
        <!-- Card Utama -->
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative bg-white">
          
          <!-- Tombol Close (X) -->
          <a href="{{ route('dashboard') }}" 
             class="btn btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 d-flex align-items-center justify-content-center" 
             style="width: 36px; height: 36px; z-index: 10;" 
             title="Kembali ke Dashboard">
            <i class="bi bi-x-lg text-dark"></i>
          </a>
          <div class="card-header border-0 text-center pt-5 pb-4 px-4" style="background-color: #c7d2fe;">
            
            <div class="mb-3 d-flex justify-content-center">
              @if(file_exists(public_path('storage/images/foto.jpg')))
                <img src="{{ asset('storage/images/foto.jpg') }}" 
                     alt="Foto Pengembang" 
                     class="rounded-circle border border-3 border-white shadow-sm" 
                     style="width: 95px; height: 95px; object-fit: cover;">
              @else
                <div class="rounded-circle border border-3 border-white bg-white fw-bold d-flex align-items-center justify-content-center shadow-sm" 
                     style="width: 95px; height: 95px; font-size: 28px; color: #3730a3;">
                  IT
                </div>
              @endif
            </div>

            <h4 class="fw-bold mb-1" style="color: #1e1b4b; letter-spacing: 0.5px;">INASA TSANIA KARIMAH</h4>
            <span class="badge bg-white px-3 py-2 rounded-pill fw-bold shadow-sm" style="color: #312e81; font-size: 12px;">
              <i class="bi bi-cup-hot-fill me-1" style="color: #4338ca;"></i> ISK Coffee POS
            </span>
          </div>
          <div class="card-body p-4" style="background-color: #fafbfd;">
            <div class="text-center mb-4">
              <small class="text-uppercase fw-bold d-block mb-2" style="letter-spacing: 1px; font-size: 11px; color: #4338ca;">
                Tech Stack & Framework
              </small>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <span class="badge px-3 py-2 rounded-pill text-white" style="background-color: #4338ca;">Laravel 12</span>
                <span class="badge px-3 py-2 rounded-pill text-white" style="background-color: #0284c7;">PHP 8.3</span>
                <span class="badge px-3 py-2 rounded-pill text-white" style="background-color: #dc2626;">Java</span>
                <span class="badge px-3 py-2 rounded-pill" style="background-color: #c7d2fe; color: #1e1b4b;">Bootstrap 5</span>
                <span class="badge px-3 py-2 rounded-pill text-white" style="background-color: #1e293b;">MySQL</span>
                <span class="badge px-3 py-2 rounded-pill text-white" style="background-color: #6366f1;">Blade</span>
              </div>
            </div>

            <div class="row g-3">
              <div class="col-12">
                <div class="p-3 rounded-3 border-start border-4 shadow-sm bg-white" style="border-color: #4338ca !important;">
                  <h6 class="fw-bold mb-1" style="color: #312e81;"><i class="bi bi-laptop me-1"></i> Sistem Kasir POS</h6>
                  <p class="text-muted mb-0 small" style="line-height: 1.5;">
                    Aplikasi ini dirancang untuk mengelola transaksi penjualan, stok produk secara real-time, dan mempermudah operasional kasir.
                  </p>
                </div>
              </div>

              <div class="col-12">
                <div class="p-3 rounded-3 border-start border-4 shadow-sm bg-white" style="border-color: #c7d2fe !important;">
                  <h6 class="fw-bold mb-1" style="color: #312e81;"><i class="bi bi-cup-hot me-1"></i> Tentang ISK Coffee</h6>
                  <p class="text-muted mb-0 small" style="line-height: 1.5;">
                    ISK Coffee menyajikan berbagai pilihan kopi berkualitas dan makanan pendamping dengan pelayanan yang cepat dan higienis.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
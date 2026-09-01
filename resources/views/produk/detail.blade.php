@extends('layouts.app')

@section('title', 'Detail Menu ' . $produk->nama)

@section('content')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-700 { color: #334155; }
    .text-slate-500 { color: #64748b; }
    .text-slate-400 { color: #94a3b8; }
    .rounded-4 { border-radius: 1rem !important; }
</style>

<div class="bg-slate-100 min-vh-100 py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-info bg-opacity-10 rounded-3 p-2 me-3" style="width: 42px; height: 42px;">
                                <i class="bi bi-info-circle text-info fs-5"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold text-slate-800 mb-0">Detail Menu</h5>
                                <p class="text-slate-500 mb-0 small">Informasi ketersediaan</p>
                            </div>
                        </div>
                        <a href="{{ route('produk.index') }}" class="btn-close" aria-label="Close"></a>
                    </div>

                    <div class="p-4 text-center bg-light border-bottom">
                        @if($produk->foto)
                            <img src="{{ asset('storage/' . $produk->foto) }}" 
                                 class="img-fluid rounded-3 border shadow-sm" 
                                 alt="{{ $produk->nama }}"
                                 style="max-height: 220px; width: 100%; object-fit: contain;">
                        @else
                            <div class="py-4 text-slate-400">
                                <i class="bi bi-image fs-1 d-block mb-2"></i>
                                Tidak ada foto Menu
                            </div>
                        @endif
                    </div>

                    <div class="card-body p-4">
                        <div class="mb-3">
                            <span class="text-slate-400 font-monospace small fw-bold d-block text-uppercase">NAMA MENU</span>
                            <p class="text-slate-700 mb-0">{{ $produk->nama }}</p>
                        </div>

                        <div class= "mb-3">
                            <span class="text-slate-400 font-monospace small fw-bold d-block text-uppercase">JENIS MENU</span>
                            <p class="text-slate-700 mb-0">{{ $produk->jenis }}</p>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded-3 border-0">
                                    <span class="text-slate-500 font-monospace small fw-bold d-block mb-1">HARGA DASAR</span>
                                    <span class="fw-semibold text-slate-700">
                                        Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded-3 border-0">
                                    <span class="text-slate-500 font-monospace small fw-bold d-block mb-1">HARGA JUAL</span>
                                    <span class="fw-bold" style="color: #4f46e5;">
                                        Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush mb-4 small">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-0">
                                <span class="text-slate-500"><i class="bi bi-boxes me-2"></i>Stok</span>
                                <span class="fw-bold text-slate-800">{{ $produk->stok }} Porsi</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-0">
                                <span class="text-slate-500"><i class="bi bi-person me-2"></i>Nama Penginput</span>
                                <span class="fw-semibold text-slate-700">{{ $produk->user->name ?? '-' }}</span>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.app')

@section('title', 'Edit Produk - ' . $produk->nama)

@section('content')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-500 { color: #64748b; }
    .rounded-4 { border-radius: 1rem !important; }
</style>

<div class="bg-slate-100 min-vh-100 py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7">
                
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-warning bg-opacity-10 rounded-3 p-2 me-3" style="width: 42px; height: 42px;">
                                <i class="bi bi-pencil-square text-warning fs-5"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold text-slate-800 mb-0">Edit Produk</h5>
                                <p class="text-slate-500 mb-0 small">Ubah informasi, harga, atau stok barang</p>
                            </div>
                        </div>
                        <a href="{{ route('produk.index') }}" class="btn-close" aria-label="Close"></a>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('produk.update', $produk) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('produk._form', ['product' => $produk])

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
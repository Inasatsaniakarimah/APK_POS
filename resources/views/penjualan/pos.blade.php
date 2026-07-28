@extends('layouts.app')

@section('title', 'Tambah Penjualan - POS Inasa')

@section('content')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-700 { color: #334155; }
    .text-slate-600 { color: #475569; }
    .text-slate-500 { color: #64748b; }
    .text-slate-400 { color: #94a3b8; }
    .rounded-4 { border-radius: 1rem !important; }
</style>

<div class="bg-slate-100 min-vh-100 py-4" style="background-color: #f8fafc;">
    <div class="container-fluid px-4">

        @if (session('errors'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center mb-4">
            <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm rounded-4" style="width: 52px; height: 52px;">
                <i class="bi bi-calculator-fill fs-4" style="color: #4f46e5;"></i>
            </div>
            <div class="ms-3">
                <h4 class="fw-bold text-slate-800 mb-0">Tambah Penjualan</h4>
                <p class="text-slate-500 mb-0 small">Pilih produk dan selesaikan transaksi kasir</p>
            </div>
        </div>

        <div class="row g-4">
            
            {{-- =================== BAGIAN KIRI: DAFTAR PRODUK =================== --}}
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white h-100">
                    
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                        <h6 class="fw-bold text-slate-800 mb-2">Pilih Produk</h6>
                        <form method="GET" action="{{ route('penjualan.create') }}">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-slate-400">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       class="form-control bg-light border-start-0 text-slate-800"
                                       placeholder="Cari nama produk..."
                                       onkeyup="this.form.submit()">
                            </div>
                        </form>
                    </div>

                    <div class="card-body p-3" style="max-height: 65vh; overflow-y: auto;">
                        <div class="d-flex flex-column gap-2">
                            @foreach ($products as $product)
                                <form method="POST" action="{{ route('itempenjualan.store') }}" class="m-0">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="p-2 border rounded-3 bg-light d-flex align-items-center justify-content-between gap-2">
                                        
                                        <div class="flex-grow-1 ps-2">
                                            <div class="fw-semibold text-slate-800">{{ $product->nama }}</div>
                                            <small class="text-slate-500">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</small>
                                        </div>

                                        <div style="width: 90px;">
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="1" 
                                                   min="1"
                                                   class="form-control form-control-sm text-center {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}"
                                                   {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}>
                                        </div>

                                        <div>
                                            <button type="submit" 
                                                    class="btn btn-sm text-white fw-semibold px-3 py-1.5 rounded-3 border-0 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                                                    style="background-color: #4f46e5;">
                                                <i class="bi bi-plus-lg me-1"></i> Tambah
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            {{-- =================== BAGIAN KANAN: KERANJANG & CHECKOUT =================== --}}
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white d-flex flex-column h-100">
                    
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                        <h6 class="fw-bold text-slate-800 mb-0">Keranjang Belanja</h6>
                    </div>

                    <div class="card-body p-0 table-responsive flex-grow-1" style="max-height: 45vh; overflow-y: auto;">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light text-slate-500 small font-monospace">
                                <tr>
                                    <th scope="col" class="ps-4 py-3">PRODUK</th>
                                    <th scope="col" class="py-3">HARGA</th>
                                    <th scope="col" class="py-3" style="width: 100px;">QTY</th>
                                    <th scope="col" class="py-3">SUBTOTAL</th>
                                    <th scope="col" class="text-end pe-4 py-3" style="width: 60px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sale->itemPenjualan as $item)
                                    <tr>
                                        <td class="ps-4 fw-medium text-slate-800">
                                            {{ $item->produk->nama }}
                                        </td>

                                        <td class="text-slate-600">
                                            Rp {{ number_format($item->produk->harga_jual, 0, ',', '.') }}
                                        </td>

                                        <td>
                                            <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}" class="m-0">
                                                @csrf 
                                                @method('PUT')
                                                <input type="number" 
                                                       name="quantity"
                                                       value="{{ $item->kuantitas }}" 
                                                       min="1"
                                                       onchange="this.form.submit()"
                                                       class="form-control form-control-sm text-center">
                                            </form>
                                        </td>

                                        <td class="fw-bold text-indigo" style="color: #4f46e5;">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </td>

                                        <td class="text-end pe-4">
                                            @can('delete', $item)
                                                <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}" class="m-0">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-light text-danger border p-1.5 rounded-3" title="Hapus Item">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-slate-400">
                                            <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                                            Keranjang masih kosong
                                        </td> 
                                    </tr>
                                @endforelse
                            </tbody> 
                        </table>
                    </div>

                    <div class="card-footer bg-light p-4 border-top">
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-slate-600 fw-medium">Total Pembayaran</span>
                            <span class="fs-4 fw-bold text-slate-800">
                                Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                            </span>
                        </div>

                        <form method="POST" action="{{ route('penjualan.update', $sale->id) }}" onsubmit="return confirm('Yakin ingin menyelesaikan transaksi (Checkout)?')">
                            @csrf 
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-slate-600">Metode Pembayaran</label>
                                <select name="payment_method" class="form-select bg-white text-slate-800" required>
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="CASH">Cash (Tunai)</option>
                                    <option value="QRIS">QRIS</option>
                                    <option value="TRANSFER">Transfer Bank</option>
                                </select>
                            </div>

                            <button type="submit" 
                                    class="btn text-white fw-bold w-100 py-2.5 rounded-3 border-0 shadow-sm {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                                    style="background-color: #10b981;">
                                <i class="bi bi-check-circle-fill me-1"></i> Checkout Transaksi
                            </button>
                        </form>

                        @can('delete', $sale)
                            <form action="{{ route('penjualan.destroy', $sale->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin ingin membatalkan transaksi ini??')"
                                  class="mt-2">
                                @csrf
                                @method('DELETE')

                                <button type="submit" 
                                        class="btn btn-outline-danger btn-sm w-100 py-2 rounded-3 fw-semibold {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                    <i class="bi bi-x-circle me-1"></i> Batalkan Transaksi
                                </button>
                            </form>
                        @endcan

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
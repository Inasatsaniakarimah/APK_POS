@extends('layouts.app')

@section('title', 'Detail Penjualan')

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

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm rounded-4" style="width: 52px; height: 52px;">
                    <i class="bi bi-receipt-cutoff fs-4" style="color: #4f46e5;"></i>
                </div>
                <div class="ms-3">
                    <h4 class="fw-bold text-slate-800 mb-0">Detail Penjualan</h4>
                    <p class="text-slate-500 mb-0 small">Informasi lengkap mengenai rincian transaksi kasir</p>
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('penjualan.index') }}" class="btn-close" aria-label="Close"></a>
            </div>
        </div>

        <div class="row g-4">
            
            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white h-100">
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                        <h6 class="fw-bold text-slate-800 mb-0">Ringkasan Transaksi</h6>
                    </div>
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div class="d-flex flex-column gap-3">
                            
                            <div class="d-flex align-items-center justify-content-between border-bottom pb-2">
                                <span class="text-slate-500 small">Kasir</span>
                                <span class="fw-semibold text-slate-800">{{ $sale->user->name ?? '-' }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between border-bottom pb-2">
                                <span class="text-slate-500 small">Tanggal Transaksi</span>
                                <span class="fw-medium text-slate-800">
                                    {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between border-bottom pb-2">
                                <span class="text-slate-500 small">Metode Pembayaran</span>
                                <span class="badge bg-light text-slate-700 border px-2.5 py-1.5 rounded-2 font-monospace">
                                    {{ $sale->metode_pembayaran ?? $sale->payment_method ?? 'CASH' }}
                                </span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between border-bottom pb-2">
                                <span class="text-slate-500 small">Status</span>
                                @if(strtoupper($sale->status ?? '') === 'COMPLETED')
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success px-2.5 py-1.5 rounded-pill small">
                                        <i class="bi bi-check-circle-fill me-1"></i> COMPLETED
                                    </span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-2.5 py-1.5 rounded-pill small">
                                        <i class="bi bi-clock-history me-1"></i> {{ strtoupper($sale->status ?? 'PENDING') }}
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="mt-4 p-3 rounded-3 bg-light text-center border">
                            <span class="text-slate-500 small d-block mb-1">Total Pembayaran</span>
                            <span class="fs-3 fw-bold text-slate-800">
                                Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                        <h6 class="fw-bold text-slate-800 mb-0">Item Produk Dibelikan</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light text-slate-500 small font-monospace">
                                <tr>
                                    <th scope="col" class="ps-4 py-3" style="width: 50px;">NO</th>
                                    <th scope="col" class="py-3" style="width: 80px;">FOTO</th>
                                    <th scope="col" class="py-3">NAMA PRODUK</th>
                                    <th scope="col" class="py-3">HARGA SATUAN</th>
                                    <th scope="col" class="text-center py-3" style="width: 70px;">QTY</th>
                                    <th scope="col" class="text-end pe-4 py-3">SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sale->itemPenjualan as $item)
                                    <tr>
                                        <td class="ps-4 fw-medium text-slate-500">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            @if(!empty($item->produk->foto))
                                                <img src="{{ asset('storage/' . $item->produk->foto) }}" alt="Foto Produk" class="rounded-3 border object-fit-cover" width="48" height="48">
                                            @else
                                                <div class="rounded-3 border bg-light d-flex align-items-center justify-content-center text-slate-400" style="width: 48px; height: 48px;">
                                                    <i class="bi bi-image fs-5"></i>
                                                </div>
                                            @endif
                                        </td>

                                        <td class="fw-semibold text-slate-800">
                                            {{ $item->produk->nama ?? 'Produk dihapus' }}
                                        </td>

                                        <td class="text-slate-600">
                                            Rp {{ number_format($item->harga_satuan ?? $item->produk->harga_jual ?? 0, 0, ',', '.') }}
                                        </td>

                                        <td class="text-center fw-medium text-slate-700">
                                            {{ $item->kuantitas ?? 1 }}
                                        </td>

                                        <td class="text-end pe-4 fw-bold" style="color: #4f46e5;">
                                            Rp {{ number_format($item->subtotal ?? ($item->produk->harga_jual * ($item->kuantitas ?? 1)), 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-slate-400">
                                            <i class="bi bi-box-seam fs-1 d-block mb-2"></i>
                                            Tidak ada item pada transaksi ini
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
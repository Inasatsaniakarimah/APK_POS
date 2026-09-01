@extends('layouts.app')

@section('title', 'Penjualan/Transaksi')

@section('content')

@include('layouts.navbar')

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
        
        @if (session('errors'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm rounded-4" style="width: 56px; height: 56px;">
                    <i class="bi bi-cart-check-fill text-indigo fs-4" style="color: #4f46e5;"></i>
                </div>
                <div class="ms-3">
                    <h3 class="fw-bold text-slate-800 mb-0">Halaman Penjualan</h3>
                    <p class="text-slate-500 mb-0 small">Pantau dan kelola seluruh riwayat transaksi kasir</p>
                </div>
            </div>

            <a href="{{ route('penjualan.create') }}" class="btn text-white fw-semibold rounded-3 px-4 py-2 shadow-sm border-0 d-inline-flex align-items-center justify-content-center" style="background-color: #4f46e5;">
                <i class="bi bi-plus-lg me-2"></i> Transaksi Baru
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            
            <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                <form action="{{ route('penjualan.index') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-slate-400">
                                <i class="bi bi-search"></i>
                            </span>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                class="form-control bg-light border-start-0 text-slate-800 text-sm" 
                                placeholder="Cari Kasir..."
                            >
                            <button class="btn btn-outline-secondary px-3" type="submit">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light text-slate-500 small font-monospace">
                        <tr>
                            <th scope="col" class="ps-4 py-3" style="width: 60px;">NO</th>
                            <th scope="col" class="py-3">TANGGAL TRANSAKSI</th>
                            <th scope="col" class="py-3">KASIR</th>
                            <th scope="col" class="py-3">TOTAL PENJUALAN</th>
                            <th scope="col" class="py-3">METODE PEMBAYARAN</th>
                            <th scope="col" class="py-3">STATUS</th>
                            <th scope="col" class="text-end pe-4 py-3" style="width: 150px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sales as $sale)
                            <tr>
                                <td class="ps-4 fw-medium text-slate-500">
                                    {{ $sales->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-medium text-slate-800">
                                    <i class="bi bi-calendar-event me-1 text-slate-400"></i>
                                    {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                                </td>

                                <td class="text-slate-700 fw-medium">
                                    {{ $sale->user->name ?? '-' }}
                                </td>

                                <td class="fw-bold text-slate-800">
                                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="badge bg-light text-slate-700 border px-2.5 py-1.5 rounded-2 font-monospace">
                                        {{ $sale->metode_pembayaran ?? $sale->payment_method ?? 'CASH' }}
                                    </span>
                                </td>

                                <td>
                                    @if(strtoupper($sale->status) === 'COMPLETED')
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-2.5 py-1.5 rounded-pill small">
                                            <i class="bi bi-check-circle-fill me-1"></i> COMPLETED
                                        </span>
                                    @else
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-2.5 py-1.5 rounded-pill small">
                                            <i class="bi bi-clock-history me-1"></i> {{ strtoupper($sale->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-sm btn-light text-info border p-2 rounded-3" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        @can('view', $sale)
                                            <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-light text-warning border p-2 rounded-3" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @endcan

                                        @can('delete', $sale)
                                            <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    class="btn btn-sm btn-light text-danger border p-2 rounded-3" 
                                                    onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini??')"
                                                    title="Hapus"
                                                >
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-slate-400">
                                    <i class="bi bi-receipt-cutoff fs-1 d-block mb-2"></i>
                                    Data Penjualan Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-4 py-3 border-top d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <div class="text-slate-500 small">
                    Showing <span class="fw-semibold text-slate-800">{{ $sales->firstItem() ?? 0 }}</span> to <span class="fw-semibold text-slate-800">{{ $sales->lastItem() ?? 0 }}</span> of <span class="fw-semibold text-slate-800">{{ $sales->total() }}</span> results
                </div>
                <div>
                    {{ $sales->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
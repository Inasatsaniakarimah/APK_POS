@extends('layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-700 { color: #334155; }
    .text-slate-500 { color: #64748b; }
    .text-slate-400 { color: #94a3b8; }
    .rounded-4 { border-radius: 1rem !important; }

    /* CSS Khusus Cetak/Print */
    @media print {
        body { background-color: #fff !important; }
        .no-print, nav, header, footer, .btn, form { display: none !important; }
        .card { border: none !important; shadow: none !important; }
        .container { max-width: 100% !important; width: 100% !important; padding: 0 !important; }
        .table { width: 100% !important; border-collapse: collapse !important; }
        .table th, .table td { border: 1px solid #cbd5e1 !important; padding: 8px !important; }
    }
</style>

<div class="bg-slate-100 min-vh-100 py-5" style="background-color: #f8fafc;">
    <div class="container">
        
        <!-- Header -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm rounded-4 no-print" style="width: 56px; height: 56px;">
                    <i class="bi bi-file-earmark-bar-graph-fill text-indigo fs-4" style="color: #4f46e5;"></i>
                </div>
                <div class="ms-md-3">
                    <h3 class="fw-bold text-slate-800 mb-0">Laporan Penjualan</h3>
                    <p class="text-slate-500 mb-0 small">Ringkasan transaksi penjualan toko</p>
                </div>
            </div>

            <div class="d-flex gap-2 no-print">
                <a href="{{ route('penjualan.index') }}" class="btn btn-light border fw-semibold rounded-3 px-3 py-2">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <button onclick="window.print()" class="btn text-white fw-semibold rounded-3 px-4 py-2 shadow-sm border-0" style="background-color: #4f46e5;">
                    <i class="bi bi-printer-fill me-2"></i> Cetak Laporan
                </button>
            </div>
        </div>

        <!-- Filter Tanggal -->
        <div class="card border-0 shadow-sm rounded-4 bg-white mb-4 no-print">
            <div class="card-body p-4">
                <form action="{{ route('penjualan.laporan') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label class="form-label text-slate-700 fw-medium small">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control bg-light border-0 text-slate-800">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label text-slate-700 fw-medium small">Tanggal Selesai</label>
                        <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control bg-light border-0 text-slate-800">
                    </div>
                    <div class="col-12 col-md-4 d-flex gap-2">
                        <button type="submit" class="btn text-white fw-semibold rounded-3 px-4 w-100" style="background-color: #4f46e5;">
                            <i class="bi bi-filter me-1"></i> Filter
                        </button>
                        <a href="{{ route('penjualan.laporan') }}" class="btn btn-light border text-slate-700 fw-semibold rounded-3">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Metric Summary Card -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3 me-3 no-print">
                            <i class="bi bi-cash-stack fs-3"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small d-block">Total Pendapatan</span>
                            <h4 class="fw-bold text-slate-800 mb-0">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 me-3 no-print">
                            <i class="bi bi-receipt fs-3"></i>
                        </div>
                        <div>
                            <span class="text-slate-500 small d-block">Total Transaksi</span>
                            <h4 class="fw-bold text-slate-800 mb-0">{{ $totalTransaksi ?? 0 }} Transaksi</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light text-slate-500 small font-monospace">
                        <tr>
                            <th scope="col" class="ps-4 py-3" style="width: 60px;">NO</th>
                            <th scope="col" class="py-3">TANGGAL TRANSAKSI</th>
                            <th scope="col" class="py-3">KASIR</th>
                            <th scope="col" class="py-3">METODE PEMBAYARAN</th>
                            <th scope="col" class="py-3">STATUS</th>
                            <th scope="col" class="text-end pe-4 py-3">TOTAL PENJUALAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sales as $sale)
                            <tr>
                                <td class="ps-4 fw-medium text-slate-500">{{ $loop->iteration }}</td>
                                <td class="fw-medium text-slate-800">
                                    {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                                </td>
                                <td class="text-slate-700 fw-medium">{{ $sale->user->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-light text-slate-700 border px-2.5 py-1.5 rounded-2 font-monospace">
                                        {{ $sale->metode_pembayaran ?? $sale->payment_method ?? 'CASH' }}
                                    </span>
                                </td>
                                <td>
                                    @if(strtoupper($sale->status) === 'COMPLETED')
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-2.5 py-1.5 rounded-pill small">
                                            COMPLETED
                                        </span>
                                    @else
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning px-2.5 py-1.5 rounded-pill small">
                                            {{ strtoupper($sale->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end pe-4 fw-bold text-slate-800">
                                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-slate-400">
                                    Data Laporan Penjualan Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
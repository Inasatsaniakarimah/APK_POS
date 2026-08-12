<!-- memanggil file app.blade.php -->
 @extends('layouts.app')

 <!-- mengirimkan nilai ke tittle untuk ditampilkan --> 
@section('title', 'Login')

<!-- batas awal isi konten --> 
@section('content')

@include('layouts.navbar')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-500 { color: #64748b; }
    .text-slate-400 { color: #94a3b8; }
    .rounded-4 { border-radius: 1rem !important; }
    .tracking-wider { letter-spacing: 0.05em; }
    .table thead th { font-size: 0.75rem; font-weight: 700; }
</style>

<div class="bg-slate-100 min-vh-100 py-5" style="background-color: #f8fafc;">
    <div class="container">
        
        <div class="d-flex align-items-center mb-5">
            <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm rounded-4" style="width: 56px; height: 56px;">
                <i class="bi bi-grid-1x2-fill text-indigo fs-4" style="color: #4f46e5;"></i>
            </div>
            <div class="ms-3">
                <h3 class="fw-bold text-slate-800 mb-0">Ringkasan Hari Ini</h3>
                <p class="text-slate-500 mb-0 small">
                    <i class="bi bi-calendar3 me-1"></i> {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
                </p>
            </div>
        </div>

        @can('viewAny', App\Models\User::class)
            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-white border-start border-4" style="border-color: #e30d0d !important;">
                        <div class="card-body p-4 text-center">
                            <p class="text-uppercase text-slate-400 fw-bold small mb-2 tracking-wider">Total Penjualan</p>
                            <h4 class="fw-bold text-slate-800 mb-2" style="color: #e30d0d;">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }} </h4>
                            <span class="badge px-3 py-2 rounded-pill" style="background-color: #eef2ff; color: #e30d0d;">Hari Ini</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-white border-start border-4" style="border-color: #1df0f0 !important;">
                        <div class="card-body p-4 text-center">
                            <p class="text-uppercase text-slate-400 fw-bold small mb-2 tracking-wider">Jumlah Transaksi</p>
                            <h4 class="fw-bold text-slate-800 mb-2" style="color: #1df0f0;">{{ number_format($ringkasan['total_transaksi'], 0, ',', '.') }}</h4>
                            <span class="badge px-3 py-2 rounded-pill" style="background-color: #ecfdf5; color: #1df0f0;">Transaksi</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-white border-start border-4" style="border-color: #10b981 !important;">
                        <div class="card-body p-4 text-center">
                            <p class="text-uppercase text-slate-400 fw-bold small mb-2 tracking-wider">Pembayaran Tunai</p>
                            <h4 class="fw-bold text-slate-800 mb-2" style="color: #10b981;">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</h4>
                            <span class="badge px-3 py-2 rounded-pill" style="background-color: #ecfdf5; color: #10b981;">Cash</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 bg-white border-start border-4" style="border-color: #176af1 !important;">
                        <div class="card-body p-4 text-center">
                            <p class="text-uppercase text-slate-400 fw-bold small mb-2 tracking-wider">Non-Tunai</p>
                            <h4 class="fw-bold text-slate-800 mb-2" style="color: #176af1;">Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}</h4>
                            <span class="badge px-3 py-2 rounded-pill" style="background-color: #f5f3ff; color: #176af1;">Digital</span>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <div class="row g-4 mb-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-white">
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                        <h6 class="fw-bold text-slate-800 mb-0"><i class="bi bi-exclamation-circle text-warning me-2"></i>Stok Rendah</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr class="text-slate-400 small">
                                    <th class="ps-4 py-3">NAMA MENU</th>
                                    <th class="text-end pe-4">STOK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkStokRendah as $produk)
                                    <tr>
                                        <td class="ps-4 fw-medium text-slate-700">{{ $produk->nama }}</td>
                                        <td class="text-end pe-4">
                                            <span class="badge bg-warning text-dark rounded-pill">{{ $produk->stok }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-4 text-slate-400 small">Semua stok aman.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                        <h6 class="fw-bold text-slate-800 mb-0"><i class="bi bi-x-circle text-danger me-2"></i>Stok Habis</h6>
                    </div>
                    <div class="card-body p-0 text-center">
                        @if($produkStokHabis->isEmpty())
                            <div class="py-4">
                                <i class="bi bi-check2-circle text-success fs-1"></i>
                                <p class="text-slate-400 small mt-2">Tidak ada menu yang habis.</p>
                            </div>
                        @else
                            @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white h-100">
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-slate-800 mb-0"><i class="bi bi-star-fill text-warning me-2"></i>Menu Terlaris</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr class="text-slate-400 small">
                                        <th class="ps-4 py-3">MENU</th>
                                        <th class="text-center">SISA STOK</th>
                                        <th class="text-end pe-4">TERJUAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produkTerlaris as $produk)
                                        <tr>
                                            <td class="ps-4 fw-bold text-slate-700">{{ $produk->nama }}</td>
                                            <td class="text-center">
                                                <span class="text-slate-500 small">{{ $produk->stok }} Item</span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <span class="fw-bold text-indigo" style="color: #4f46e5;">{{ number_format($produk->total_terjual) }} Unit</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-slate-400 small">Belum ada data penjualan.</td>
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
</div>


@endsection
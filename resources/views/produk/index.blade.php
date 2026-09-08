@extends('layouts.app')

@section('title', 'Data Menu')

@section('content')

@include('layouts.navbar')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-600 { color: #475569; }
    .text-slate-500 { color: #64748b; }
    .text-slate-400 { color: #94a3b8; }
    .rounded-4 { border-radius: 1rem !important; }
    .table thead th { font-size: 0.75rem; font-weight: 700; letter-spacing: 0.05em; }
</style>

<div class="bg-slate-100 min-vh-100 py-5" style="background-color: #f8fafc;">
    <div class="container">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white shadow-sm rounded-4" style="width: 56px; height: 56px;">
                    <i class="bi bi-cup-hot fs-4" style="color: #4f46e5;"></i>
                </div>
                <div class="ms-3">
                    <h3 class="fw-bold text-slate-800 mb-0">Manajemen Menu</h3>
                    <p class="text-slate-500 mb-0 small">Kelola ketersediaan Makanan dan Minuman</p>
                </div>
            </div>

            @can('create', App\Models\Produk::class)
                <a href="{{ route('produk.create') }}" class="btn text-white fw-semibold rounded-3 px-4 py-2 shadow-sm border-0 d-inline-flex align-items-center justify-content-center" style="background-color: #4f46e5;">
                    <i class="bi bi-plus-lg me-2"></i> Tambah Menu Baru
                </a>
            @endcan
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            
            <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                <form action="{{ route('produk.index') }}" method="GET" class="row g-2 align-items-center">
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
                                placeholder="Cari Menu..."
                            >
                            <button class="btn btn-outline-secondary px-3" type="submit">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr class="text-slate-400 small">
                                <th scope="col" class="ps-4 py-3" style="width: 60px;">NO</th>
                                <th scope="col" class="py-3">FOTO</th>
                                <th scope="col" class="py-3">NAMA MENU</th>
                                <th scope="col" class="py-3">JENIS</th>
                                <th scope="col" class="py-3">HARGA BELI</th>
                                <th scope="col" class="py-3">HARGA JUAL</th>
                                <th scope="col" class="py-3 text-center">STOK</th>
                                <th scope="col" class="py-3">ADMIN</th>
                                <th class="text-end pe-4" style="width: 20%;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="ps-4 fw-medium text-slate-500">{{ $products->firstItem() + $loop->index }}</td>
                                    
                                    <td>
                                        @if($product->foto)
                                            <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama }}" class="rounded-3 border" style="width: 48px; height: 48px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border text-slate-400" style="width: 48px; height: 48px;">
                                                <i class="bi bi-image fs-5"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="fw-bold text-slate-800">{{ $product->nama }}</div>
                                    </td>

                                    
                                    <td class="fw-semibold text-slate-800"
                                        <span class="fw-bold text-slate-800">
                                            {{ $product->jenis ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="fw-semibold text-slate-800"">
                                        Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
                                    </td>

                                    <td class="fw-semibold text-slate-800">
                                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                    </td>

                                    <td class="text-center">
                                        @if($product->stok <= 0)
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-3">Habis</span>
                                        @elseif($product->stok < 10)
                                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill px-3">{{ $product->stok }} Porsi</span>
                                        @else
                                            <span class="badge bg-light text-slate-600 border rounded-pill px-3">{{ $product->stok }} Porsi</span>
                                        @endif
                                    </td>

                                    <td class="text-slate-500 small">
                                        <i class="bi bi-person me-1"></i>{{ $product->user->name ?? '-' }}
                                    </td>

                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('produk.show', $product) }}" class="btn btn-sm btn-outline-info rounded-2 px-2 fw-medium" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            @can('update', $product)
                                                <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-outline-warning rounded-2 px-2 fw-medium" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $product)
                                                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button 
                                                        type="submit" 
                                                        class="btn btn-sm btn-outline-danger rounded-2 px-2 fw-medium"
                                                        onclick="return confirm('Yakin hapus menu ini??')"
                                                        title="Hapus"
                                                    >
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    
                                    <td colspan="9" class="text-center py-5 text-slate-400">
                                        <i class="bi bi-cup-hot fs-1 d-block mb-2"></i>
                                        Data produk tidak tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($products->hasPages())
                <div class="card-footer bg-white border-0 py-3 px-4">
                    {{ $products->links() }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection
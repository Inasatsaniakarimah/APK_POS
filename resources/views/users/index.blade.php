@extends('layouts.app')

@section('title', 'Pengguna')

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
                    <i class="bi bi-people-fill text-indigo fs-4" style="color: #4f46e5;"></i>
                </div>
                <div class="ms-3">
                    <h3 class="fw-bold text-slate-800 mb-0">Manajemen Pengguna</h3>
                    <p class="text-slate-500 mb-0 small">Kelola data pengguna dan hak akses sistem POS</p>
                </div>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn text-white fw-semibold rounded-3 px-4 py-2 shadow-sm border-0 d-inline-flex align-items-center justify-content-center" style="background-color: #4f46e5;">
                <i class="bi bi-plus-lg me-2"></i> Tambah Pengguna
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            
            <div class="card-header bg-white py-3 px-4 border-0 border-bottom">
                <form action="{{ route('admin.users') }}" method="GET" class="row g-2 align-items-center">
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
                                placeholder="Cari Nama atau Email..."
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
                                <th class="ps-4 py-3" style="width: 5%;">NO</th>
                                <th scope="col" class="py-3">NAMA</th>
                                <th scope="col" class="py-3">EMAIL</th>
                                <th scope="col" class="py-3">ROLE</th>
                                <th class="text-end pe-4" style="width: 20%;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="ps-4 fw-medium text-slate-500">{{ $users->firstItem() + $loop->index }}</td>
                                    <td>
                                        <div class="fw-bold text-slate-800">{{ $user->name }}</div>
                                    </td>
                                    <td class="text-slate-600">{{ $user->email }}</td>
                                    <td>
                                        @if(strtolower($user->role->name) == 'admin')
                                            <span class="badge px-3 py-2 rounded-pill bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">
                                                <i class="bi bi-shield-lock-fill me-1"></i> {{ ucfirst($user->role->name) }}
                                            </span>
                                        @else
                                            <span class="badge px-3 py-2 rounded-pill" style="background-color: #eef2ff; color: #4f46e5;">
                                                <i class="bi bi-person-badge me-1"></i> {{ ucfirst($user->role->name) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-warning rounded-2 px-3 fw-medium">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="submit" 
                                                    class="btn btn-sm btn-outline-danger rounded-2 px-3 fw-medium"
                                                    onclick="return confirm('Yakin ingin menghapus Pengguna {{ $user->name }}?')"
                                                >
                                                    <i class="bi bi-trash me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-slate-400">
                                        <i class="bi bi-person-x fs-1 d-block mb-2"></i>
                                        Tidak ada data pengguna yang ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($users->hasPages())
                <div class="card-footer bg-white border-0 py-3 px-4">
                    {{ $users->links() }}
                </div>
            @endif

        </div>

    </div>
</div>



@endsection
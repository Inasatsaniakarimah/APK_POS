@extends('layouts.app')

@section('title', 'Tambah User')

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
            <div class="col-12 col-md-8 col-lg-6">
                
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    
                    <div class="card-header bg-white py-3 px-4 border-0 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 p-2 me-3" style="width: 42px; height: 42px; background-color: #eef2ff;">
                                <i class="bi bi-person-plus-fill fs-5" style="color: #4f46e5;"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold text-slate-800 mb-0">Tambah Pengguna Baru</h5>
                                <p class="text-slate-500 mb-0 small">Buat akun pengguna baru untuk akses sistem POS</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.users') }}" class="btn-close" aria-label="Close"></a>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            @include('users._form')

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection
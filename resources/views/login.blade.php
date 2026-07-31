@extends('layouts.app')

@section('title', 'Login - POS Inasa')

@section('content')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    .text-slate-800 { color: #1e293b; }
    .text-slate-700 { color: #334155; }
    .text-slate-400 { color: #94a3b8; }
    .rounded-4 { border-radius: 1rem !important; }
    .btn:hover { background-color: #4338ca !important; }
</style>

<div class="min-vh-100 d-flex justify-content-center align-items-center py-5" style="background-color: #f8fafc;">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4 px-3">
        
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
            
            <div class="card-header text-white text-center py-4 border-0" style="background-color: #0f172a;">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 p-2 mb-2" style="background-color: #4f46e5;">
                    <i class="bi bi-shop fs-4 text-white"></i>
                </div>
                <h5 class="fw-bold mb-0 tracking-wide text-white">POS Inasa</h5>
                <small class="text-slate-400 opacity-75">Silakan masuk ke akun Anda</small>
            </div>

            <div class="card-body p-4 p-sm-5">
                <form action="{{ route('auth') }}" method="POST">
                    @csrf

                    <div class="mb-3 text-start">
                        <label for="email" class="form-label text-slate-700 small fw-semibold">EMAIL</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-slate-400">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}"
                                class="form-control bg-light border-start-0 text-slate-800 @error('email') is-invalid @enderror" 
                                placeholder="Masukan Email Anda"
                                required 
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 text-start">
                        <label for="password" class="form-label text-slate-700 small fw-semibold">PASSWORD</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-slate-400">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                name="password" 
                                id="password"  
                                class="form-control bg-light border-start-0 text-slate-800 @error('password') is-invalid @enderror" 
                                placeholder="Masukan Password Anda"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid pt-2">
                        <button type="submit" class="btn text-white py-2.5 rounded-3 fw-bold border-0 shadow-sm transition" style="background-color: #4f46e5;">
                            Login
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>

@endsection
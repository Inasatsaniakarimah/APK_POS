@extends('layouts.app')

@section('title', 'Login - POS Saung Biru Rasa')

@section('content')

<style>
    body { font-family: 'Inter', 'Segoe UI', sans-serif; }
    
    .bg-login-wrapper {
        min-height: 100vh;
        background: #f0f3ff;
        position: relative;
    }

    .card-login-soft {
        background: #ffffff;
        border: 1px solid #c7d2fe;
        border-radius: 1.5rem !important;
        box-shadow: 0 15px 30px -10px rgba(79, 70, 229, 0.12) !important;
    }

    .input-group-text {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #6366f1;
    }

    .form-control {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #1e293b;
        font-size: 0.95rem;
    }

    .form-control:focus {
        background-color: #ffffff;
        border-color: #818cf8;
        box-shadow: 0 0 0 4px rgba(129, 140, 248, 0.15);
    }

    .btn-periwinkle {
        background-color: #4f46e5;
        color: #ffffff;
        border: none;
        transition: all 0.25s ease;
    }

    .btn-periwinkle:hover {
        background-color: #4338ca;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 8px 18px -4px rgba(79, 70, 229, 0.35);
    }
</style>

<div class="bg-login-wrapper d-flex justify-content-center align-items-center py-5">
    <div class="col-12 col-sm-9 col-md-7 col-lg-4 px-3">
        
        <div class="card card-login-soft overflow-hidden p-3 p-sm-4">
            
            <div class="text-center pt-3 pb-2">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle p-3 mb-3 shadow-sm" style="background-color: #e0e7ff; width: 68px; height: 68px;">
                    <i class="bi bi-shop fs-5"></i>
                </div>
                <h4 class="fw-bold mb-1" style="color: #1e1b4b; letter-spacing: -0.3px;">POS SAUNG RASA</h4>
                <p class="text-muted small mb-0">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Form Body -->
            <div class="card-body pt-4">
                <form action="{{ route('auth') }}" method="POST">
                    @csrf

                    <div class="mb-3 text-start">
                        <label for="email" class="form-label small fw-semibold mb-1" style="color: #475569;">EMAIL</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}"
                                class="form-control border-start-0 py-2.5 @error('email') is-invalid @enderror" 
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
                        <label for="password" class="form-label small fw-semibold mb-1" style="color: #475569;">PASSWORD</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                name="password" 
                                id="password"  
                                class="form-control border-start-0 py-2.5 @error('password') is-invalid @enderror" 
                                placeholder="Masukan Password Anda"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid pt-1">
                        <button type="submit" class="btn btn-periwinkle py-2.5 rounded-3 fw-bold d-flex align-items-center justify-content-center gap-2">
                            <span>Masuk</span>
                            <i class="bi bi-arrow-right fs-5"></i>
                        </button>
                    </div>

                </form>
            </div>

            <!-- Footer Kartu -->
            <div class="text-center pt-3 pb-1 border-top mt-2" style="border-color: #e0e7ff !important;">
                <small class="text-muted" style="font-size: 0.78rem;">&copy; {{ date('Y') }} POS Saung Biru Rasa</small>
            </div>

        </div>

    </div>
</div>

@endsection
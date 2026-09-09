@extends('layouts.app')

@section('title', 'ISK Coffee - Premium Menu')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap');

    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body, html {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
        background-color: #f0f3ff; /* Soft Light Background */
        color: #1e1b4b;
    }

    /* Layout Full Width Membentang Layar */
    .container-full {
        width: 100vw;
        max-width: 100vw;
        margin-left: calc(-50vw + 50%);
        margin-right: calc(-50vw + 50%);
        padding-left: 6vw;
        padding-right: 6vw;
    }

    /* Navbar Modern Light Glassmorphism */
    .navbar-glass {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid #e0e7ff;
        z-index: 1030;
    }

    /* Hero Full Screen (100vh) */
    .hero-wrapper {
        min-height: 100vh;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        margin-right: calc(-50vw + 50%);
        margin-top: -76px;
        background: linear-gradient(180deg, rgba(240, 243, 255, 0.75) 0%, rgba(240, 243, 255, 0.95) 80%, #f0f3ff 100%), 
                    url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .hero-title {
        font-size: clamp(2.8rem, 6vw, 5rem);
        font-weight: 800;
        letter-spacing: -2px;
        line-height: 1.08;
        color: #1e1b4b;
    }

    .text-gradient {
        background: linear-gradient(135deg, #4f46e5 0%, #312e81 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .text-indigo-brand {
        color: #4f46e5;
    }

    /* Card Menu Modern Light */
    .card-menu {
        border: 1px solid #e0e7ff !important;
        border-radius: 24px;
        background: #ffffff;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(79, 70, 229, 0.05);
    }

    .card-menu:hover {
        transform: translateY(-10px);
        border-color: #c7d2fe !important;
        box-shadow: 0 20px 40px rgba(79, 70, 229, 0.12);
    }

    .img-container {
        width: 100%;
        height: 250px;
        overflow: hidden;
        position: relative;
        background: #eef2ff;
    }

    .card-menu-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .card-menu:hover .card-menu-img {
        transform: scale(1.1);
    }

    .badge-price {
        background: #eef2ff;
        border: 1px solid #c7d2fe;
        color: #4338ca;
        font-weight: 700;
        font-size: 1.1rem;
        padding: 6px 16px;
        border-radius: 50px;
    }

    /* Section Tentang Kami Luxury Card */
    .about-card {
        background: #ffffff;
        border-radius: 32px;
        border: 1px solid #e0e7ff;
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.06);
    }

    .btn-glow {
        background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        border: none;
        color: #ffffff !important;
        transition: all 0.3s ease;
    }

    .btn-glow:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.45);
        background: linear-gradient(135deg, #4338ca 0%, #3730a3 100%);
    }
</style>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-glass sticky-top py-3">
    <div class="container-full d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center gap-3 fw-bold" href="/" style="color: #1e1b4b;">
            <div class="d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="width: 42px; height: 42px; background: #eef2ff; border: 1px solid #c7d2fe;">
                <i class="bi bi-cup-hot-fill fs-5 text-indigo-brand"></i>
            </div>
            <span class="fs-4 fw-bolder" style="letter-spacing: -0.5px;">ISK <span class="text-indigo-brand">Coffee</span></span>
        </a>

        <div>
            <a href="{{ route('login') }}" class="btn btn-glow px-4 py-2.5 rounded-pill fw-semibold d-flex align-items-center gap-2">
                <i class="bi bi-person-fill"></i>
                <span>Login</span>
            </a>
        </div>
    </div>
</nav>

<!-- HERO FULL SCREEN BANNER -->
<section class="hero-wrapper text-center">
    <div class="container-full position-relative" style="z-index: 2;">
        <div class="d-inline-flex align-items-center gap-2 px-4 py-2 rounded-pill mb-4" style="background: rgba(255, 255, 255, 0.8); border: 1px solid #c7d2fe; backdrop-filter: blur(10px);">
            <i class="bi bi-stars text-indigo-brand"></i>
            <span class="fw-semibold text-uppercase text-indigo-brand" style="letter-spacing: 2px; font-size: 0.75rem;">Authentic Coffee Experience</span>
        </div>
        
        <h1 class="hero-title mb-4">
            Cita Rasa Kopi <br>
            <span class="text-gradient">Otentik & Mewah</span>
        </h1>
        
        <p class="text-muted fs-5 mx-auto mb-5" style="max-width: 650px; font-weight: 400; line-height: 1.6;">
            Disajikan dari biji kopi sangrai pilihan terbaik untuk memberikan kesegaran dan kehangatan sempurna di setiap tegukan Anda.
        </p>

        <a href="#menu-section" class="btn btn-glow px-5 py-3 rounded-pill fw-bold fs-6 d-inline-flex align-items-center gap-2">
            <span>Jelajahi Menu</span>
            <i class="bi bi-arrow-down-short fs-4"></i>
        </a>
    </div>
</section>

<!-- MAIN CONTENT SECTION (FULL SCREEN / FULL WIDTH) -->
<div class="py-5" id="menu-section">
    <div class="container-full py-4">

        <!-- HEADER DAFTAR MENU -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
            <div>
                <span class="text-uppercase fw-bold small" style="color: #4f46e5; letter-spacing: 2px;">Pilihan Spesial</span>
                <h2 class="fw-bolder fs-1 mb-1" style="color: #1e1b4b; letter-spacing: -1px;">Daftar Menu Kami</h2>
            </div>
            <p class="text-muted mb-0 mt-2 mt-md-0" style="max-width: 400px;">Nikmati aneka hidangan minuman dan makanan segar yang diracik khusus untuk Anda.</p>
        </div>

        <!-- GRID MENU (RESPONSIF FULL WIDTH) -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 mb-5">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card card-menu h-100">
                        <!-- Foto Produk -->
                        <div class="img-container">
                            @if($product->foto)
                                <img src="{{ asset('storage/' . $product->foto) }}" class="card-menu-img" alt="{{ $product->nama }}">
                            @else
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="bi bi-cup-hot display-4 mb-2 opacity-50"></i>
                                    <span class="small">No Image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Content Produk (Nama & Harga Only) -->
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <h5 class="fw-bold mb-4" style="color: #1e1b4b; font-size: 1.15rem; line-height: 1.4; min-height: 2.8rem;">
                                {{ $product->nama }}
                            </h5>

                            <div class="pt-3 border-top d-flex align-items-center justify-content-between" style="border-color: #e0e7ff !important;">
                                <span class="text-muted small fw-medium">Harga</span>
                                <span class="badge-price">
                                    Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="d-inline-flex p-4 rounded-circle mb-3" style="background: #eef2ff; border: 1px solid #c7d2fe;">
                        <i class="bi bi-cup-hot text-indigo-brand display-4"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1e1b4b;">Menu Belum Tersedia</h5>
                    <p class="text-muted small mb-0">Saat ini belum ada daftar menu yang ditambahkan.</p>
                </div>
            @endforelse
        </div>

        <!-- SECTION TENTANG KAMI (SPLIT BANNER LUXURY STYLE) -->
<div class="my-5 py-5 px-4 px-md-5 rounded-4 position-relative overflow-hidden" style="background-color: #ffffff; border: 1px solid #e0e7ff; box-shadow: 0 4px 20px rgba(79, 70, 229, 0.05);">
    <div class="row align-items-center g-5">
        
        <!-- KOLOM KIRI: TEKS TENTANG KAMI -->
        <div class="col-lg-6">
            <span class="text-uppercase fw-bold small d-block mb-2" style="color: #4f46e5; letter-spacing: 2px;">Tentang Kami</span>
            
            <h2 class="fw-bold mb-4" style="color: #1e1b4b; font-size: clamp(1.6rem, 2.5vw, 2.2rem); letter-spacing: -0.5px; line-height: 1.3;">
                TIDAK ADA YANG LEBIH MENYENANGKAN DARIPADA MENIKMATI SECANGKIR KOPI HANGAT & HIDANGAN SPESIAL UNTUK HARI ANDA.
            </h2>

            <!-- Aksen Garis Indigo -->
            <div class="mb-4" style="width: 60px; height: 3px; background: linear-gradient(90deg, #4f46e5, #818cf8); border-radius: 2px;"></div>

            <p class="text-uppercase mb-0" style="color: #4b5563; font-size: 0.9rem; letter-spacing: 1px; line-height: 1.8; font-weight: 500;">
                APAKAH ANDA SEDANG MENCARI CARA UNTUK MEMANJAKAN DIRI? <strong style="color: #1e1b4b;">ISK COFFEE</strong> MENYEDIAKAN BERBAGAI PILIHAN FAVORIT UNTUK MENEMANI SEPATUTNYA MOMEN BERHARGA ANDA.
            </p>
        </div>

        <!-- KOLOM KANAN: GAMBAR BERBINGKAI -->
        <div class="col-lg-6">
            <div class="position-relative p-3 p-md-4">
                <!-- Bingkai Garis Aksen Indigo (Outline Border) -->
                <div class="position-absolute" style="top: 0; right: 0; bottom: 15px; left: 25px; border: 2px solid #c7d2fe; border-radius: 16px; z-index: 1;"></div>
                
                <!-- Gambar Utama -->
                <div class="position-relative" style="z-index: 2;">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1000&auto=format&fit=crop" 
                         alt="ISK Coffee Experience" 
                         class="img-fluid rounded-4 shadow-lg" 
                         style="width: 100%; max-height: 360px; object-fit: cover;">
                </div>
            </div>
        </div>

    </div>
</div>

    </div>
</div>

<!-- FOOTER -->
<footer class="py-4 text-center border-top" style="background: #ffffff; border-color: #e0e7ff !important;">
    <p class="text-muted small mb-0">© 2026 POS ISK Coffee. All rights reserved.</p>
</footer>

@endsection
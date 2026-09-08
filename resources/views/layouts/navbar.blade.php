<nav class="navbar navbar-expand-lg border-bottom sticky-top py-2" style="background-color: #f0f3ff; border-color: #c7d2fe !important;">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold me-4" href="{{ route('dashboard') }}" style="color: #1e1b4b;">
            <div class="p-2 rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="background-color: #c7d2fe; ">
                <i class="bi bi-cup-hot fs-6"></i>
            </div>
            <span>ISK Coffee</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-1.5 {{ Request::is('dashboard') ? 'active-soft fw-semibold' : 'text-slate-custom' }}" 
                       aria-current="page" href="{{ route('dashboard') }}">
                       <i class="bi bi-grid-1x2"></i> Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-1.5 {{ Request::is('admin/users*') ? 'active-soft fw-semibold' : 'text-slate-custom' }}" 
                       href="{{ route('admin.users') }}">
                       <i class="bi bi-people"></i> Pengguna
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-2 {{ Request::is('produk*') ? 'active-soft fw-semibold' : 'text-slate-custom' }}" 
                        href="{{ route('produk.index') }}">
                        <i class="bi bi-cup-hot fs-6"></i>Menu
                    </a>
                </li>
                                
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-1.5 {{ Request::is('penjualan*') ? 'active-soft fw-semibold' : 'text-slate-custom' }}" 
                       href="{{ route('penjualan.index') }}">
                       <i class="bi bi-receipt"></i> Transaksi/penjualan
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-1.5 {{ Request::is('tentang') ? 'active-soft fw-semibold' : 'text-slate-custom' }}" 
                       href="{{ route('tentang.index') }}">
                       <i class="bi bi-info-circle"></i> Tentang
                    </a>
                </li> 
            </ul>

            <div class="d-flex align-items-center gap-2 pt-2 pt-lg-0">
                
                @if(Auth::check())
                    <div class="d-flex align-items-center small px-3 py-1.5 rounded-pill border bg-white shadow-sm" style="border-color: #c7d2fe !important; color: #1e1b4b;">
                        <i class="bi bi-person-circle fs-5 me-2" style="color: #4f46e5;"></i>
                        <span class="fw-semibold">{{ Auth::user()->name }}</span>
                    </div>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-logout-soft px-3 py-1.5 rounded-pill small fw-semibold d-flex align-items-center gap-1 shadow-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>

<style>
    .text-slate-custom { 
        color: #475569 !important; 
        transition: all 0.2s ease;
    }

    .text-slate-custom:hover { 
        color: #4f46e5 !important; 
        background-color: rgba(199, 210, 254, 0.4); 
    }

    .active-soft { 
        background-color: #c7d2fe !important; 
        color: #4f46e5 !important; 
    }

    .btn-logout-soft {
        background-color: #fee2e2;
        color: #dc2626;
        border: 1px solid #fca5a5;
        transition: all 0.2s ease;
    }

    .btn-logout-soft:hover {
        background-color: #ef4444;
        color: #ffffff;
    }
</style>
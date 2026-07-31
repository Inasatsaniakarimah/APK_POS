<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-2" style="background-color: #0f172a;">
    <div class="container-fluid px-4">
        
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-white me-4" href="#">
            <div class="d-flex align-items-center justify-content-center rounded-3 p-1.5" style="background-color: #4f46e5;">
                <i class="bi bi-shop fs-5 text-white"></i>
            </div>
            <span>Aplikasi POS</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ Request::is('dashboard') ? 'active fw-semibold bg-slate-800 text-white' : 'text-slate-300' }}" 
                       aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ Request::is('admin/users') ? 'active fw-semibold bg-slate-800 text-white' : 'text-slate-300' }}" 
                       href="{{ route('admin.users') }}">User</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ Request::is('produk') ? 'active fw-semibold bg-slate-800 text-white' : 'text-slate-300' }}" 
                       href="{{ route('produk.index') }}">Produk</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link px-3 py-2 rounded-3 {{ Request::is('penjualan') ? 'active fw-semibold bg-slate-800 text-white' : 'text-slate-300' }}" 
                       href="{{ route('penjualan.index') }}">Penjualan</a>
                </li> 
            </ul>

            <div class="d-flex align-items-center gap-3 pt-2 pt-lg-0">
                
                @if(Auth::check())
                    <div class="d-flex align-items-center text-white small px-3 py-1.5 rounded-3 border" style="background-color: #1e293b; border-color: #334155 !important;">
                        <i class="bi bi-person-circle fs-5 me-2" style="color: #818cf8;"></i>
                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                    </div>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm px-3 py-2 rounded-3 fw-semibold">
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>

<style>
    .bg-slate-800 { background-color: #1e293b !important; }
    .text-slate-300 { color: #cbd5e1 !important; }
    .nav-link:hover { color: #524848 !important; background-color: rgba(255, 255, 255, 0.05); }
</style>
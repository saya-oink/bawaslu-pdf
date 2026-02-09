<nav class="navbar navbar-expand-lg navbar-glass fixed-top">
    <div class="container">
        
        {{-- Logo Bawaslu (Pojok Kanan Atas) --}}
        <div class="ms-auto">
            <a href="{{ route('user.dashboard') }}">
                <img src="{{ asset('images/logo-bawaslu.png') }}" alt="Bawaslu Logo" class="navbar-logo">
            </a>
        </div>
        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">
            <span class="brand-gradient">Bawaslu</span>
            <span class="brand-sub">Sumenep</span>
        </a>

        {{-- Toggler --}}
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#userMenu">
            <i class="fa-solid fa-bars text-primary fs-4"></i>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="userMenu">
            <ul class="navbar-nav ms-auto align-items-center gap-lg-3">

                {{-- PDF Locker --}}
                <li class="nav-item">
                    <a href="{{ route('user.pdf.locker') }}"
                       class="nav-link premium-link {{ Route::is('user.pdf.locker*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-shield me-1"></i> PDF Locker
                    </a>
                </li>

                {{-- Profil --}}
                <li class="nav-item">
                    <a href="{{ route('user.profile.index') }}"
                       class="nav-link premium-link {{ Route::is('user.profile.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-building-columns me-1"></i> Profil
                    </a>
                </li>

                {{-- Dokumen Arsip --}}
                <li class="nav-item">
                    <a href="{{ route('user.archives.index') }}"
                       class="nav-link premium-link {{ Route::is('user.archives.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-folder-open me-1"></i> Dokumen Arsip
                    </a>
                </li>

                {{-- Divider --}}
                <li class="d-none d-lg-block">
                    <div class="nav-divider"></div>
                </li>

                {{-- User Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle premium-user"
                       href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="avatar-img">
                        @else
                            <div class="avatar-fallback">
                                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                            </div>
                        @endif
                        <span class="fw-semibold d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-glass">
                        <li class="px-3 py-2 small text-muted">
                            Masuk sebagai
                            <div class="fw-semibold text-dark">{{ auth()->user()->email ?? auth()->user()->name }}</div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger fw-semibold">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        
    </div>
</nav>

{{-- CSS tambahan --}}
<style>
/* NAVBAR GLASS */
.navbar-glass {
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    z-index: 1030;
}

/* BRAND */
/* BRAND */
.brand-gradient {
    background: linear-gradient(90deg, #ED1C24, #b31217);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 1.3rem;
}

.brand-sub {
    color: #7a1c1f;
    font-weight: 600;
    margin-left: 4px;
}

/* LINKS */
.premium-link {
    position: relative;
    font-weight: 500;
    color: #5a1a1d;
    padding-bottom: 6px;
}

.premium-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #ED1C24, #b31217);
    transition: width .3s ease;
}

.premium-link:hover::after,
.premium-link.active::after {
    width: 100%;
}

.premium-link.active {
    color: #ED1C24;
    font-weight: 600;
}

/* AVATAR */
.avatar-img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ED1C24;
}

.avatar-fallback {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ED1C24, #b31217);
    color: #FFF1C1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}


/* DROPDOWN */
.dropdown-glass {
    border: 0;
    border-radius: 14px;
    backdrop-filter: blur(14px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

/* LOGO */
.navbar-logo {
    height: 40px; /* Sesuaikan dengan ukuran logo */
    width: auto;
    margin-left: 20px;
    margin-top: 5px;
}

/* FIX CONTENT OFFSET (karena fixed-top) */
body {
    padding-top: 80px;
}

.text-primary,
.text-info{
    color : #FFF1C1 !important;
}

</style>

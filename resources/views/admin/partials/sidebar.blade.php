<aside id="sidebar" class="sidebar vh-100 position-fixed">
    <div id="sidebarToggle" class="sidebar-header d-flex align-items-center gap-3">
        <img src="{{ asset('images/logo-bawaslu-putih.png') }}" alt="Bawaslu Logo" class="sidebar-logo-img">
        <span class="sidebar-text">Admin Panel</span>
    </div>

    <ul class="nav flex-column sidebar-menu">
        <li class="nav-item">
            <a href="{{ route('admin.admin.dashboard') }}"
               class="nav-link {{ Route::is('admin.admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.pdf.locker') }}"
               class="nav-link {{ Route::is('admin.pdf.locker') ? 'active' : '' }}">
                <i class="fa-solid fa-file-shield"></i>
                <span class="sidebar-text">PDF Locker</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
               class="nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i>
                <span class="sidebar-text">Manajemen User</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.archives.index') }}"
               class="nav-link {{ Route::is('admin.archives.index') ? 'active' : '' }}">
                <i class="fa-solid fa-file-lines"></i>
                <span class="sidebar-text">Manajemen Arsip</span>
            </a>
        </li>

        <li class="nav-item mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-logout w-100">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="sidebar-text">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</aside>

<style>
:root {
    /* Warna merah elegan & bold */
    --primary-red: #C1272D;    /* Merah classic premium */
    --secondary-red: #8B1A20;  /* Merah gelap elegan */
    --text-gold: #FFF1C1;
    --neon-red: #ED1C24;        /* Untuk efek hover/glow */
}

/* Sidebar base */
.sidebar {
    width: 260px;
    display: flex;
    flex-direction: column;
    background: linear-gradient(180deg, var(--primary-red), var(--secondary-red));
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    box-shadow: inset 0 0 30px rgba(0,0,0,0.5), 6px 0 40px rgba(0,0,0,0.5);
    border-right: 1px solid rgba(255,255,255,0.08);
    color: var(--text-gold);
    transition: all 0.3s ease;
    overflow: hidden;
    font-family: 'Inter', sans-serif;
}

/* Sidebar header */
.sidebar-header {
    padding: 1.5rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    cursor: pointer;
}

.sidebar-logo-img {
    width: 50px;
    height: 50px;
    object-fit: contain;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    filter: drop-shadow(0 0 5px var(--neon-red));
}
.sidebar-logo-img:hover {
    transform: scale(1.1);
    box-shadow: 0 0 15px var(--neon-red);
}

.sidebar-text {
    color: var(--text-gold);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: color 0.3s ease;
}

/* Menu */
.sidebar-menu {
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex: 1;
}

.sidebar .nav-link {
    color: var(--text-gold);
    border-radius: 16px;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    gap: 16px;
    font-weight: 400;
    font-size: 0.80rem;
    position: relative;
    transition: all 0.3s ease;
}

/* Icon */
.sidebar .nav-link i {
    color: var(--text-gold);
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

/* Hover effect */
.sidebar .nav-link:hover {
    background: rgba(255,255,255,0.08);
    color: var(--text-gold);
    transform: translateX(4px);
    box-shadow: 0 0 12px var(--neon-red);
}
.sidebar .nav-link:hover i {
    color: var(--neon-red);
    transform: scale(1.15);
}

/* Active menu */
.sidebar .nav-link.active {
    background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
    color: var(--text-gold);
    box-shadow: inset 0 0 15px rgba(255,255,255,0.2), 0 0 25px var(--neon-red);
    animation: glow 2s ease-in-out infinite alternate;
}

.sidebar .nav-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: linear-gradient(180deg, var(--text-gold), var(--neon-red));
    border-radius: 2px;
}

/* Glow animation for active menu */
@keyframes glow {
    0% { box-shadow: inset 0 0 15px rgba(255,255,255,0.2), 0 0 20px var(--neon-red);}
    50% { box-shadow: inset 0 0 20px rgba(255,255,255,0.3), 0 0 28px var(--neon-red);}
    100% { box-shadow: inset 0 0 15px rgba(255,255,255,0.2), 0 0 20px var(--neon-red);}
}

/* Logout button */
.btn-logout {
    background: rgba(255,255,255,0.05);
    color: var(--text-gold);
    border-radius: 16px;
    padding: 14px;
    border: none;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}
.btn-logout:hover {
    background: rgba(255,255,255,0.12);
    color: var(--text-gold);
    box-shadow: 0 0 12px var(--neon-red);
}
</style>

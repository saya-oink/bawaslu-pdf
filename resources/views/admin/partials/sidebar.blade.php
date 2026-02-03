<aside id="sidebar" class="sidebar vh-100 position-fixed">
    <div id="sidebarToggle" class="sidebar-header d-flex align-items-center gap-2">
        <i class="fa-solid fa-shield-halved sidebar-logo"></i>
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
    .sidebar {
    width: 260px;
    background: linear-gradient(
        180deg,
        #0f2027,
        #203a43,
        #2c5364
    );
    color: #e5e7eb;
    box-shadow: 6px 0 30px rgba(0,0,0,.5);
    transition: all .3s ease;
    z-index: 1000;
}

.sidebar-header {
    padding: 1.4rem 1.5rem;
    border-bottom: 1px solid rgba(255,255,255,.08);
    font-weight: 600;
    cursor: pointer;
}

.sidebar-logo {
    color: #38bdf8;
    font-size: 1.4rem;
}

/* MENU */
.sidebar-menu {
    padding: 1rem;
    height: calc(100% - 76px);
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.sidebar .nav-link {
    color: rgba(255,255,255,.75);
    border-radius: 14px;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 14px;
    transition: all .25s ease;
}

.sidebar .nav-link:hover {
    background: rgba(255,255,255,.08);
    color: #fff;
    transform: translateX(4px);
}

.sidebar .nav-link.active {
    background: linear-gradient(135deg, #38bdf8, #0ea5e9);
    color: #fff;
    box-shadow: 0 10px 28px rgba(56,189,248,.45);
}

/* LOGOUT */
.btn-logout {
    background: rgba(255,255,255,.08);
    color: #93c5fd;
    border-radius: 14px;
    padding: 12px;
    border: none;
}

</style>
<header class="admin-header d-flex justify-content-between align-items-center px-4 py-3">
    <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-shield-halved header-icon"></i>
        <h5 class="mb-0 fw-bold header-title">
            Bawaslu File Security
        </h5>
    </div>

    {{-- USER DROPDOWN --}}
    <div class="dropdown">
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle user-toggle"
           href="#"
           data-bs-toggle="dropdown">

            @if(auth()->user()->avatar)
                <img src="{{ asset('storage/'.auth()->user()->avatar) }}"
                     class="rounded-circle me-2 user-avatar"
                     width="40" height="40">
            @else
                <div class="rounded-circle user-avatar-fallback me-2 fw-bold">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>
            @endif

            <span class="fw-semibold header-user-name">
                {{ auth()->user()->name }}
            </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 mt-2">
            <li>
                <a class="dropdown-item d-flex align-items-center gap-2"
                   href="{{ route('admin.users.edit', auth()->id()) }}">
                    <i class="fa-solid fa-user text-info"></i> Profil
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item text-danger d-flex align-items-center gap-2">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</header>
<style>
    .admin-header {
    position: sticky;
    top: 0;
    z-index: 999;

    background: linear-gradient(
        135deg,
        rgba(15,32,39,.9),
        rgba(32,58,67,.9),
        rgba(44,83,100,.9)
    );

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    box-shadow:
        0 10px 40px rgba(0,0,0,.4),
        inset 0 -1px 0 rgba(255,255,255,.08);
}

/* ICON & TITLE */
.header-icon {
    color: #38bdf8;
    font-size: 1.25rem;
}

.header-title {
    color: #fff;
}

.header-user-name {
    color: #e5e7eb;
}

/* AVATAR */
.user-avatar {
    border: 2px solid rgba(56,189,248,.5);
}

.user-avatar-fallback {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg,#38bdf8,#0ea5e9);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

</style>
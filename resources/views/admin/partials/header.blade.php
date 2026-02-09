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
                    <i class="fa-solid fa-user text-maroon"></i> Profil
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
        rgba(237,28,36,.9),
        rgba(122,28,31,.9)
    );

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    box-shadow:
        0 10px 40px rgba(0,0,0,.3),
        inset 0 -1px 0 rgba(255,255,255,.08);
}

/* ICON & TITLE */
.header-icon {
    color: #ED1C24;
    font-size: 1.25rem;
}

.header-title {
    color: #FFF1C1;
}

.header-user-name {
    color: #FFF1C1;
}

/* AVATAR */
.user-avatar {
    border: 2px solid rgba(237,28,36,.5);
}

.user-avatar-fallback {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg,#ED1C24,#7A1C1F);
    color: #FFF1C1;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

/* DROPDOWN ICON */
.text-maroon {
    color: #7A1C1F !important;
}

.fa-solid {
    color: #fff2c5;
}
</style>

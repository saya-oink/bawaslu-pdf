<x-guest-layout>
<div class="min-vh-100 d-flex align-items-center justify-content-center login-bg">

    <div class="card shadow-lg border-0 login-card">
        <div class="card-body p-4">

            {{-- HEADER --}}
            <div class="text-center mb-4">
                <img src="{{ asset('logo-bawaslu.png') }}"
                     alt="BAWASLU"
                     style="height: 70px"
                     class="mb-2 login-logo">

                <h5 class="fw-bold text-uppercase text-gold mb-1">
                    Registrasi Akun
                </h5>
                <small class="text-gold-50">
                    Sistem Arsip Digital - Bawaslu
                </small>
            </div>

            {{-- FORM --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label text-gold-50">Name</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                           class="form-control login-input">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-danger" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label text-gold-50">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                           class="form-control login-input">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label text-gold-50">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="form-control login-input">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-gold-50">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="form-control login-input">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-danger" />
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="text-gold-50 small text-decoration-none" href="{{ route('login') }}">
                        Already registered?
                    </a>
                    <button type="submit" class="btn login-btn">
                        Register
                    </button>
                </div>
            </form>

        </div>

        {{-- FOOTER --}}
        <div class="card-footer text-center bg-transparent border-0">
            <small class="text-gold-50">
                © {{ date('Y') }} BAWASLU Republik Indonesia
            </small>
        </div>
    </div>

</div>

<style>
:root {
    --primary-red: rgba(237,28,36,0.85);
    --secondary-red: rgba(122,28,31,0.85);
    --text-gold: #FFF1C1;
    --text-gold-50: rgba(255,241,193,0.7);
    --neon-red: rgba(237,28,36,0.9);
}

/* BACKGROUND */
.login-bg {
    background:
        linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.85)),
        linear-gradient(135deg, var(--primary-red), var(--secondary-red)),
        url('{{ asset("images/bawaslu.jpg") }}') no-repeat center center;
    background-size: cover;
    background-blend-mode: overlay;
}

/* CARD */
.login-card {
    width: 420px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius: 18px;
    box-shadow:
        0 20px 40px rgba(0,0,0,0.35),
        inset 0 1px 0 rgba(255,255,255,0.1);
}

/* LOGO */
.login-logo {
    filter: drop-shadow(0 4px 12px rgba(0,0,0,0.5));
}

/* TEXT */
.text-gold { color: var(--text-gold); }
.text-gold-50 { color: var(--text-gold-50); }

/* INPUT */
.login-input {
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.25);
    color: #fff;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.login-input:focus {
    background: rgba(255,255,255,0.2);
    border-color: var(--neon-red);
    color: #fff;
    box-shadow: 0 0 10px var(--neon-red);
}

/* BUTTON */
.login-btn {
    background: var(--neon-red);
    color: var(--text-gold);
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 0.5rem 1.2rem;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 15px var(--neon-red), 0 10px 25px rgba(0,0,0,0.3);
}

/* LINKS */
a.text-gold-50:hover {
    color: var(--text-gold);
    text-decoration: underline;
}
</style>
</x-guest-layout>

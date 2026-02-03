<x-guest-layout>
<div class="min-vh-100 d-flex align-items-center justify-content-center login-bg">


    <div class="card shadow-lg border-0" style="width: 420px;">
        <div class="card-body p-4">

            {{-- HEADER --}}
            <div class="text-center mb-4">
                <img src="{{ asset('logo-bawaslu.png') }}"
                     alt="BAWASLU"
                     style="height: 70px"
                     class="mb-2">

                <h5 class="fw-bold text-uppercase mb-1">
                    Sistem Arsip Digital
                </h5>
                <small class="text-muted">
                    Badan Pengawas Pemilu
                </small>
            </div>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger small">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="email@bawaslu.go.id"
                           required
                           autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label d-flex justify-content-between">
                        <span>Password</span>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="small">
                                Lupa?
                            </a>
                        @endif
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox"
                           name="remember"
                           class="form-check-input"
                           id="remember">
                    <label for="remember" class="form-check-label">
                        Ingat saya
                    </label>
                </div>

                <button type="submit"
                        class="btn btn-primary w-100">
                    🔐 Masuk
                </button>
            </form>

        </div>

        {{-- FOOTER --}}
        <div class="card-footer text-center bg-white border-0">
            <small class="text-muted">
                © {{ date('Y') }} BAWASLU Republik Indonesia
            </small>
        </div>
    </div>

</div>

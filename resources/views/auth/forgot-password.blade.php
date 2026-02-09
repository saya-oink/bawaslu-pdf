<x-guest-layout>
    <div class="login-container">

        {{-- HEADER --}}
        <div class="login-header">
            <img src="{{ asset('images/logo-bawaslu.png') }}" alt="BAWASLU Logo">
            <h2>Reset Password</h2>
            <p>Masukkan email Anda untuk menerima tautan reset password</p>
        </div>

        {{-- CARD --}}
        <div class="login-card">

            {{-- SESSION STATUS --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- FORM --}}
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label text-white-75">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control login-input"
                           :value="old('email')"
                           required
                           autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        🔐 Kirim Tautan Reset Password
                    </button>
                </div>
            </form>

        </div>

        {{-- FOOTER --}}
        <div class="text-center mt-4 text-white-50" style="font-size: 0.875rem;">
            © {{ date('Y') }} BAWASLU Republik Indonesia
        </div>
    </div>

    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background:
                linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.8)),
                linear-gradient(135deg, #ED1C24, #7A1C1F);
            background-size: cover;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(18px);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.15);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.35);
        }

        .login-header img {
            height: 70px;
            margin-bottom: 0.5rem;
            filter: drop-shadow(0 0 10px rgba(237,28,36,0.8));
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .login-header img:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(237,28,36,0.8);
        }

        .login-header h2 {
            font-weight: 700;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            color: #FFF1C1;
        }

        .login-header p {
            color: rgba(255,255,255,0.75);
        }

        .login-input {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.35);
            color: #FFF1C1;
            border-radius: 10px;
        }

        .login-input:focus {
            background: rgba(255,255,255,0.25);
            border-color: #fff;
            color: #FFF1C1;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #ED1C24;
            border: none;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            color: #FFF1C1;
        }

        .btn-primary:hover {
            background-color: #B71C1C;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .text-white-75 { color: rgba(255,255,255,.75); }
        .text-white-50 { color: rgba(255,255,255,.5); }
    </style>
</x-guest-layout>

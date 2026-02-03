<footer class="footer-glass mt-5">
    <div class="container py-5">
        <div class="row g-4">

            {{-- Tentang --}}
            <div class="col-md-4">
                <h5 class="fw-bold">Bawaslu Sumenep</h5>
                <p class="small text-muted">
                    Badan Pengawas Pemilihan Umum Kabupaten Sumenep
                </p>
            </div>

            {{-- Menu --}}
            <div class="col-md-2">
                <h6 class="fw-bold">Menu</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('user.dashboard') }}">Beranda</a></li>
                    <li><a href="{{ route('user.profile.index') }}">Profil</a></li>
                    <li><a href="{{ route('user.pdf.locker') }}">Dokumen</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-md-3">
                <h6 class="fw-bold">Kontak</h6>
                <p class="small text-muted mb-0">
                    Email: info@bawaslu.go.id<br>
                    Telp: (0328) xxxx
                </p>
            </div>

            {{-- Media Sosial --}}
            <div class="col-md-3">
                <h6 class="fw-bold">Media Sosial</h6>
                <div class="d-flex gap-3 mt-2">
                    <a href="#" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>

        </div>

        <hr class="my-4 border-light opacity-25">

        <div class="text-center small text-muted">
            © {{ date('Y') }} Bawaslu Kabupaten Sumenep
        </div>
    </div>

    {{-- CSS Footer Premium --}}
    <style>
    .footer-glass {
        background: rgba(0,0,0,0.6); /* glass effect */
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px 20px 0 0;
        box-shadow: 0 -5px 25px rgba(0,0,0,0.3);
        color: #fff;
    }

    .footer-glass a {
        color: #ffffffcc;
        text-decoration: none;
        transition: color 0.3s, transform 0.3s;
    }

    .footer-glass a:hover {
        color: #38bdf8; /* biru premium */
        transform: translateY(-2px);
    }

    .footer-glass i {
        color: #ffffffcc;
        transition: color 0.3s, transform 0.3s;
    }

    .footer-glass i:hover {
        color: #38bdf8;
        transform: translateY(-3px);
    }

    .footer-glass hr {
        border-color: rgba(255,255,255,0.15);
    }

    .footer-glass h5, .footer-glass h6 {
        color: #fff;
    }

    .footer-glass p, .footer-glass ul li {
        color: rgba(255,255,255,0.75);
    }

    @media (max-width: 768px) {
        .footer-glass .row {
            text-align: center;
        }
        .footer-glass .d-flex {
            justify-content: center;
        }
    }
    </style>
</footer>

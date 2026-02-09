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
    background: #FFF1C1; /* CREAM */
    border-radius: 20px 20px 0 0;
    box-shadow: 0 -5px 25px rgba(0,0,0,0.12);
    color: #7a1c1f;
}

/* LINK */
.footer-glass a {
    color: #7a1c1f;
    text-decoration: none;
    transition: color .3s, transform .3s;
}

.footer-glass a:hover {
    color: #ED1C24;
    transform: translateY(-2px);
}

/* ICON SOSMED */
.footer-glass i {
    color: #7a1c1f;
    transition: color .3s, transform .3s;
}

.footer-glass i:hover {
    color: #ED1C24;
    transform: translateY(-3px);
}

/* HR */
.footer-glass hr {
    border-color: rgba(122,28,31,.25);
}

/* TITLE */
.footer-glass h5,
.footer-glass h6 {
    color: #7a1c1f;
}

/* TEXT */
.footer-glass p,
.footer-glass ul li,
.footer-glass .text-muted {
    color: rgba(122,28,31,.8) !important;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .footer-glass .row {
        text-align: center;
    }
    .footer-glass .d-flex {
        justify-content: center;
    }
}

.footer-glass {
    border-top: 4px solid #ED1C24;
}

.footer-glass {
    background: rgba(255,241,193,0.95);
}
</style>

</footer>

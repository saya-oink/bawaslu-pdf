@extends('layouts.app')

@section('title', 'Profil Bawaslu Kabupaten Sumenep')

@section('content')

<style>
/* PAGE WRAPPER */
.profil-wrapper {
    min-height: calc(100vh - 120px);
    background: linear-gradient(135deg, #ED1C24, #b31217, #6a0f12);
    padding-top: 80px;
    padding-bottom: 80px;
    color: #FFF1C1;
}

/* GLASS CARD */
.glass-card {
    background: rgba(255,241,193,.10);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-radius: 22px;
    box-shadow: 0 25px 60px rgba(0,0,0,.35);
    padding: 2rem;
    transition: transform .3s, box-shadow .3s;
}

.glass-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 35px 80px rgba(0,0,0,.45);
}

/* SECTION HEADER */
.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-header i {
    font-size: 3rem;
    color: #FFF1C1;
    margin-bottom: 1rem;
}

/* SMALL ICON BOXES */
.icon-box {
    text-align: center;
    padding: 2rem 1rem;
    background: rgba(255,241,193,.08);
    border-radius: 16px;
    transition: transform .3s, box-shadow .3s;
}

.icon-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0,0,0,.35);
}

.icon-box i {
    font-size: 2rem;
    color: #FFF1C1;
    margin-bottom: .5rem;
}

/* VISI & MISI CARDS */
.card-glass {
    background: rgba(255,241,193,.10);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0,0,0,.35);
    padding: 1.5rem;
    transition: transform .3s, box-shadow .3s;
}

.card-glass:hover {
    transform: translateY(-3px);
    box-shadow: 0 25px 60px rgba(0,0,0,.45);
}

.card-glass h5 i {
    color: #FFF1C1;
}

/* TEXT */
.text-muted {
    color: rgba(255,241,193,.75) !important;
}

hr {
    border-color: rgba(255,241,193,.25);
}
</style>


<div class="profil-wrapper">

    {{-- HERO --}}
    <section class="section-header">
        <i class="fa-solid fa-building-columns"></i>
        <h1 class="fw-bold">Bawaslu Kabupaten Sumenep</h1>
        <p class="text-muted mt-2">Badan Pengawas Pemilihan Umum</p>
    </section>

    {{-- PROFIL --}}
    <section class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="glass-card">

                    <h4 class="fw-bold mb-3">Tentang Bawaslu Kabupaten Sumenep</h4>

                    <p class="lh-lg">
                        <strong>Badan Pengawas Pemilihan Umum Kabupaten Sumenep</strong>
                        merupakan lembaga pengawas penyelenggaraan pemilihan umum
                        yang bertugas memastikan seluruh tahapan pemilu berjalan
                        secara jujur, adil, transparan, dan sesuai dengan
                        peraturan perundang-undangan yang berlaku.
                    </p>

                    <p class="lh-lg">
                        Dalam melaksanakan tugasnya, Bawaslu Kabupaten Sumenep
                        berperan aktif dalam melakukan pencegahan, pengawasan,
                        serta penindakan terhadap pelanggaran pemilu guna
                        menjaga integritas demokrasi di Kabupaten Sumenep.
                    </p>

                    <hr class="my-4">

                    <div class="row g-4">

                        <div class="col-md-4">
                            <div class="icon-box">
                                <i class="fa-solid fa-eye"></i>
                                <h6 class="fw-bold mt-2">Pengawasan</h6>
                                <p class="text-muted small">Mengawasi seluruh tahapan pemilu</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="icon-box">
                                <i class="fa-solid fa-scale-balanced"></i>
                                <h6 class="fw-bold mt-2">Penegakan</h6>
                                <p class="text-muted small">Menindak pelanggaran pemilu</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="icon-box">
                                <i class="fa-solid fa-handshake"></i>
                                <h6 class="fw-bold mt-2">Integritas</h6>
                                <p class="text-muted small">Menjaga kepercayaan publik</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- VISI MISI --}}
    <section class="container mb-5">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="card-glass h-100">
                    <h5 class="fw-bold mb-3">
                        <i class="fa-solid fa-bullseye me-2"></i>
                        Visi
                    </h5>
                    <p class="text-muted">
                        Terwujudnya pengawasan pemilu yang demokratis,
                        berintegritas, dan dipercaya masyarakat.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-glass h-100">
                    <h5 class="fw-bold mb-3">
                        <i class="fa-solid fa-list-check me-2"></i>
                        Misi
                    </h5>
                    <ul class="text-muted">
                        <li>Meningkatkan kualitas pengawasan pemilu</li>
                        <li>Mencegah dan menindak pelanggaran pemilu</li>
                        <li>Memperkuat partisipasi masyarakat</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection

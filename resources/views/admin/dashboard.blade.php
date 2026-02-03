@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <div class="flex-grow-1" style="margin-left:260px;">
        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold mb-1 text-info">
                    <i class="fa-solid fa-gauge-high me-1"></i> Dashboard
                </h4>
                <p class="text-muted mb-0">
                    Ringkasan aktivitas sistem hari ini
                </p>
            </div>

            {{-- STAT CARDS --}}
            <div class="row g-4 mb-4">
                @foreach([
                    ['title'=>'Total User','icon'=>'users','count'=>$totalUsers ?? 0],
                    ['title'=>'Dokumen PDF','icon'=>'file-pdf','count'=>$totalDocuments ?? 0],
                    ['title'=>'Dokumen Hari Ini','icon'=>'calendar-day','count'=>$todayDocuments ?? 0],
                ] as $card)

                <div class="col-md-4">
                    <div class="card border-0 shadow-lg rounded-4 h-100 stat-card">
                        <div class="card-body d-flex align-items-center">

                            {{-- ICON --}}
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-{{ $card['icon'] }}"></i>
                            </div>

                            {{-- TEXT --}}
                            <div class="ms-3">
                                <div class="text-muted small">{{ $card['title'] }}</div>
                                <h3 class="fw-bold mb-0 text-dark">{{ $card['count'] }}</h3>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            {{-- CHART --}}
<div class="card border-0 shadow-lg rounded-4 glass-card mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3 text-info">
            <i class="fa-solid fa-chart-line me-1"></i>
            Dokumen Dikunci (7 Hari Terakhir)
        </h5>

        <canvas id="documentChart" height="100"></canvas>
    </div>
</div>


            {{-- QUICK ACTION --}}
            <div class="card border-0 shadow-lg rounded-4 mb-4 glass-card">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 text-info">
                        <i class="fa-solid fa-bolt me-1"></i> Aksi Cepat
                    </h5>

                    <a href="{{ route('admin.pdf.locker') }}"
                       class="btn btn-info me-2">
                        <i class="fa-solid fa-file-shield me-1"></i> PDF Locker
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-outline-info me-2">
                        <i class="fa-solid fa-users me-1"></i> Manajemen User
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('documentChart').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartLabels),
        datasets: [{
    label: 'Jumlah Dokumen',
    data: @json($chartData),
    borderColor: '#203a43',          // garis dove navy
    backgroundColor: 'rgba(32,58,67,0.2)', // fill transparan
    borderWidth: 3,
    tension: 0.4,
    fill: true,
    pointBackgroundColor: '#203a43', // titik data
    pointBorderColor: '#c7d7e0',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: '#203a43'
}]

    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1 }
            }
        }
    }
});
</script>
@endpush


@push('styles')
<style>

/* ===========================
   HALAMAN & BACKGROUND
=========================== */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(to bottom, #ffffff, #203a43); /* putih -> navy */
    padding-bottom: 50px;
    transition: all 0.3s ease;
}

/* ===========================
   STAT CARD MODERN
=========================== */
.stat-card {
    background: rgba(255,255,255,0.9); /* semi-transparan putih seperti user-card */
    backdrop-filter: blur(12px);
    transition: all .35s ease;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,.08);
}

.stat-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,.15);
}

.stat-card .text-muted {
    color: #5a6975; /* abu kebiruan, lembut tapi terbaca */
}

/* Angka utama di stat */
.stat-card h3 {
    color: #203a43; /* navy gelap, kontras dengan background */
    font-weight: 700;
}

/* Judul chart */
.glass-card h5 {
    color: #203a43; /* navy gelap */
}

/* Teks deskripsi di chart / quick action */
.glass-card p,
.glass-card .text-muted {
    color: #5a6975; /* abu lembut */
}

.page-bg h4.fw-bold.text-info {
    color: #36738b !important; /* putih */
}

/* Judul chart & quick action */
.glass-card h5.fw-bold.text-info {
    color: #3a6979 !important; /* dove navy / biru gelap */
}

/* Icon di card tetap biru navy */
.icon-box i {
    color: #294e5a;
}

/* ===========================
   ICON BOX
=========================== */
.icon-box {
    width: 60px;
    height: 60px;
    font-size: 24px;
    border-radius: 16px;
    background: rgba(43, 80, 92, 0.15); /* navy soft */
    color: #203a43; /* navy gelap */
    transition: all .3s ease;
}

.icon-box:hover {
    transform: scale(1.1);
    background: rgba(32,58,67,0.3);
}

/* ===========================
   GLASS EFFECT CARDS (Chart & Quick Action)
=========================== */
.glass-card {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);
    transition: all .3s ease;
    border-radius: 1rem;
}

.glass-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(0,0,0,.15);
}

/* ===========================
   CHART LINE STYLING
=========================== */
.chartjs-render-monitor {
    border-radius: 1rem;
    background: rgba(32,58,67,0.1);
    box-shadow: 0 4px 12px rgba(0,0,0,.08);
}

.chartjs-render-monitor:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,.15);
}

/* ===========================
   BUTTON INFO
=========================== */
.btn-info {
    background: #203a43; /* navy */
    color: #fff;
    border-color: #203a43;
}
.btn-info:hover {
    background: #0f2027; /* lebih gelap saat hover */
    color: #fff;
}

.btn-outline-info {
    color: #203a43; /* navy */
    border-color: #203a43;
}
.btn-outline-info:hover {
    background-color: #203a43;
    color: #fff;
    border-color: #203a43;
}

/* ===========================
   TEXT CARD
=========================== */
.stat-card h3,
.stat-card .text-muted {
    color: #203a43; /* warna teks seragam */
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .flex-grow-1 {
        margin-left: 0 !important;
    }
}
</style>
@endpush

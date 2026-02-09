@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')
<div class="d-flex">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    <div class="flex-grow-1" style="margin-left:260px;">
        {{-- HEADER --}}
        @include('admin.partials.header')

        <div class="p-4 page-bg">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold mb-1 admin-title">
                    <i class="fa-solid fa-gauge-high me-1"></i>
                    Dashboard
                </h4>
                <p class="text-muted mb-0">
                    Ringkasan aktivitas sistem hari ini
                </p>
            </div>

            {{-- STAT CARDS --}}
            <div class="row g-4 mb-4">
                @foreach ([
                    ['title'=>'Total User','icon'=>'users','count'=>$totalUsers ?? 0],
                    ['title'=>'Dokumen PDF','icon'=>'file-pdf','count'=>$totalDocuments ?? 0],
                    ['title'=>'Dokumen Hari Ini','icon'=>'calendar-day','count'=>$todayDocuments ?? 0],
                ] as $card)

                <div class="col-md-4">
                    <div class="card border-0 stat-card h-100">
                        <div class="card-body d-flex align-items-center">

                            {{-- ICON --}}
                            <div class="icon-box">
                                <i class="fa-solid fa-{{ $card['icon'] }}"></i>
                            </div>

                            {{-- TEXT --}}
                            <div class="ms-3">
                                <div class="text-muted small">
                                    {{ $card['title'] }}
                                </div>
                                <h3 class="fw-bold mb-0">
                                    {{ $card['count'] }}
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            {{-- CHART --}}
            <div class="card border-0 glass-card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 admin-section-title">
                        <i class="fa-solid fa-chart-line me-1"></i>
                        Dokumen Dikunci (7 Hari Terakhir)
                    </h5>

                    <canvas id="documentChart" height="100"></canvas>
                </div>
            </div>

            {{-- QUICK ACTION --}}
            <div class="card border-0 glass-card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 admin-section-title">
                        <i class="fa-solid fa-bolt me-1"></i>
                        Aksi Cepat
                    </h5>

                    <a href="{{ route('admin.pdf.locker') }}"
                       class="btn btn-info me-2">
                        <i class="fa-solid fa-file-shield me-1"></i>
                        PDF Locker
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-outline-info">
                        <i class="fa-solid fa-users me-1"></i>
                        Manajemen User
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

{{-- ================= SCRIPT ================= --}}
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
            borderColor: '#ED1C24',
            backgroundColor: 'rgba(237,28,36,0.2)',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#ED1C24',
            pointBorderColor: '#7A1C1F',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: '#ED1C24'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
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

{{-- ================= STYLES ================= --}}
@push('styles')
<style>
/* PAGE BACKGROUND */
.page-bg {
    min-height: 100vh;
    background: linear-gradient(to bottom, #FFF6D8, #FFF1C1);
    padding-bottom: 50px;
}

/* TITLES */
.admin-title,
.admin-section-title {
    color: #7A1C1F;
}

.admin-title i,
.admin-section-title i {
    color: #ED1C24;
}

/* STAT CARD */
.stat-card {
    background: #FFFDF4;
    border-radius: 18px;
    box-shadow: 0 6px 20px rgba(0,0,0,.12);
    transition: .3s ease;
}

.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,.18);
}

.stat-card h3 {
    color: #7A1C1F;
}

.stat-card .text-muted {
    color: rgba(59,47,47,.7);
}

/* ICON BOX */
.icon-box {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: rgba(237,28,36,.12);
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-box i {
    color: #ED1C24;
    font-size: 22px;
}

/* GLASS CARD */
.glass-card {
    background: #FFFDF4;
    border-radius: 18px;
    box-shadow: 0 6px 20px rgba(0,0,0,.12);
    transition: .3s ease;
}

.glass-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 40px rgba(0,0,0,.18);
}

/* BUTTONS */
.btn-info {
    background: #ED1C24;
    border-color: #ED1C24;
    color: #fff;
}

.btn-info:hover {
    background: #7A1C1F;
    border-color: #7A1C1F;
}

.btn-outline-info {
    border-color: #ED1C24;
    color: #ED1C24;
}

.btn-outline-info:hover {
    background: #ED1C24;
    color: #fff;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .flex-grow-1 {
        margin-left: 0 !important;
    }
}
</style>
@endpush

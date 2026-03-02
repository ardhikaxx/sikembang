@extends('layouts.bidan')

@section('title', 'Statistik Ibu Hamil - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Statistik Ibu Hamil</h4>
            <p class="text-muted mb-0">Grafik jumlah ibu hamil per bulan tahun <?php echo $tahun; ?></p>
        </div>
        <a href="{{ route('bidan.laporan.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card card-sikembang">
                <div class="card-header card-header-primary">
                    <h5 class="mb-0"><i class="fa-solid fa-chart-line me-2"></i>Jumlah Ibu Hamil per Bulan ({{ $tahun }})</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <span class="badge bg-primary fs-6">Total Ibu Hamil: {{ $totalIbu }}</span>
                    </div>
                    <canvas id="ibuChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('ibuChart').getContext('2d');
const ibuChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {{ json_encode($bulanLabels) }},
        datasets: [{
            label: 'Jumlah Ibu Hamil',
            data: {{ json_encode($dataIbu) }},
            backgroundColor: 'rgba(236, 30, 136, 0.1)',
            borderColor: '#EC1E88',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#EC1E88',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    padding: 20
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>
@endpush
@endsection

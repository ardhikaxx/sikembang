@extends('layouts.bidan')

@section('title', 'Konsultasi per Bidan - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Konsultasi per Bidan</h4>
            <p class="text-muted mb-0">Grafik jumlah konsultasi per bidan</p>
        </div>
        <a href="{{ route('bidan.laporan.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card card-sikembang">
                <div class="card-header card-header-primary">
                    <h5 class="mb-0"><i class="fa-solid fa-user-doctor me-2"></i>Jumlah Konsultasi per Bidan</h5>
                </div>
                <div class="card-body">
                    <canvas id="konsultasiBidanChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('konsultasiBidanChart').getContext('2d');
const konsultasiBidanChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {{ json_encode($labels) }},
        datasets: [{
            label: 'Jumlah Konsultasi',
            data: {{ json_encode($data) }},
            backgroundColor: [
                'rgba(236, 30, 136, 0.7)',
                'rgba(196, 22, 110, 0.7)',
                'rgba(156, 16, 88, 0.7)',
                'rgba(236, 30, 136, 0.5)',
                'rgba(196, 22, 110, 0.5)',
            ],
            borderColor: [
                '#EC1E88',
                '#c4166e',
                '#9c1058',
                '#EC1E88',
                '#c4166e',
            ],
            borderWidth: 2,
            borderRadius: 10
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
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

@extends('layouts.bidan')

@section('title', 'Laporan Distribusi Usia Kehamilan - SIKEMBANG')

@section('main-content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-sikembang">
                <div class="card-header text-center">
                    <h4>Laporan Distribusi Usia Kehamilan</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="chart-container">
                        <canvas id="distribusiUsiaKehamilanChart"></canvas>
                    </div>

                    <hr>

                    <h5>Detail Distribusi</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Trimester</th>
                                    <th>Jumlah Ibu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trimester 1 (0-13 Minggu)</td>
                                    <td>{{ $distribusi['trimester1'] }}</td>
                                </tr>
                                <tr>
                                    <td>Trimester 2 (14-27 Minggu)</td>
                                    <td>{{ $distribusi['trimester2'] }}</td>
                                </tr>
                                <tr>
                                    <td>Trimester 3 (28-40 Minggu)</td>
                                    <td>{{ $distribusi['trimester3'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('distribusiUsiaKehamilanChart').getContext('2d');
        const distribusiData = @json($distribusi);

        const labels = ['Trimester 1', 'Trimester 2', 'Trimester 3'];
        const data = [distribusiData.trimester1, distribusiData.trimester2, distribusiData.trimester3];
        const backgroundColors = [
            'rgba(255, 99, 132, 0.7)', // Red
            'rgba(54, 162, 235, 0.7)', // Blue
            'rgba(255, 206, 86, 0.7)'  // Yellow
        ];
        const borderColors = [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'
        ];

        new Chart(ctx, {
            type: 'doughnut', // You can change this to 'pie', 'bar', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Ibu',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Usia Kehamilan Berdasarkan Trimester'
                    }
                }
            }
        });
    });
</script>
@endpush

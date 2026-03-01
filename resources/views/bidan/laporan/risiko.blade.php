@extends('layouts.bidan')

@section('title', 'Laporan Data Ibu Risiko - SIKEMBANG')

@section('main-content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-sikembang">
                <div class="card-header text-center">
                    <h4>Laporan Data Ibu Risiko</h4>
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
                        <canvas id="risikoChart"></canvas>
                    </div>

                    <hr>

                    <h5>Detail Data Ibu Berdasarkan Kategori Risiko</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kategori Risiko</th>
                                    <th>Jumlah Ibu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rendah</td>
                                    <td>{{ $risikoRendah }}</td>
                                </tr>
                                <tr>
                                    <td>Sedang</td>
                                    <td>{{ $risikoSedang }}</td>
                                </tr>
                                <tr>
                                    <td>Tinggi</td>
                                    <td>{{ $risikoTinggi }}</td>
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
        const ctx = document.getElementById('risikoChart').getContext('2d');
        const risikoData = {
            rendah: {{ $risikoRendah }},
            sedang: {{ $risikoSedang }},
            tinggi: {{ $risikoTinggi }}
        };

        const labels = ['Rendah', 'Sedang', 'Tinggi'];
        const data = [risikoData.rendah, risikoData.sedang, risikoData.tinggi];
        const backgroundColors = [
            'rgba(40, 167, 69, 0.7)', // Green for Rendah
            'rgba(255, 193, 7, 0.7)',  // Yellow for Sedang
            'rgba(220, 53, 69, 0.7)'   // Red for Tinggi
        ];
        const borderColors = [
            'rgba(40, 167, 69, 1)',
            'rgba(255, 193, 7, 1)',
            'rgba(220, 53, 69, 1)'
        ];

        new Chart(ctx, {
            type: 'bar', // You can change this to 'pie', 'doughnut', etc.
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
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Kategori Risiko'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Ibu'
                        }
                    }
                }
            }
        });
    });
</script>
@endpush

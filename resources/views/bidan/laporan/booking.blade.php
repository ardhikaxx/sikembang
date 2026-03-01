@extends('layouts.bidan')

@section('title', 'Laporan Status Booking - SIKEMBANG')

@section('main-content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-sikembang">
                <div class="card-header text-center">
                    <h4>Laporan Status Booking</h4>
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
                        <canvas id="bookingStatusChart"></canvas>
                    </div>

                    <hr>

                    <h5>Detail Status Booking</h5>
                    @if ($statusBooking->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statusBooking as $status)
                                <tr>
                                    <td>{{ ucfirst($status->status) }}</td>
                                    <td>{{ $status->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-center text-muted">Tidak ada data booking yang tersedia.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('bookingStatusChart').getContext('2d');
        const bookingStatusData = @json($statusBooking);

        const labels = bookingStatusData.map(item => {
            switch(item.status) {
                case 'menunggu': return 'Menunggu';
                case 'diterima': return 'Diterima';
                case 'ditolak': return 'Ditolak';
                case 'selesai': return 'Selesai';
                case 'dijadwalkan_ulang': return 'Dijadwalkan Ulang';
                default: return item.status;
            }
        });
        const data = bookingStatusData.map(item => item.total);
        const backgroundColors = [
            'rgba(255, 206, 86, 0.7)', // Menunggu (Yellow)
            'rgba(75, 192, 192, 0.7)', // Diterima (Green)
            'rgba(255, 99, 132, 0.7)', // Ditolak (Red)
            'rgba(54, 162, 235, 0.7)', // Selesai (Blue)
            'rgba(153, 102, 255, 0.7)'  // Dijadwalkan Ulang (Purple)
        ];
        const borderColors = [
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)'
        ];

        new Chart(ctx, {
            type: 'pie', // You can change this to 'bar', 'doughnut', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Booking',
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
                        text: 'Distribusi Status Booking'
                    }
                }
            }
        });
    });
</script>
@endpush

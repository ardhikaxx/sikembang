@extends('layouts.bidan')

@section('title', 'Dashboard - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Dashboard</h4>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalIbu }}</div>
            <div>Total Ibu Hamil</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $konsultasiAktif }}</div>
            <div>Konsultasi Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $bookingMenunggu }}</div>
            <div>Booking Menunggu</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $notifikasiCount }}</div>
            <div>Notifikasi Baru</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang">
            <div class="card-header card-header-primary">
                <h5 class="mb-0">Booking Terbaru</h5>
            </div>
            <div class="card-body">
                @if($bookingTerbaru->count() > 0)
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Ibu</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookingTerbaru as $booking)
                            <tr>
                                <td>{{ $booking->ibu->nama_latest }}</td>
                                <td>{{ $booking->tanggal_booking->format('d-m-Y') }}</td>
                                <td>
                                    @if($booking->status == 'menunggu')
                                    <span class="badge bg-warning">Menunggu</span>
                                    @else
                                    <span class="badge bg-success">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">Tidak ada booking</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang">
            <div class="card-header card-header-primary">
                <h5 class="mb-0">Ibu dengan Risiko Tinggi</h5>
            </div>
            <div class="card-body">
                @if($ibuRisikoTinggi->count() > 0)
                <ul class="list-group">
                    @foreach($ibuRisikoTinggi as $risiko)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $risiko->ibu->nama_latest }}
                        <span class="badge badge-risiko-tinggi">Tinggi</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted">Tidak ada ibu dengan risiko tinggi</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.bidan')

@section('title', 'Dashboard - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Dashboard</h4>
            <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->nama_lengkap }}!</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-white bg-opacity-25 text-dark px-3 py-2">
                <i class="fa-regular fa-calendar me-1"></i>
                {{ now()->format('d M Y') }}
            </span>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-card stat-card-gradient-pink">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">{{ $totalIbu }}</div>
                        <div class="stat-label">Total Ibu Hamil</div>
                    </div>
                    <i class="fa-solid fa-person-pregnant"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-card-gradient-blue">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">{{ $konsultasiAktif }}</div>
                        <div class="stat-label">Konsultasi Aktif</div>
                    </div>
                    <i class="fa-solid fa-comments"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-card-gradient-orange">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">{{ $bookingMenunggu }}</div>
                        <div class="stat-label">Booking Menunggu</div>
                    </div>
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-card-gradient-purple">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">{{ $notifikasiCount }}</div>
                        <div class="stat-label">Notifikasi Baru</div>
                    </div>
                    <i class="fa-solid fa-bell"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-header card-header-primary d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fa-solid fa-calendar-check me-2"></i>Booking Terbaru</h5>
                    <a href="{{ route('bidan.booking.index') }}" class="text-white opacity-75 text-decoration-none small">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    @if($bookingTerbaru->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                @foreach($bookingTerbaru as $booking)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                {{ substr($booking->ibu->nama_lengkap, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-semibold">{{ $booking->ibu->nama_lengkap }}</div>
                                                <small class="text-muted">{{ $booking->jenis }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted">Tanggal</div>
                                        <div class="fw-semibold">{{ $booking->tanggal_booking->format('d M Y') }}</div>
                                    </td>
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
                    <div class="empty-state py-4">
                        <i class="fa-regular fa-calendar-xmark"></i>
                        <h6>Tidak Ada Booking</h6>
                        <p class="text-muted mb-0">Belum ada booking terbaru</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-header card-header-primary d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fa-solid fa-heart-exclamation me-2"></i>Ibu dengan Risiko Tinggi</h5>
                    <a href="{{ route('bidan.risiko.index') }}" class="text-white opacity-75 text-decoration-none small">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    @if($ibuRisikoTinggi->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($ibuRisikoTinggi as $risiko)
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3 bg-danger">
                                    {{ substr($risiko->ibu->nama_lengkap, 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $risiko->ibu->nama_lengkap }}</div>
                                    <small class="text-muted">Skor: {{ $risiko->total_skor }}</small>
                                </div>
                            </div>
                            <span class="badge badge-risiko-tinggi">Tinggi</span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="empty-state py-4">
                        <i class="fa-solid fa-heart-circle-check"></i>
                        <h6>Tidak Ada Risiko Tinggi</h6>
                        <p class="text-muted mb-0">Semua ibu dalam kondisi baik</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

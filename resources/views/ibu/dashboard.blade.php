@extends('layouts.ibu')

@section('title', 'Dashboard - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Dashboard</h4>
            <p class="text-muted mb-0">Halo, {{ Auth::user()->nama_lengkap }}! Stay healthy, stay happy!</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-white bg-opacity-25 text-dark px-3 py-2">
                <i class="fa-regular fa-calendar me-1"></i>
                {{ now()->format('d M Y') }}
            </span>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 fade-in" style="border-left: 4px solid #10b981;">
        {{ session('success') }}
    </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card stat-card-gradient-pink">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">
                            @if($usiaKehamilan)
                            {{ $usiaKehamilan['minggu'] }}<span style="font-size: 1rem;">minggu</span> {{ $usiaKehamilan['hari'] }}<span style="font-size: 1rem;">hari</span>
                            @else
                            -
                            @endif
                        </div>
                        <div class="stat-label">Usia Kehamilan</div>
                    </div>
                    <i class="fa-solid fa-baby"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card stat-card-gradient-orange">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">
                            @if($hariTersisaHPL !== null)
                            {{ $hariTersisaHPL }}<span style="font-size: 1rem;">hari</span>
                            @else
                            -
                            @endif
                        </div>
                        <div class="stat-label">Menuju HPL</div>
                    </div>
                    <i class="fa-solid fa-calendar-day"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card stat-card-gradient-blue">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-number">
                            @if($trimester)
                            {{ $trimester }}
                            @else
                            -
                            @endif
                        </div>
                        <div class="stat-label">Trimester Saat Ini</div>
                    </div>
                    <i class="fa-solid fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>

    @if($profil)
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card card-sikembang">
                <div class="card-header d-flex align-items-center">
                    <i class="fa-solid fa-baby me-2"></i>
                    <h5 class="mb-0">Informasi Kehamilan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box">
                                <div class="text-muted small">HPHT</div>
                                <div class="fw-bold text-primary">{{ $profil->hpht ? $profil->hpht->format('d-m-Y') : '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <div class="text-muted small">HPL</div>
                                <div class="fw-bold text-primary">{{ $profil->hpl ? $profil->hpl->format('d-m-Y') : '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <div class="text-muted small">Gol. Darah</div>
                                <div class="fw-bold text-primary">
                                    @if($profil->golongan_darah)
                                    {{ $profil->golongan_darah }} {{ $profil->rhesus ? '('.$profil->rhesus.')' : '' }}
                                    @else
                                    -
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <div class="text-muted small">Kehamilanan ke-</div>
                                <div class="fw-bold text-primary">{{ $profil->kehhasilan_ke ?? 1 }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="info-box">
                                <div class="text-muted small">Anak Hidup</div>
                                <div class="fw-bold">{{ $profil->anak_hidup ?? 0 }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <div class="text-muted small">Keguguran</div>
                                <div class="fw-bold">{{ $profil->keguguran ?? 0 }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        @if($bookingBerikutnya)
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-header card-header-primary">
                    <h5 class="mb-0"><i class="fa-solid fa-calendar-check me-2"></i>Jadwal Booking Berikutnya</h5>
                </div>
                <div class="card-body">
                    <div class="booking-detail">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-lg me-3">
                                <i class="fa-solid fa-user-nurse"></i>
                            </div>
                            <div>
                                <div class="fw-bold">{{ $bookingBerikutnya->bidan->nama_lengkap }}</div>
                                <small class="text-muted">Bidan</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-calendar text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Tanggal</small>
                                        <span class="fw-semibold">{{ $bookingBerikutnya->tanggal_booking->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-clock text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Jam</small>
                                        <span class="fw-semibold">{{ $bookingBerikutnya->jam_booking }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-stethoscope text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Jenis</small>
                                        <span class="fw-semibold">{{ ucfirst($bookingBerikutnya->jenis) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-location-dot text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Tempat</small>
                                        <span class="fw-semibold">{{ $bookingBerikutnya->tempat ?? 'Puskesmas' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($reminderHariIni && $reminderHariIni->count() > 0)
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-header card-header-primary">
                    <h5 class="mb-0"><i class="fa-solid fa-bell me-2"></i>Reminder Hari Ini</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($reminderHariIni as $reminder)
                        <div class="list-group-item border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    @if($reminder->jenis == 'kontrol')
                                    <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle me-3">
                                        <i class="fa-solid fa-stethoscope"></i>
                                    </div>
                                    @elseif($reminder->jenis == 'vitamin')
                                    <div class="icon-box bg-success bg-opacity-10 text-success rounded-circle me-3">
                                        <i class="fa-solid fa-pills"></i>
                                    </div>
                                    @else
                                    <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-circle me-3">
                                        <i class="fa-solid fa-bell"></i>
                                    </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $reminder->judul }}</div>
                                        @if($reminder->jam)
                                        <small class="text-muted">{{ $reminder->jam }}</small>
                                        @endif
                                    </div>
                                </div>
                                <span class="badge badge-{{ $reminder->jenis == 'kontrol' ? 'bg-primary' : ($reminder->jenis == 'vitamin' ? 'bg-success' : 'bg-warning') }}">
                                    {{ ucfirst($reminder->jenis) }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!$profil && !$bookingBerikutnya && (!$reminderHariIni || $reminderHariIni->count() == 0))
        <div class="col-md-12">
            <div class="card card-sikembang">
                <div class="card-body text-center py-5">
                    <i class="fa-solid fa-hands-holding-child text-primary" style="font-size: 4rem; opacity: 0.3;"></i>
                    <h5 class="mt-4">Selamat Datang di SIKEMBANG</h5>
                    <p class="text-muted">Lengkapkan profil kehamilan Anda untuk memulai konsultasi dengan bidan.</p>
                    <a href="{{ route('edit-profil') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-user-plus me-2"></i>Lengkapkan Profil
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
.info-box {
    padding: 12px;
    background: #f9fafb;
    border-radius: 10px;
}

.icon-box {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endsection

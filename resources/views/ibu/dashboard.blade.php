@extends('layouts.ibu')

@section('title', 'Dashboard - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Dashboard</h4>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">
                        @if($usiaKehamilan)
                        {{ $usiaKehamilan['minggu'] }}minggu {{ $usiaKehamilan['hari'] }}hari
                        @else
                        -
                        @endif
                    </div>
                    <div>Usia Kehamilan</div>
                </div>
                <i class="fa-solid fa-baby fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">
                        @if($hariTersisaHPL !== null)
                        {{ $hariTersisaHPL }} hari
                        @else
                        -
                        @endif
                    </div>
                    <div>HPL (Hari Perkiraan Lahir)</div>
                </div>
                <i class="fa-solid fa-calendar-day fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">
                        @if($trimester)
                        Trimester {{ $trimester }}
                        @else
                        -
                        @endif
                    </div>
                    <div>Trimester Saat Ini</div>
                </div>
                <i class="fa-solid fa-chart-line fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

@if($profil)
<div class="card card-sikembang mb-4">
    <div class="card-body">
        <h5 class="card-title">Informasi Kehamilan</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>HPHT:</strong> {{ $profil->hpht ? $profil->hpht->format('d-m-Y') : '-' }}</p>
                <p><strong>HPL:</strong> {{ $profil->hpl ? $profil->hpl->format('d-m-Y') : '-' }}</p>
                <p><strong>Gol. Darah:</strong> {{ $profil->golongan_darah ?? '-' }} {{ $profil->rhesus ? '('.$profil->rhesus.')' : '' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Kehamilanan ke:</strong> {{ $profil->kehhasilan_ke ?? 1 }}</p>
                <p><strong>Anak Hidup:</strong> {{ $profil->anak_hidup ?? 0 }}</p>
                <p><strong>Keguguran:</strong> {{ $profil->keguguran ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>
@endif

@if($bookingBerikutnya)
<div class="card card-sikembang mb-4">
    <div class="card-body">
        <h5 class="card-title"><i class="fa-solid fa-calendar-check me-2"></i>Jadwal Booking Berikutnya</h5>
        <p><strong>Tanggal:</strong> {{ $bookingBerikutnya->tanggal_booking->format('d-m-Y') }}</p>
        <p><strong>Jam:</strong> {{ $bookingBerikutnya->jam_booking }}</p>
        <p><strong>Jenis:</strong> {{ ucfirst($bookingBerikutnya->jenis) }}</p>
        <p><strong>Bidan:</strong> {{ $bookingBerikutnya->bidan->nama_lengkap }}</p>
    </div>
</div>
@endif

@if($reminderHariIni && $reminderHariIni->count() > 0)
<div class="card card-sikembang mb-4">
    <div class="card-body">
        <h5 class="card-title"><i class="fa-solid fa-bell me-2"></i>Reminder Hari Ini</h5>
        @foreach($reminderHariIni as $reminder)
        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
            <div>
                <strong>{{ $reminder->judul }}</strong>
                @if($reminder->jam)
                <span class="text-muted">- {{ $reminder->jam }}</span>
                @endif
            </div>
            <span class="badge bg-{{ $reminder->jenis == 'kontrol' ? 'primary' : ($reminder->jenis == 'vitamin' ? 'success' : 'warning') }}">
                {{ ucfirst($reminder->jenis) }}
            </span>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection

@extends('layouts.bidan')

@section('title', 'Laporan - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Laporan</h4>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang h-100">
            <div class="card-body text-center">
                <i class="fa-solid fa-comments fa-3x mb-3" style="color: var(--primary);"></i>
                <h5>Rekap Konsultasi</h5>
                <p class="text-muted">Lihat rekap konsultasi per bulan</p>
                <a href="{{ route('bidan.laporan.konsultasi') }}" class="btn btn-primary-sikembang">Lihat Laporan</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang h-100">
            <div class="card-body text-center">
                <i class="fa-solid fa-heart-exclamation fa-3x mb-3" style="color: var(--primary);"></i>
                <h5>Data Ibu per Risiko</h5>
                <p class="text-muted">Pie chart distribusi risiko</p>
                <a href="{{ route('bidan.laporan.risiko') }}" class="btn btn-primary-sikembang">Lihat Laporan</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang h-100">
            <div class="card-body text-center">
                <i class="fa-solid fa-calendar-check fa-3x mb-3" style="color: var(--primary);"></i>
                <h5>Booking per Status</h5>
                <p class="text-muted">Grafik status booking</p>
                <a href="{{ route('bidan.laporan.booking') }}" class="btn btn-primary-sikembang">Lihat Laporan</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang h-100">
            <div class="card-body text-center">
                <i class="fa-solid fa-baby fa-3x mb-3" style="color: var(--primary);"></i>
                <h5>Distribusi Usia Kehamilan</h5>
                <p class="text-muted">Grafik distribusi trimester</p>
                <a href="{{ route('bidan.laporan.distribusi') }}" class="btn btn-primary-sikembang">Lihat Laporan</a>
            </div>
        </div>
    </div>
</div>
@endsection

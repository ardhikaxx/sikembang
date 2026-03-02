@extends('layouts.bidan')

@section('title', 'Laporan - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Laporan</h4>
            <p class="text-muted mb-0">Pantau dan analisis data kesehatan ibu hamil</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-body text-center py-4">
                    <div class="icon-box-large bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                        <i class="fa-solid fa-chart-line fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Statistik Ibu Hamil</h5>
                    <p class="text-muted mb-4">Grafik ibu hamil per bulan</p>
                    <a href="{{ route('bidan.laporan.statistik-ibu') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-chart-line me-2"></i>Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-body text-center py-4">
                    <div class="icon-box-large bg-danger bg-opacity-10 text-danger rounded-circle mx-auto mb-4">
                        <i class="fa-solid fa-clipboard-list fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Data Ibu per Risiko</h5>
                    <p class="text-muted mb-4">Pie chart distribusi risiko</p>
                    <a href="{{ route('bidan.laporan.risiko') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-chart-pie me-2"></i>Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-body text-center py-4">
                    <div class="icon-box-large bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4">
                        <i class="fa-solid fa-user-doctor fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Konsultasi per Bidan</h5>
                    <p class="text-muted mb-4">Grafik konsultasi setiap bidan</p>
                    <a href="{{ route('bidan.laporan.konsultasi-bidan') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-chart-bar me-2"></i>Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-body text-center py-4">
                    <div class="icon-box-large bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4">
                        <i class="fa-solid fa-calendar-check fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Booking per Status</h5>
                    <p class="text-muted mb-4">Grafik status booking</p>
                    <a href="{{ route('bidan.laporan.booking') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-chart-bar me-2"></i>Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-body text-center py-4">
                    <div class="icon-box-large bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-4">
                        <i class="fa-solid fa-baby fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Distribusi Usia Kehamilan</h5>
                    <p class="text-muted mb-4">Grafik distribusi trimester</p>
                    <a href="{{ route('bidan.laporan.distribusi') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-chart-column me-2"></i>Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card card-sikembang h-100">
                <div class="card-body text-center py-4">
                    <div class="icon-box-large bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4">
                        <i class="fa-solid fa-comments fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Rekap Konsultasi</h5>
                    <p class="text-muted mb-4">Lihat rekap konsultasi per bulan</p>
                    <a href="{{ route('bidan.laporan.konsultasi') }}" class="btn btn-primary-sikembang">
                        <i class="fa-solid fa-chart-line me-2"></i>Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.icon-box-large {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endsection

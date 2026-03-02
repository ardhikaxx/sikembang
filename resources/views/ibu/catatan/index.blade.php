@extends('layouts.ibu')

@section('title', 'Catatan Kehamilan - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Catatan Kehantauan</h4>
            <p class="text-muted mb-0">Catatan kesehatan kehamilan Anda</p>
        </div>
        <a href="{{ route('ibu.catatan.create') }}" class="btn btn-primary-sikembang">
            <i class="fa-solid fa-plus me-2"></i>Tambah Catatan
        </a>
    </div>

    <div class="card card-sikembang">
        <div class="card-body p-0">
            @if($catatans->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable" id="table-catatan">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Usia Keh</th>
                            <th>Berat Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Kadar HB</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catatans as $catatan)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-calendar text-muted me-2"></i>
                                    {{ $catatan->tanggal_periksa->format('d M Y') }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $catatan->usia_kehantauan ?? '-' }} minggu
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-weight-hanging text-muted me-2"></i>
                                    {{ $catatan->berat_badan ?? '-' }} kg
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-heart text-muted me-2"></i>
                                    {{ $catatan->tekanan_darah ?? '-' }} mmHg
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-droplet text-muted me-2"></i>
                                    {{ $catatan->kadar_hb ?? '-' }} g/dL
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fa-solid fa-notebook"></i>
                <h5>Belum Ada Catatan</h5>
                <p class="text-muted">Catatan kesehatan kehamilan Anda akan muncul di sini</p>
                <a href="{{ route('ibu.catatan.create') }}" class="btn btn-primary-sikembang">
                    <i class="fa-solid fa-plus me-2"></i>Tambah Catatan
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

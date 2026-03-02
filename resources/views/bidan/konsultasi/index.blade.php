@extends('layouts.bidan')

@section('title', 'Konsultasi - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Konsultasi</h4>
            <p class="text-muted mb-0">Kelola konsultasi dengan ibu hamil</p>
        </div>
        <div>
            <a href="{{ route('bidan.export.konsultasi') }}" class="btn btn-success btn-sm">
                <i class="fa-solid fa-file-excel me-1"></i>Export Excel
            </a>
        </div>
    </div>

    <div class="card card-sikembang">
        <div class="card-body p-0">
            @if($konsultasis->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable" id="table-konsultasi">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Ibu</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($konsultasis as $konsultasi)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle me-3">
                                        <i class="fa-solid fa-comments"></i>
                                    </div>
                                    <div class="fw-semibold">{{ $konsultasi->judul }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        {{ substr($konsultasi->ibu->nama_lengkap, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $konsultasi->ibu->nama_lengkap }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($konsultasi->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-secondary">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-calendar text-muted me-2"></i>
                                    {{ $konsultasi->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('bidan.konsultasi.detail', $konsultasi->id) }}" class="btn btn-sm btn-outline-sikembang">
                                    <i class="fa-solid fa-eye me-1"></i> Buka
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fa-solid fa-comments-slash"></i>
                <h5>Belum Ada Konsultasi</h5>
                <p class="text-muted">Belum ada konsultasi dari ibu hamil</p>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.icon-box {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
</style>
@endsection

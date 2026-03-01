@extends('layouts.ibu')

@section('title', 'Konsultasi - SIKEMBANG')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Konsultasi</h4>
    <a href="{{ route('ibu.konsultasi.create') }}" class="btn btn-primary-sikembang">
        <i class="fa-solid fa-plus me-2"></i>Konsultasi Baru
    </a>
</div>

<div class="card card-sikembang">
    <div class="card-body">
        @if($konsultasis->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Bidan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($konsultasis as $konsultasi)
                    <tr>
                        <td>{{ $konsultasi->judul }}</td>
                        <td>{{ $konsultasi->bidan->nama_latest }}</td>
                        <td>
                            @if($konsultasi->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @elseif($konsultasi->status == 'selesai')
                            <span class="badge bg-info">Selesai</span>
                            @else
                            <span class="badge bg-secondary">Ditutup</span>
                            @endif
                        </td>
                        <td>{{ $konsultasi->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('ibu.konsultasi.detail', $konsultasi->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-eye"></i> Lihat
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-muted">Belum ada konsultasi</p>
        @endif
    </div>
</div>
@endsection

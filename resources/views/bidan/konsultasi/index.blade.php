@extends('layouts.bidan')

@section('title', 'Konsultasi - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Konsultasi</h4>

<div class="card card-sikembang">
    <div class="card-body">
        @if($konsultasis->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
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
                        <td>{{ $konsultasi->judul }}</td>
                        <td>{{ $konsultasi->ibu->nama_latest }}</td>
                        <td>
                            @if($konsultasi->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Selesai</span>
                            @endif
                        </td>
                        <td>{{ $konsultasi->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('bidan.konsultasi.detail', $konsultasi->id) }}" class="btn btn-sm btn-outline-primary">Buka</a>
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

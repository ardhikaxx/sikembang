@extends('layouts.bidan')

@section('title', 'Booking - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Kelola Booking</h4>
            <p class="text-muted mb-0">Kelola jadwal konsultasi ibu hamil</p>
        </div>
    </div>

    <div class="card card-sikembang">
        <div class="card-body p-0">
            @if($bookings->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable" id="table-booking">
                    <thead>
                        <tr>
                            <th>Ibu</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        {{ substr($booking->ibu->nama_lengkap, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $booking->ibu->nama_lengkap }}</div>
                                        <small class="text-muted">{{ $booking->ibu->no_hp ?? '-' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-calendar text-muted me-2"></i>
                                    {{ $booking->tanggal_booking->format('d M Y') }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-clock text-muted me-2"></i>
                                    {{ $booking->jam_booking }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ ucfirst($booking->jenis) }}
                                </span>
                            </td>
                            <td>
                                @if($booking->status == 'menunggu')
                                <span class="badge bg-warning">Menunggu</span>
                                @elseif($booking->status == 'diterima')
                                <span class="badge bg-success">Diterima</span>
                                @elseif($booking->status == 'ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                                @else
                                <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $booking->status)) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($booking->status == 'menunggu')
                                <a href="{{ route('bidan.booking.terima', $booking->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa-solid fa-check me-1"></i>Terima
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="showTolakModal({{ $booking->id }})">
                                    <i class="fa-solid fa-xmark me-1"></i>Tolak
                                </button>
                                @endif
                                @if($booking->status == 'diterima')
                                <a href="{{ route('bidan.booking.selesai', $booking->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-check-double me-1"></i>Selesai
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fa-solid fa-calendar-check"></i>
                <h5>Belum Ada Booking</h5>
                <p class="text-muted">Belum ada booking jadwal konsultasi</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

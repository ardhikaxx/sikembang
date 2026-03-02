@extends('layouts.ibu')

@section('title', 'Booking - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Booking</h4>
            <p class="text-muted mb-0">Kelola jadwal konsultasi Anda</p>
        </div>
        <a href="{{ route('ibu.booking.create') }}" class="btn btn-primary-sikembang">
            <i class="fa-solid fa-plus me-2"></i>Booking Baru
        </a>
    </div>

    <div class="card card-sikembang">
        <div class="card-body p-0">
            @if($bookings->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable" id="table-booking">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Bidan</th>
                            <th>Jenis</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
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
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        {{ substr($booking->bidan->nama_lengkap, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $booking->bidan->nama_lengkap }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary">
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
                                @elseif($booking->status == 'selesai')
                                <span class="badge bg-info">Selesai</span>
                                @else
                                <span class="badge bg-secondary">Dijadwalkan Ulang</span>
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
                <p class="text-muted">Silakan buat booking baru untuk berkonsultasi dengan bidan</p>
                <a href="{{ route('ibu.booking.create') }}" class="btn btn-primary-sikembang">
                    <i class="fa-solid fa-plus me-2"></i>Buat Booking
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

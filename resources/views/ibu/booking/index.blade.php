@extends('layouts.ibu')

@section('title', 'Booking - SIKEMBANG')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Booking</h4>
    <a href="{{ route('ibu.booking.create') }}" class="btn btn-primary-sikembang">
        <i class="fa-solid fa-plus me-2"></i>Booking Baru
    </a>
</div>

<div class="card card-sikembang">
    <div class="card-body">
        @if($bookings->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
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
                        <td>{{ $booking->tanggal_booking->format('d-m-Y') }}</td>
                        <td>{{ $booking->jam_booking }}</td>
                        <td>{{ $booking->bidan->nama_lengkap }}</td>
                        <td>{{ ucfirst($booking->jenis) }}</td>
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
        <p class="text-center text-muted">Belum ada booking</p>
        @endif
    </div>
</div>
@endsection

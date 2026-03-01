@extends('layouts.bidan')

@section('title', 'Booking - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Kelola Booking</h4>

<div class="card card-sikembang">
    <div class="card-body">
        @if($bookings->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
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
                        <td>{{ $booking->ibu->nama_latest }}</td>
                        <td>{{ $booking->tanggal_booking->format('d-m-Y') }}</td>
                        <td>{{ $booking->jam_booking }}</td>
                        <td>{{ ucfirst($booking->jenis) }}</td>
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
                            <a href="{{ route('bidan.booking.terima', $booking->id) }}" class="btn btn-sm btn-success">Terima</a>
                            <button class="btn btn-sm btn-danger" onclick="showTolakModal({{ $booking->id }})">Tolak</button>
                            @endif
                            @if($booking->status == 'diterima')
                            <a href="{{ route('bidan.booking.selesai', $booking->id) }}" class="btn btn-sm btn-info">Selesai</a>
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

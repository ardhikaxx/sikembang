@extends('layouts.ibu')

@section('title', 'Catatan Kehamilan - SIKEMBANG')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Catatan Kehamilan</h4>
    <a href="{{ route('ibu.catatan.create') }}" class="btn btn-primary-sikembang">
        <i class="fa-solid fa-plus me-2"></i>Tambah Catatan
    </a>
</div>

<div class="card card-sikembang">
    <div class="card-body">
        @if($catatans->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Usia Kehamilan</th>
                        <th>Berat Badan</th>
                        <th>Tekanan Darah</th>
                        <th>Kadar HB</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catatans as $catatan)
                    <tr>
                        <td>{{ $catatan->tanggal_periksa->format('d-m-Y') }}</td>
                        <td>{{ $catatan->usia_kehamilan ?? '-' }} minggu</td>
                        <td>{{ $catatan->berat_badan ?? '-' }} kg</td>
                        <td>{{ $catatan->tekanan_darah ?? '-' }} mmHg</td>
                        <td>{{ $catatan->kadar_hb ?? '-' }} g/dL</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-muted">Belum ada catatan kehamilan</p>
        @endif
    </div>
</div>
@endsection

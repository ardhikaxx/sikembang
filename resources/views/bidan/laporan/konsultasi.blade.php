@extends('layouts.bidan')

@section('title', 'Laporan Rekap Konsultasi - SIKEMBANG')

@section('main-content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-sikembang">
                <div class="card-header text-center">
                    <h4>Laporan Rekap Konsultasi</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('bidan.laporan.konsultasi') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="bulan" class="form-label">Bulan</label>
                                <select name="bulan" id="bulan" class="form-select">
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}" {{ (request('bulan', date('m')) == $m) ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create()->month($m)->locale('id')->monthName }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="tahun" class="form-label">Tahun</label>
                                <select name="tahun" id="tahun" class="form-select">
                                    @for ($y = date('Y'); $y >= 2020; $y--)
                                        <option value="{{ $y }}" {{ (request('tahun', date('Y')) == $y) ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary-sikembang w-100">Filter</button>
                            </div>
                        </div>
                    </form>

                    <h5>Hasil Rekap Konsultasi Bulan {{ \Carbon\Carbon::create()->month(request('bulan', date('m')))->locale('id')->monthName }} Tahun {{ request('tahun', date('Y')) }}</h5>
                    @if ($konsultasis->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Ibu Hamil</th>
                                    <th>Bidan</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsultasis as $konsultasi)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($konsultasi->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                                    <td>{{ $konsultasi->ibu->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $konsultasi->bidan->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $konsultasi->judul }}</td>
                                    <td><span class="badge bg-{{ $konsultasi->status == 'aktif' ? 'primary' : ($konsultasi->status == 'selesai' ? 'success' : 'danger') }}">{{ ucfirst($konsultasi->status) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-center text-muted">Tidak ada data konsultasi untuk bulan ini.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

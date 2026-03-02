@extends('layouts.bidan')

@section('title', 'Penilaian Risiko - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Penilaian Risiko Kehamilan</h4>
            <p class="text-muted mb-0">Pantau dan nilai risiko kesehatan ibu hamil</p>
        </div>
    </div>

    <div class="card card-sikembang">
        <div class="card-body p-0">
            @if($ibus->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable" id="table-risiko">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Usia Kehamilan</th>
                            <th>Risiko Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ibus as $ibu)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        {{ substr($ibu->nama_lengkap, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $ibu->nama_lengkap }}</div>
                                        <small class="text-muted">{{ $ibu->no_hp ?? '-' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($ibu->profilIbuHamil && $ibu->profilIbuHamil->hpht)
                                @php
                                $hpht = new \DateTime($ibu->profilIbuHamil->hpht);
                                $today = new \DateTime();
                                $minggu = floor($hpht->diff($today)->days / 7);
                                @endphp
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $minggu }} minggu
                                </span>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @php
                                $latestRisiko = $ibu->penilaianRisiko()->latest()->first();
                                @endphp
                                @if($latestRisiko)
                                <span class="badge badge-risiko-{{ $latestRisiko->kategori_risiko }}">{{ ucfirst($latestRisiko->kategori_risiko) }}</span>
                                @else
                                <span class="badge bg-secondary">Belum dinilai</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('bidan.risiko.penilaian', $ibu->id) }}" class="btn btn-sm btn-primary-sikembang">
                                    <i class="fa-solid fa-heart me-1"></i> Nilai Risiko
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fa-solid fa-users"></i>
                <h5>Belum Ada Ibu Hamil</h5>
                <p class="text-muted">Belum ada ibu hamil yang terdaftar</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

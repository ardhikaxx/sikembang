@extends('layouts.bidan')

@section('title', 'Data Ibu Hamil - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Data Ibu Hamil</h4>
            <p class="text-muted mb-0">Kelola data ibu hamil terdaftar</p>
        </div>
    </div>

    <div class="card card-sikembang">
        <div class="card-body p-0">
            @if($ibus->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-datatable" id="table-ibu">
                    <thead>
                        <tr>
                            <th>Ibu</th>
                            <th>Email</th>
                            <th>HPHT</th>
                            <th>HPL</th>
                            <th>Risiko</th>
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
                            <td>{{ $ibu->email }}</td>
                            <td>{{ $ibu->profilIbuHamil->hpht ? $ibu->profilIbuHamil->hpht->format('d-m-Y') : '-' }}</td>
                            <td>{{ $ibu->profilIbuHamil->hpl ? $ibu->profilIbuHamil->hpl->format('d-m-Y') : '-' }}</td>
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
                                <a href="{{ route('bidan.data-ibu.detail', $ibu->id) }}" class="btn btn-sm btn-outline-sikembang">
                                    <i class="fa-solid fa-eye me-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fa-solid fa-users-viewfinder"></i>
                <h5>Belum Ada Ibu Hamil</h5>
                <p class="text-muted">Belum ada ibu hamil yang terdaftar dalam sistem</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

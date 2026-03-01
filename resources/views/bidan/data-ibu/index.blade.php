@extends('layouts.bidan')

@section('title', 'Data Ibu - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Data Ibu Hamil</h4>

<div class="card card-sikembang">
    <div class="card-body">
        @if($ibus->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
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
                        <td>{{ $ibu->nama_latest }}</td>
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
                            <a href="{{ route('bidan.data-ibu.detail', $ibu->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-muted">Belum ada ibu hamil terdaftar</p>
        @endif
    </div>
</div>
@endsection

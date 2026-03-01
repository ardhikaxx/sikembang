@extends('layouts.bidan')

@section('title', 'Penilaian Risiko - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Penilaian Risiko Kehamilan</h4>

<div class="card card-sikembang">
    <div class="card-body">
        @if($ibus->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
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
                        <td>{{ $ibu->nama_latest }}</td>
                        <td>
                            @if($ibu->profilIbuHamil && $ibu->profilIbuHamil->hpht)
                            @php
                            $hpht = new \DateTime($ibu->profilIbuHamil->hpht);
                            $today = new \DateTime();
                            $minggu = floor($hpht->diff($today)->days / 7);
                            @endphp
                            {{ $minggu }} minggu
                            @else
                            -
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
                            <a href="{{ route('bidan.risiko.penilaian', $ibu->id) }}" class="btn btn-sm btn-primary-sikembang">Nilai Risiko</a>
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

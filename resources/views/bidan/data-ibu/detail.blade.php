@extends('layouts.bidan')

@section('title', 'Detail Ibu - SIKEMBANG')

@section('main-content')
<a href="{{ route('bidan.data-ibu.index') }}" class="btn btn-sm btn-outline-secondary mb-3">
    <i class="fa-solid fa-arrow-left"></i> Kembali
</a>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang">
            <div class="card-header card-header-primary">
                <h5 class="mb-0">Profil Ibu</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $ibu->nama_latest }}</p>
                <p><strong>Email:</strong> {{ $ibu->email }}</p>
                <p><strong>No HP:</strong> {{ $ibu->no_hp ?? '-' }}</p>
                @if($ibu->profilIbuHamil)
                <p><strong>Tanggal Lahir:</strong> {{ $ibu->profilIbuHamil->tanggal_lahir ? $ibu->profilIbuHamil->tanggal_lahir->format('d-m-Y') : '-' }}</p>
                <p><strong>Gol. Darah:</strong> {{ $ibu->profilIbuHamil->golongan_darah ?? '-' }} {{ $ibu->profilIbuHamil->rhesus ? '('.$ibu->profilIbuHamil->rhesus.')' : '' }}</p>
                <p><strong>HPHT:</strong> {{ $ibu->profilIbuHamil->hpht ? $ibu->profilIbuHamil->hpht->format('d-m-Y') : '-' }}</p>
                <p><strong>HPL:</strong> {{ $ibu->profilIbuHamil->hpl ? $ibu->profilIbuHamil->hpl->format('d-m-Y') : '-' }}</p>
                <p><strong>Kehamilanan ke:</strong> {{ $ibu->profilIbuHamil->kehhasilan_ke ?? 1 }}</p>
                <p><strong>Riwayat Penyakit:</strong> {{ $ibu->profilIbuHamil->riwayat_penyakit ?? '-' }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card card-sikembang">
            <div class="card-header card-header-primary">
                <h5 class="mb-0">Penilaian Risiko Terakhir</h5>
            </div>
            <div class="card-body">
                @if($penilaianRisiko->count() > 0)
                @php $latest = $penilaianRisiko->first(); @endphp
                <p><strong>Kategori:</strong> <span class="badge badge-risiko-{{ $latest->kategori_risiko }}">{{ ucfirst($latest->kategori_risiko) }}</span></p>
                <p><strong>Skor:</strong> {{ $latest->skor_risiko }}</p>
                <p><strong>Tanggal:</strong> {{ $latest->tanggal_penilaian->format('d-m-Y') }}</p>
                <p><strong>Rekomendasi:</strong> {{ $latest->rekomendasi ?? '-' }}</p>
                @else
                <p class="text-muted">Belum ada penilaian risiko</p>
                @endif
                <a href="{{ route('bidan.risiko.penilaian', $ibu->id) }}" class="btn btn-primary-sikembang btn-sm mt-2">Lakukan Penilaian</a>
            </div>
        </div>
    </div>
</div>

<div class="card card-sikembang mb-4">
    <div class="card-header card-header-primary">
        <h5 class="mb-0">Riwayat Konsultasi</h5>
    </div>
    <div class="card-body">
        @if($konsultasis->count() > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($konsultasis as $konsultasi)
                    <tr>
                        <td>{{ $konsultasi->judul }}</td>
                        <td>{{ ucfirst($konsultasi->status) }}</td>
                        <td>{{ $konsultasi->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-muted">Belum ada konsultasi</p>
        @endif
    </div>
</div>

<div class="card card-sikembang">
    <div class="card-header card-header-primary">
        <h5 class="mb-0">Riwayat Catatan Kehamilan</h5>
    </div>
    <div class="card-body">
        @if($catatans->count() > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Usia</th>
                        <th>Berat</th>
                        <th>Tekanan Darah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catatans as $catatan)
                    <tr>
                        <td>{{ $catatan->tanggal_periksa->format('d-m-Y') }}</td>
                        <td>{{ $catatan->usia_kehamilan ?? '-' }}</td>
                        <td>{{ $catatan->berat_badan ?? '-' }}</td>
                        <td>{{ $catatan->tekanan_darah ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-muted">Belum ada catatan</p>
        @endif
    </div>
</div>
@endsection

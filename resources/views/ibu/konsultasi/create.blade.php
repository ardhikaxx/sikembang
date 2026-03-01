@extends('layouts.ibu')

@section('title', 'Konsultasi Baru - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Konsultasi Baru</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('ibu.konsultasi.store') }}">
            @csrf
            <div class="mb-3">
                <label for="bidan_id" class="form-label">Pilih Bidan</label>
                <select class="form-select" id="bidan_id" name="bidan_id" required>
                    <option value="">Pilih Bidan...</option>
                    @foreach($bidans as $bidan)
                    <option value="{{ $bidan->id }}">{{ $bidan->nama_latest }} - {{ $bidan->profilBidan->instansi ?? '-' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Konsultasi</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan Pertama</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Kirim Konsultasi</button>
            <a href="{{ route('ibu.konsultasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

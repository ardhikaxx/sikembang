@extends('layouts.ibu')

@section('title', 'Edukasi - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Edukasi Kehamilan</h4>
<p class="text-muted mb-4">Konten edukasi untuk trimester {{ $trimester }}</p>

<div class="row">
    @forelse($kontens as $konten)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-sikembang h-100">
            @if($konten->gambar)
            <img src="{{ asset('storage/' . $konten->gambar) }}" class="card-img-top" alt="{{ $konten->judul }}" style="height: 200px; object-fit: cover;">
            @endif
            <div class="card-body">
                <span class="badge badge-primary-sikembang mb-2">{{ $konten->kategori->nama ?? '' }}</span>
                <h5 class="card-title">{{ $konten->judul }}</h5>
                <p class="card-text text-muted">{{ Str::limit(strip_tags($konten->konten), 100) }}</p>
                <a href="{{ route('ibu.edukasi.detail', $konten->id) }}" class="btn btn-outline-sikembang btn-sm">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted">Belum ada konten edukasi</p>
    </div>
    @endforelse
</div>
@endsection

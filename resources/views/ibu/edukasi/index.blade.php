@extends('layouts.ibu')

@section('title', 'Edukasi - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Edukasi Kehamilan</h4>
            <p class="text-muted mb-0">Konten edukasi untuk trimester {{ $trimester }}</p>
        </div>
    </div>

    <div class="row">
        @forelse($kontens as $konten)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-sikembang h-100">
                @if($konten->gambar)
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $konten->gambar) }}" class="card-img-top" alt="{{ $konten->judul }}" style="height: 200px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge badge-primary-sikembang">{{ $konten->kategori->nama ?? '' }}</span>
                    </div>
                </div>
                @else
                <div class="position-relative">
                    <div class="bg-primary bg-opacity-10 py-5 text-center">
                        <i class="fa-solid fa-book-open-reader text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge badge-primary-sikembang">{{ $konten->kategori->nama ?? '' }}</span>
                    </div>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $konten->judul }}</h5>
                    <p class="card-text text-muted">{{ Str::limit(strip_tags($konten->konten), 100) }}</p>
                    <a href="{{ route('ibu.edukasi.detail', $konten->id) }}" class="btn btn-outline-sikembang btn-sm w-100">
                        <i class="fa-solid fa-book-open me-2"></i>Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card card-sikembang">
                <div class="card-body text-center py-5">
                    <i class="fa-solid fa-book-open text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                    <h5 class="mt-4">Belum Ada Konten Edukasi</h5>
                    <p class="text-muted">Konten edukasi akan segera tersedia</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection

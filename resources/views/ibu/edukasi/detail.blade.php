@extends('layouts.ibu')

@section('title', 'Detail Edukasi - SIKEMBANG')

@section('main-content')
<a href="{{ route('ibu.edukasi.index') }}" class="btn btn-sm btn-outline-secondary mb-3">
    <i class="fa-solid fa-arrow-left"></i> Kembali
</a>

<div class="card card-sikembang">
    <div class="card-body">
        <span class="badge badge-primary-sikembang">{{ $konten->kategori->nama ?? '' }}</span>
        <h2 class="mt-3">{{ $konten->judul }}</h2>
        <p class="text-muted">
            <small>Dilihat {{ $konten->views }} kali | Oleh {{ $konten->bidan->nama_lengkap }}</small>
        </p>
        <hr>
        <div class="konten">
            {!! $konten->konten !!}
        </div>
    </div>
</div>
@endsection

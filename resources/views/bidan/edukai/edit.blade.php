@extends('layouts.bidan')

@section('title', 'Edit Edukasi - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Edit Konten Edukasi</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('bidan.edukai.update', $konten->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori...</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $konten->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $konten->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea class="form-control" id="konten" name="konten" rows="10" required>{{ $konten->konten }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="trimester" class="form-label">Trimester</label>
                    <select class="form-select" id="trimester" name="trimester" required>
                        <option value="semua" {{ $konten->trimester == 'semua' ? 'selected' : '' }}>Semua</option>
                        <option value="1" {{ $konten->trimester == '1' ? 'selected' : '' }}>Trimester 1</option>
                        <option value="2" {{ $konten->trimester == '2' ? 'selected' : '' }}>Trimester 2</option>
                        <option value="3" {{ $konten->trimester == '3' ? 'selected' : '' }}>Trimester 3</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="minggu_ke" class="form-label">Minggu Ke-</label>
                    <input type="number" class="form-control" id="minggu_ke" name="minggu_ke" min="1" max="40" value="{{ $konten->minggu_ke }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="jpg,jpeg,png,webp">
                @if($konten->gambar)
                <small class="text-muted">Gambar saat ini: {{ $konten->gambar }}</small>
                @endif
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ $konten->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Publish</label>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Update</button>
            <a href="{{ route('bidan.edukai.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

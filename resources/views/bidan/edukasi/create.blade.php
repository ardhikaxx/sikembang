@extends('layouts.bidan')

@section('title', 'Tambah Edukasi - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Tambah Konten Edukasi</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('bidan.edukai.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id" required>
                    <option value="">Pilih Kategori...</option>
                    @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea class="form-control" id="konten" name="konten" rows="10" required></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="trimester" class="form-label">Trimester</label>
                    <select class="form-select" id="trimester" name="trimester" required>
                        <option value="semua">Semua</option>
                        <option value="1">Trimester 1</option>
                        <option value="2">Trimester 2</option>
                        <option value="3">Trimester 3</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="minggu_ke" class="form-label">Minggu Ke-</label>
                    <input type="number" class="form-control" id="minggu_ke" name="minggu_ke" min="1" max="40">
                </div>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="jpg,jpeg,png,webp">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1">
                <label class="form-check-label" for="is_published">Publish sekarang</label>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Simpan</button>
            <a href="{{ route('bidan.edukai.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

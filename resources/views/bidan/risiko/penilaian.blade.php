@extends('layouts.bidan')

@section('title', 'Penilaian Risiko - SIKEMBANG')

@section('main-content')
<a href="{{ route('bidan.risiko.index') }}" class="btn btn-sm btn-outline-secondary mb-3">
    <i class="fa-solid fa-arrow-left"></i> Kembali
</a>

<h4 class="mb-4">Penilaian Risiko - {{ $ibu->nama_lengkap }}</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('bidan.risiko.simpan', $ibu->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kategori_risiko" class="form-label">Kategori Risiko</label>
                    <select class="form-select" id="kategori_risiko" name="kategori_risiko" required>
                        <option value="rendah">Rendah</option>
                        <option value="sedang">Sedang</option>
                        <option value="tinggi">Tinggi</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="skor_risiko" class="form-label">Skor Risiko</label>
                    <input type="number" class="form-control" id="skor_risiko" name="skor_risiko" min="0" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Faktor Risiko</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Usia ibu kurang dari 20 tahun" name="faktor_risiko[]">
                    <label class="form-check-label">Usia ibu kurang dari 20 tahun</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Usia ibu lebih dari 35 tahun" name="faktor_risiko[]">
                    <label class="form-check-label">Usia ibu lebih dari 35 tahun</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Riwayat hipertensi" name="faktor_risiko[]">
                    <label class="form-check-label">Riwayat hipertensi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Riwayat diabetes" name="faktor_risiko[]">
                    <label class="form-check-label">Riwayat diabetes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Riwayat keguguran" name="faktor_risiko[]">
                    <label class="form-check-label">Riwayat keguguran</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Kadar HB rendah" name="faktor_risiko[]">
                    <label class="form-check-label">Kadar HB rendah</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Tekanan darah tinggi" name="faktor_risiko[]">
                    <label class="form-check-label">Tekanan darah tinggi</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Kehamilanan pertama" name="faktor_risiko[]">
                    <label class="form-check-label">Kehamilanan pertama</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="rekomendasi" class="form-label">Rekomendasi</label>
                <textarea class="form-control" id="rekomendasi" name="rekomendasi" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Simpan Penilaian</button>
        </form>
    </div>
</div>
@endsection

@extends('layouts.ibu')

@section('title', 'Tambah Catatan Kehamilan - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Tambah Catatan Kehamilan</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('ibu.catatan.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
                    <input type="date" class="form-control" id="tanggal_periksa" name="tanggal_periksa" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="usia_kehamilan" class="form-label">Usia Kehamilan (Minggu)</label>
                    <input type="number" class="form-control" id="usia_kehamilan" name="usia_kehamilan" min="1" max="42">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                    <input type="number" step="0.01" class="form-control" id="berat_badan" name="berat_badan">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
                    <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" placeholder="120/80">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="denyut_janin" class="form-label">Denyut Janin (bpm)</label>
                    <input type="number" class="form-control" id="denyut_janin" name="denyut_janin">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tinggi_fundus" class="form-label">Tinggi Fundus (cm)</label>
                    <input type="number" step="0.01" class="form-control" id="tinggi_fundus" name="tinggi_fundus">
                </div>
            </div>
            <div class="mb-3">
                <label for="kadar_hb" class="form-label">Kadar HB (g/dL)</label>
                <input type="number" step="0.01" class="form-control" id="kadar_hb" name="kadar_hb">
            </div>
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="catatan_tambahan" class="form-label">Catatan Tambahan</label>
                <textarea class="form-control" id="catatan_tambahan" name="catatan_tambahan" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Simpan</button>
            <a href="{{ route('ibu.catatan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

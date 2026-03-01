@extends('layouts.ibu')

@section('title', 'Tambah Reminder - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Tambah Reminder</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('ibu.reminder.store') }}">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select class="form-select" id="jenis" name="jenis" required>
                    <option value="kontrol">Jadwal Kontrol</option>
                    <option value="vitamin">Minum Vitamin</option>
                    <option value="lab">Tes Lab</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" class="form-control" id="jam" name="jam">
                </div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_berulang" name="is_berulang" value="1">
                <label class="form-check-label" for="is_berulang">Berulang</label>
            </div>
            <div class="mb-3" id="frekuensi-field" style="display: none;">
                <label for="frekuensi" class="form-label">Frekuensi</label>
                <select class="form-select" id="frekuensi" name="frekuensi">
                    <option value="harian">Harian</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Simpan</button>
            <a href="{{ route('ibu.reminder.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<script>
document.getElementById('is_berulang').addEventListener('change', function() {
    document.getElementById('frekuensi-field').style.display = this.checked ? 'block' : 'none';
});
</script>
@endsection

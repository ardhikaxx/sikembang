@extends('layouts.ibu')

@section('title', 'Booking Baru - SIKEMBANG')

@section('main-content')
<h4 class="mb-4">Booking Baru</h4>

<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('ibu.booking.store') }}">
            @csrf
            <div class="mb-3">
                <label for="bidan_id" class="form-label">Pilih Bidan</label>
                <select class="form-select" id="bidan_id" name="bidan_id" required>
                    <option value="">Pilih Bidan...</option>
                    @foreach($bidans as $bidan)
                    <option value="{{ $bidan->id }}">{{ $bidan->nama_lengkap }} - {{ $bidan->profilBidan->instansi ?? '-' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_booking" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jam_booking" class="form-label">Jam</label>
                    <input type="time" class="form-control" id="jam_booking" name="jam_booking" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Kunjungan</label>
                <select class="form-select" id="jenis" name="jenis" required>
                    <option value="offline">Offline (Klinik/Puskesmas)</option>
                    <option value="online">Online (Konsultasi Video)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Booking</button>
            <a href="{{ route('ibu.booking.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

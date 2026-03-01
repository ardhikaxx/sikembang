@extends('layouts.bidan')

@section('title', 'Detail Konsultasi - SIKEMBANG')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4>{{ $konsultasi->judul }}</h4>
        <small class="text-muted">Ibu: {{ $konsultasi->ibu->nama_lengkap }}</small>
    </div>
    <div>
        @if($konsultasi->status == 'aktif')
        <a href="{{ route('bidan.konsultasi.selesai', $konsultasi->id) }}" class="btn btn-success" onclick="return confirm('Tandai selesai?')">Tandai Selesai</a>
        @endif
    </div>
</div>

<div class="card card-sikembang mb-4">
    <div class="card-body">
        <div class="chat-messages" style="max-height: 400px; overflow-y: auto;">
            @foreach($konsultasi->pesan as $pesan)
            <div class="d-flex mb-3 {{ $pesan->pengirim_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }}">
                <div class="{{ $pesan->pengirim_id == Auth::id() ? 'chat-bubble-bidan' : 'chat-bubble-ibu' }}">
                    <div class="small text-{{ $pesan->pengirim_id == Auth::id() ? 'mutted' : 'light' }} mb-1">
                        {{ $pesan->pengirim->nama_lengkap }}
                    </div>
                    <div>{{ $pesan->pesan }}</div>
                    <div class="small text-end mt-1">
                        {{ $pesan->created_at->format('H:i') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@if($konsultasi->status == 'aktif')
<div class="card card-sikembang">
    <div class="card-body">
        <form method="POST" action="{{ route('bidan.konsultasi.sendMessage', $konsultasi->id) }}">
            @csrf
            <div class="mb-3">
                <label for="pesan" class="form-label">Balas Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary-sikembang">Kirim</button>
        </form>
    </div>
</div>
@endif
@endsection

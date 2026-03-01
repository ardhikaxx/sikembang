@extends('layouts.ibu')

@section('title', 'Reminder - SIKEMBANG')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Reminder</h4>
    <a href="{{ route('ibu.reminder.create') }}" class="btn btn-primary-sikembang">
        <i class="fa-solid fa-plus me-2"></i>Tambah Reminder
    </a>
</div>

<div class="row">
    @forelse($reminders as $reminder)
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card card-sikembang">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title">{{ $reminder->judul }}</h5>
                        <span class="badge bg-{{ $reminder->jenis == 'kontrol' ? 'primary' : ($reminder->jenis == 'vitamin' ? 'success' : 'warning') }}">
                            {{ ucfirst($reminder->jenis) }}
                        </span>
                    </div>
                    @if($reminder->is_selesai)
                    <span class="badge bg-secondary">Selesai</span>
                    @endif
                </div>
                <p class="mt-2 mb-1">
                    <i class="fa-solid fa-calendar me-2"></i>{{ $reminder->tanggal->format('d-m-Y') }}
                    @if($reminder->jam)
                    <span class="ms-2"><i class="fa-solid fa-clock me-2"></i>{{ $reminder->jam }}</span>
                    @endif
                </p>
                @if($reminder->deskripsi)
                <p class="text-muted small">{{ $reminder->deskripsi }}</p>
                @endif
                @if(!$reminder->is_selesai)
                <div class="mt-2">
                    <a href="{{ route('ibu.reminder.complete', $reminder->id) }}" class="btn btn-sm btn-success">Tandai Selesai</a>
                    <a href="{{ route('ibu.reminder.destroy', $reminder->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-center text-muted">Belum ada reminder</p>
    </div>
    @endforelse
</div>
@endsection

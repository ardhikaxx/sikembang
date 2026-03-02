@extends('layouts.bidan')

@section('title', 'Edukasi - SIKEMBANG')

@section('main-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Kelola Edukasi</h4>
    <a href="{{ route('bidan.edukasi.create') }}" class="btn btn-primary-sikembang">
        <i class="fa-solid fa-plus me-2"></i>Tambah Konten
    </a>
</div>

<div class="card card-sikembang">
    <div class="card-body">
        @if($kontens->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover table-datatable" id="table-edukasi">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Trimester</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kontens as $konten)
                    <tr>
                        <td>{{ $konten->judul }}</td>
                        <td>{{ $konten->kategori->nama ?? '-' }}</td>
                        <td>{{ $konten->trimester == 'semua' ? 'Semua' : 'T-' . $konten->trimester }}</td>
                        <td>
                            @if($konten->is_published)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('bidan.edukasi.edit', $konten->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('bidan.edukasi.destroy', $konten->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-muted">Belum ada konten edukasi</p>
        @endif
    </div>
</div>
@endsection

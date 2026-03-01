@extends('layouts.main')

@section('title', 'Edit Profil - SIKEMBANG')

@section('main-content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-sikembang">
                <div class="card-header text-center">
                    <h4>Edit Profil</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('edit-profil') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                        </div>

                        @if ($user->role === 'ibu_hamil')
                        <hr>
                        <h5>Data Profil Ibu Hamil</h5>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional($profil)->tanggal_lahir ? optional($profil)->tanggal_lahir->format('Y-m-d') : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="hpht" class="form-label">HPHT (Hari Pertama Haid Terakhir)</label>
                            <input type="date" class="form-control" id="hpht" name="hpht" value="{{ old('hpht', optional($profil)->hpht ? optional($profil)->hpht->format('Y-m-d') : '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <select class="form-select" id="golongan_darah" name="golongan_darah">
                                <option value="">Pilih Golongan Darah</option>
                                <option value="A" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                                <option value="AB" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="O" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rhesus" class="form-label">Rhesus</label>
                            <select class="form-select" id="rhesus" name="rhesus">
                                <option value="">Pilih Rhesus</option>
                                <option value="+" {{ old('rhesus', optional($profil)->rhesus) == '+' ? 'selected' : '' }}>Positif (+)</option>
                                <option value="-" {{ old('rhesus', optional($profil)->rhesus) == '-' ? 'selected' : '' }}>Negatif (-)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="berat_sebelum" class="form-label">Berat Badan Sebelum Hamil (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="berat_sebelum" name="berat_sebelum" value="{{ old('berat_sebelum', optional($profil)->berat_sebelum) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ old('tinggi_badan', optional($profil)->tinggi_badan) }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', optional($profil)->alamat) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                            <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit">{{ old('riwayat_penyakit', optional($profil)->riwayat_penyakit) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="riwayat_alergi" class="form-label">Riwayat Alergi</label>
                            <textarea class="form-control" id="riwayat_alergi" name="riwayat_alergi">{{ old('riwayat_alergi', optional($profil)->riwayat_alergi) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kehamilan_ke" class="form-label">Kehamilan Ke-</label>
                            <input type="number" class="form-control" id="kehamilan_ke" name="kehamilan_ke" value="{{ old('kehamilan_ke', optional($profil)->kehamilan_ke) }}">
                        </div>
                        <div class="mb-3">
                            <label for="anak_hidup" class="form-label">Jumlah Anak Hidup</label>
                            <input type="number" class="form-control" id="anak_hidup" name="anak_hidup" value="{{ old('anak_hidup', optional($profil)->anak_hidup) }}">
                        </div>
                        <div class="mb-3">
                            <label for="keguguran" class="form-label">Riwayat Keguguran</label>
                            <input type="number" class="form-control" id="keguguran" name="keguguran" value="{{ old('keguguran', optional($profil)->keguguran) }}">
                        </div>
                        @elseif ($user->role === 'bidan')
                        <hr>
                        <h5>Data Profil Bidan</h5>
                        <div class="mb-3">
                            <label for="no_str" class="form-label">Nomor STR</label>
                            <input type="text" class="form-control" id="no_str" name="no_str" value="{{ old('no_str', optional($profil)->no_str) }}">
                        </div>
                        <div class="mb-3">
                            <label for="instansi" class="form-label">Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old('instansi', optional($profil)->instansi) }}">
                        </div>
                        <div class="mb-3">
                            <label for="spesialisasi" class="form-label">Spesialisasi</label>
                            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi', optional($profil)->spesialisasi) }}">
                        </div>
                        <div class="mb-3">
                            <label for="pengalaman_tahun" class="form-label">Pengalaman Tahun</label>
                            <input type="number" class="form-control" id="pengalaman_tahun" name="pengalaman_tahun" value="{{ old('pengalaman_tahun', optional($profil)->pengalaman_tahun) }}">
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio">{{ old('bio', optional($profil)->bio) }}</textarea>
                        </div>
                        {{-- Note: 'jadwal_praktek' is JSON, requires more complex handling for editing --}}
                        @endif

                        <button type="submit" class="btn btn-primary-sikembang">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

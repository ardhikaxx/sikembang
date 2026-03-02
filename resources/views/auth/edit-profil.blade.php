@extends($layout)

@section('title', 'Edit Profil - SIKEMBANG')

@section('main-content')
<div class="fade-in">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">Edit Profil</h4>
            <p class="text-muted mb-0">Kelola informasi profil Anda</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card card-sikembang">
                <div class="card-body">
                    <form action="{{ route('edit-profil') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control bg-light" id="email" value="{{ $user->email }}" disabled>
                                    <small class="text-muted">Email tidak dapat diubah</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="no_hp" class="form-label fw-semibold">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                                </div>
                            </div>
                        </div>

                        @if ($user->role === 'ibu_hamil')
                        <div class="section-header mt-4 mb-3">
                            <h5 class="fw-bold text-primary"><i class="fa-solid fa-person me-2"></i>Data Profil Ibu Hamil</h5>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional($profil)->tanggal_lahir ? optional($profil)->tanggal_lahir->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="hpht" class="form-label fw-semibold">HPHT (Hari Pertama Haid Terakhir)</label>
                                    <input type="date" class="form-control" id="hpht" name="hpht" value="{{ old('hpht', optional($profil)->hpht ? optional($profil)->hpht->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="golongan_darah" class="form-label fw-semibold">Golongan Darah</label>
                                    <select class="form-select" id="golongan_darah" name="golongan_darah">
                                        <option value="">Pilih Golongan Darah</option>
                                        <option value="A" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                                        <option value="AB" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                                        <option value="O" {{ old('golongan_darah', optional($profil)->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="rhesus" class="form-label fw-semibold">Rhesus</label>
                                    <select class="form-select" id="rhesus" name="rhesus">
                                        <option value="">Pilih Rhesus</option>
                                        <option value="+" {{ old('rhesus', optional($profil)->rhesus) == '+' ? 'selected' : '' }}>Positif (+)</option>
                                        <option value="-" {{ old('rhesus', optional($profil)->rhesus) == '-' ? 'selected' : '' }}>Negatif (-)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="berat_sebelum" class="form-label fw-semibold">Berat Badan Sebelum Hamil (kg)</label>
                                    <input type="number" step="0.01" class="form-control" id="berat_sebelum" name="berat_sebelum" value="{{ old('berat_sebelum', optional($profil)->berat_sebelum) }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="tinggi_badan" class="form-label fw-semibold">Tinggi Badan (cm)</label>
                                    <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ old('tinggi_badan', optional($profil)->tinggi_badan) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="kehamilan_ke" class="form-label fw-semibold">Kehamilanan Ke-</label>
                                    <input type="number" class="form-control" id="kehamilan_ke" name="kehamilan_ke" value="{{ old('kehamilan_ke', optional($profil)->kehamilan_ke) }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="anak_hidup" class="form-label fw-semibold">Jumlah Anak Hidup</label>
                                    <input type="number" class="form-control" id="anak_hidup" name="anak_hidup" value="{{ old('anak_hidup', optional($profil)->anak_hidup) }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="keguguran" class="form-label fw-semibold">Riwayat Keguguran</label>
                                <input type="number" class="form-control" id="keguguran" name="keguguran" value="{{ old('keguguran', optional($profil)->keguguran) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', optional($profil)->alamat) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="riwayat_penyakit" class="form-label fw-semibold">Riwayat Penyakit</label>
                                <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" rows="2" placeholder="Contoh: Diabetes, Hipertensi, dll">{{ old('riwayat_penyakit', optional($profil)->riwayat_penyakit) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="riwayat_alergi" class="form-label fw-semibold">Riwayat Alergi</label>
                                <textarea class="form-control" id="riwayat_alergi" name="riwayat_alergi" rows="2" placeholder="Contoh: Alergi obat, makanan, dll">{{ old('riwayat_alergi', optional($profil)->riwayat_alergi) }}</textarea>
                            </div>
                        </div>
                        @elseif ($user->role === 'bidan')
                        <div class="section-header mt-4 mb-3">
                            <h5 class="fw-bold text-primary"><i class="fa-solid fa-user-nurse me-2"></i>Data Profil Bidan</h5>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="no_str" class="form-label fw-semibold">Nomor STR</label>
                                    <input type="text" class="form-control" id="no_str" name="no_str" value="{{ old('no_str', optional($profil)->no_str) }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="instansi" class="form-label fw-semibold">Instansi</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old('instansi', optional($profil)->instansi) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="spesialisasi" class="form-label fw-semibold">Spesialisasi</label>
                                    <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi', optional($profil)->spesialisasi) }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="pengalaman_tahun" class="form-label fw-semibold">Pengalaman (Tahun)</label>
                                    <input type="number" class="form-control" id="pengalaman_tahun" name="pengalaman_tahun" value="{{ old('pengalaman_tahun', optional($profil)->pengalaman_tahun) }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-group">
                                <label for="bio" class="form-label fw-semibold">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Ceritakan tentang diri Anda...">{{ old('bio', optional($profil)->bio) }}</textarea>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary-sikembang">
                                <i class="fa-solid fa-save me-2"></i>Simpan Perubahan
                            </button>
                            <a href="{{ route('bidan.dashboard') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-sikembang">
                <div class="card-body text-center">
                    <div class="avatar-lg mx-auto mb-3">
                        {{ substr($user->nama_lengkap, 0, 2) }}
                    </div>
                    <h5 class="fw-bold">{{ $user->nama_lengkap }}</h5>
                    <p class="text-muted mb-1">{{ $user->email }}</p>
                    <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                </div>
            </div>

            <div class="card card-sikembang mt-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-3"><i class="fa-solid fa-circle-info me-2"></i>Informasi Profil</h6>
                    <p class="text-muted small mb-2">Pastikan data profil Anda selalu terbaru untuk mendapatkan informasi yang akurat.</p>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Data ibu hamil diperlukan untuk perhitungan risiko</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i>Informasi kontak untuk notifikasi</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Riwayat kesehatan untuk konsultasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

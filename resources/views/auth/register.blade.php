@extends('layouts.main')

@section('title', 'Register - SIKEMBANG')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card card-sikembang">
                <div class="card-header-primary text-center py-3">
                    <h4 class="mb-0"><i class="fa-solid fa-heart-pulse me-2"></i>SIKEMBANG</h4>
                    <p class="mb-0">Sistem Konsultasi & Edukasi Ibu Hamil</p>
                </div>
                <div class="card-body p-4">
                    <h5 class="text-center mb-4">Daftar Akun</h5>
                    
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Daftar sebagai</label>
                                <select class="form-select" id="role" name="role" required onchange="toggleFormFields()">
                                    <option value="">Pilih role...</option>
                                    <option value="ibu_hamil">Ibu Hamil</option>
                                    <option value="bidan">Bidan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_hp" class="form-label">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div id="ibu-fields" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="hpht" class="form-label">HPHT (Hari Pertama Haid Terakhir)</label>
                                    <input type="date" class="form-control" id="hpht" name="hpht">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                    <select class="form-select" id="golongan_darah" name="golongan_darah">
                                        <option value="">Pilih...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rhesus" class="form-label">Rhesus</label>
                                    <select class="form-select" id="rhesus" name="rhesus">
                                        <option value="">Pilih...</option>
                                        <option value="+">Positif (+)</option>
                                        <option value="-">Negatif (-)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                                <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" rows="2" placeholder="Contoh: Diabetes, Hipertensi, dll"></textarea>
                            </div>
                        </div>

                        <div id="bidan-fields" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="no_str" class="form-label">No. STR</label>
                                    <input type="text" class="form-control" id="no_str" name="no_str">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="instansi" class="form-label">Instansi</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Puskesmas/RS/Klinik">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-sikembang w-100">Daftar</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none" style="color: var(--primary);">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFormFields() {
    const role = document.getElementById('role').value;
    const ibuFields = document.getElementById('ibu-fields');
    const bidanFields = document.getElementById('bidan-fields');
    
    if (role === 'ibu_hamil') {
        ibuFields.style.display = 'block';
        bidanFields.style.display = 'none';
    } else if (role === 'bidan') {
        ibuFields.style.display = 'none';
        bidanFields.style.display = 'block';
    } else {
        ibuFields.style.display = 'none';
        bidanFields.style.display = 'none';
    }
}
</script>
@endsection

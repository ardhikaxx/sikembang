@extends('layouts.main')

@section('title', 'Register - SIKEMBANG')

@section('content')
<style>
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 50%, #f9a8d4 100%);
        padding: 30px 20px;
        position: relative;
        overflow: hidden;
    }

    .auth-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 60%);
        animation: pulse 15s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .auth-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(236, 30, 136, 0.2);
        overflow: hidden;
        position: relative;
        z-index: 1;
        max-width: 700px;
        width: 100%;
    }

    .auth-header {
        background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
        padding: 40px 30px;
        text-align: center;
        position: relative;
    }

    .auth-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 30px;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='rgba(255,255,255,0.95)' fill-opacity='1' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E") no-repeat bottom;
        background-size: cover;
    }

    .auth-header i {
        font-size: 3.5rem;
        margin-bottom: 15px;
        animation: heartbeat 2s infinite;
    }

    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .auth-body {
        padding: 35px;
    }

    .form-control, .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .form-control:focus, .form-select:focus {
        border-color: #EC1E88;
        box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
        background: #fff;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 0.85rem;
    }

    .btn-auth {
        background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
        border: none;
        color: white;
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(236, 30, 136, 0.3);
    }

    .btn-auth:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(236, 30, 136, 0.4);
    }

    .auth-link {
        color: #EC1E88;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .auth-link:hover {
        color: #c4166e;
    }

    .role-selector {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }

    .role-option {
        flex: 1;
        padding: 20px;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .role-option:hover {
        border-color: #EC1E88;
        background: #fce4f3;
    }

    .role-option.active {
        border-color: #EC1E88;
        background: linear-gradient(135deg, #fce4f3 0%, #f9a8d4 100%);
        box-shadow: 0 4px 15px rgba(236, 30, 136, 0.2);
    }

    .role-option i {
        font-size: 2rem;
        color: #EC1E88;
        margin-bottom: 8px;
    }

    .role-option h6 {
        margin: 0;
        color: #374151;
        font-weight: 600;
    }

    .form-section {
        background: #f9fafb;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .form-section-title {
        font-weight: 600;
        color: #EC1E88;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .alert {
        border-radius: 12px;
    }
</style>

<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <i class="fa-solid fa-hands-holding-child text-white"></i>
            <h3 class="text-white fw-bold mb-2">SIKEMBANG</h3>
            <p class="text-white opacity-75 mb-0">Sistem Konsultasi & Edukasi Ibu Hamil</p>
        </div>
        <div class="auth-body">
            <h5 class="text-center mb-4 fw-bold">Buat Akun Baru</h5>
            
            @if(session('success'))
            <div class="alert alert-success border-0" style="border-left: 4px solid #10b981;">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger border-0" style="border-left: 4px solid #ef4444;">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="role-selector">
                    <div class="role-option" onclick="selectRole('ibu_hamil')" id="role-ibu">
                        <i class="fa-solid fa-person-pregnant"></i>
                        <h6>Ibu Hamil</h6>
                    </div>
                    <div class="role-option" onclick="selectRole('bidan')" id="role-bidan">
                        <i class="fa-solid fa-user-nurse"></i>
                        <h6>Bidan</h6>
                    </div>
                </div>
                <input type="hidden" name="role" id="selected-role" value="">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Min. 8 karakter" required minlength="8">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan kembali password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div id="ibu-fields" style="display: none;">
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fa-solid fa-person-pregnant"></i> Data Kehamilan
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="hpht" class="form-label">HPHT</label>
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
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat lengkap"></textarea>
                        </div>
                        <div class="mb-0">
                            <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                            <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" rows="2" placeholder="Contoh: Diabetes, Hipertensi, dll"></textarea>
                        </div>
                    </div>
                </div>

                <div id="bidan-fields" style="display: none;">
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fa-solid fa-user-nurse"></i> Data Profesi
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="no_str" class="form-label">No. STR</label>
                                <input type="text" class="form-control" id="no_str" name="no_str" placeholder="No. Surat Tanda Registrasi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="instansi" class="form-label">Instansi</label>
                                <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Puskesmas/RS/Klinik">
                            </div>
                        </div>
                        <div class="mb-0">
                            <label for="spesialisasi" class="form-label">Spesialisasi</label>
                            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Contoh: Kebidanan, Kandungan">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-auth w-100">Daftar Sekarang</button>
            </form>
            
            <div class="text-center mt-4">
                <p class="text-muted mb-0">Sudah punya akun? 
                    <a href="{{ route('login') }}" class="auth-link">Login di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function selectRole(role) {
    document.getElementById('selected-role').value = role;
    
    document.querySelectorAll('.role-option').forEach(el => el.classList.remove('active'));
    document.getElementById('role-' + role).classList.add('active');
    
    toggleFormFields();
}

function toggleFormFields() {
    const role = document.getElementById('selected-role').value;
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

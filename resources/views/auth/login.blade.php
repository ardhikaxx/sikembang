@extends('layouts.main')

@section('title', 'Login - SIKEMBANG')

@section('content')
<style>
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fdf2f8 0%, #fce4f3 50%, #f9a8d4 100%);
        padding: 20px;
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
        max-width: 480px;
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
        padding: 40px 35px;
    }

    .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .form-control:focus {
        border-color: #EC1E88;
        box-shadow: 0 0 0 4px rgba(236, 30, 136, 0.1);
        background: #fff;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 0.9rem;
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

    .input-group-text {
        background: transparent;
        border: 2px solid #e5e7eb;
        border-left: none;
        border-radius: 0 12px 12px 0;
        color: #9ca3af;
    }

    .input-group .form-control {
        border-right: none;
        border-radius: 12px 0 0 12px;
    }

    .password-toggle {
        cursor: pointer;
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
            <h5 class="text-center mb-4 fw-bold">Selamat Datang</h5>
            
            @if(session('error'))
            <div class="alert alert-danger border-0" style="border-left: 4px solid #ef4444;">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                        <span class="input-group-text">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        <span class="input-group-text password-toggle" onclick="togglePassword()">
                            <i class="fa-regular fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-auth w-100">Masuk</button>
            </form>
            
            <div class="text-center mt-4">
                <p class="text-muted mb-0">Belum punya akun? 
                    <a href="{{ route('register') }}" class="auth-link">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
</script>
@endsection

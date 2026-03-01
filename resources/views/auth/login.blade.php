@extends('layouts.main')

@section('title', 'Login - SIKEMBANG')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 col-lg-5">
            <div class="card card-sikembang">
                <div class="card-header-primary text-center py-3">
                    <h4 class="mb-0"><i class="fa-solid fa-heart-pulse me-2"></i>SIKEMBANG</h4>
                    <p class="mb-0">Sistem Konsultasi & Edukasi Ibu Hamil</p>
                </div>
                <div class="card-body p-4">
                    <h5 class="text-center mb-4">Login</h5>
                    
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary-sikembang w-100">Login</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none" style="color: var(--primary);">Daftar di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

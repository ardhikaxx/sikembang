@extends('layouts.main')

@php
$user = Auth::user();
@endphp

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse show" id="sidebarMenu">
            <div class="position-sticky pt-3 pb-3">
                <div class="sidebar-brand mb-4">
                    <div class="brand-container">
                        <div class="brand-icon">
                            <i class="fa-solid fa-hands-holding-child"></i>
                        </div>
                        <div class="brand-text">
                            <span class="brand-name">SIKEMBANG</span>
                            <span class="brand-tagline">Sistem Ibu Hamil</span>
                        </div>
                    </div>
                </div>

                <div class="user-card">
                    <div class="user-avatar">
                        {{ substr($user->nama_lengkap, 0, 2) }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ $user->nama_lengkap }}</div>
                        <div class="user-role">
                            <i class="fa-solid fa-user-nurse me-1"></i>Bidan
                        </div>
                    </div>
                </div>

                <div class="nav-menu mt-4">
                    <div class="nav-label">Menu Utama</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.dashboard') ? 'active' : '' }}" href="{{ route('bidan.dashboard') }}">
                                <span class="nav-icon"><i class="fa-solid fa-house"></i></span>
                                <span class="nav-text">Dashboard</span>
                                @if(request()->routeIs('bidan.dashboard'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.data-ibu.*') ? 'active' : '' }}" href="{{ route('bidan.data-ibu.index') }}">
                                <span class="nav-icon"><i class="fa-solid fa-users"></i></span>
                                <span class="nav-text">Data Ibu</span>
                                @if(request()->routeIs('bidan.data-ibu.*'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.konsultasi.*') ? 'active' : '' }}" href="{{ route('bidan.konsultasi.index') }}">
                                <span class="nav-icon"><i class="fa-solid fa-comments"></i></span>
                                <span class="nav-text">Konsultasi</span>
                                @if(request()->routeIs('bidan.konsultasi.*'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.booking.*') ? 'active' : '' }}" href="{{ route('bidan.booking.index') }}">
                                <span class="nav-icon"><i class="fa-solid fa-calendar-check"></i></span>
                                <span class="nav-text">Booking</span>
                                @if(request()->routeIs('bidan.booking.*'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.edukasi.*') ? 'active' : '' }}" href="{{ route('bidan.edukasi.index') }}">
                                <span class="nav-icon"><i class="fa-solid fa-book-open-reader"></i></span>
                                <span class="nav-text">Edukasi</span>
                                @if(request()->routeIs('bidan.edukasi.*'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.risiko.*') ? 'active' : '' }}" href="{{ route('bidan.risiko.index') }}">
                                <span class="nav-icon"><i class="fa-solid fa-clipboard-check"></i></span>
                                <span class="nav-text">Penilaian Risiko</span>
                                @if(request()->routeIs('bidan.risiko.*'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bidan.laporan.*') ? 'active' : '' }}" href="{{ route('bidan.laporan.index') }}">
                                <span class="nav-icon"><i class="fa-solid fa-chart-bar"></i></span>
                                <span class="nav-text">Laporan</span>
                                @if(request()->routeIs('bidan.laporan.*'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                    </ul>

                    <div class="nav-label mt-4">Pengaturan</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('edit-profil') ? 'active' : '' }}" href="{{ route('edit-profil') }}">
                                <span class="nav-icon"><i class="fa-solid fa-circle-user"></i></span>
                                <span class="nav-text">Profil</span>
                                @if(request()->routeIs('edit-profil'))
                                <span class="nav-indicator"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                                <span class="nav-text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            @yield('main-content')
        </main>
    </div>
</div>

<style>
.sidebar {
    background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
    min-height: 100vh;
    color: #ffffff;
    position: relative;
    overflow: hidden;
}

.sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(236, 30, 136, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 80% 80%, rgba(236, 30, 136, 0.08) 0%, transparent 40%);
    pointer-events: none;
}

.sidebar-brand {
    padding: 0 16px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.brand-container {
    display: flex;
    align-items: center;
    gap: 12px;
}

.brand-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    box-shadow: 0 4px 15px rgba(236, 30, 136, 0.4);
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
    letter-spacing: 0.5px;
}

.brand-tagline {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.user-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px;
    margin: 20px 12px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.user-avatar {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    color: white;
    text-transform: uppercase;
}

.user-info {
    flex: 1;
    min-width: 0;
}

.user-name {
    font-weight: 600;
    color: white;
    font-size: 0.9rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-role {
    font-size: 0.75rem;
    color: rgba(255, 255, 255, 0.5);
    display: flex;
    align-items: center;
}

.nav-menu {
    padding: 0 8px;
}

.nav-label {
    font-size: 0.65rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: rgba(255, 255, 255, 0.35);
    padding: 0 12px;
    margin-bottom: 8px;
    font-weight: 600;
}

.nav-item {
    margin-bottom: 4px;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border-radius: 10px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-weight: 500;
    font-size: 0.9rem;
}

.nav-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    background: linear-gradient(135deg, #EC1E88 0%, #c4166e 100%);
    border-radius: 0 4px 4px 0;
    transition: width 0.3s ease;
    opacity: 0;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.08);
    color: white;
}

.nav-link.active {
    background: linear-gradient(135deg, rgba(236, 30, 136, 0.2) 0%, rgba(196, 22, 110, 0.2) 100%);
    color: white;
}

.nav-link.active::before {
    width: 4px;
    height: 60%;
    opacity: 1;
}

.nav-link.active .nav-icon {
    color: #EC1E88;
}

.nav-icon {
    width: 20px;
    text-align: center;
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.6);
    transition: color 0.3s ease;
}

.nav-text {
    flex: 1;
}

.nav-indicator {
    width: 8px;
    height: 8px;
    background: #EC1E88;
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.8); }
}

.logout-link {
    color: rgba(255, 100, 100, 0.8);
}

.logout-link:hover {
    background: rgba(255, 0, 0, 0.1);
    color: #ff6b6b;
}

.logout-link .nav-icon {
    color: rgba(255, 100, 100, 0.8);
}
</style>
@endsection

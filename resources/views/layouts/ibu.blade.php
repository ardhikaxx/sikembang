@extends('layouts.main')

@php
$user = Auth::user();
@endphp

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse show" id="sidebarMenu">
            <div class="position-sticky pt-3">
                <div class="text-center mb-4">
                    <h5><i class="fa-solid fa-heart-pulse me-2"></i>SIKEMBANG</h5>
                    <small>{{ $user->nama_lengkap }}</small>
                </div>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibu.dashboard') }}">
                            <i class="fa-solid fa-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibu.konsultasi.index') }}">
                            <i class="fa-solid fa-comments"></i> Konsultasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibu.booking.index') }}">
                            <i class="fa-solid fa-calendar-check"></i> Booking
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibu.edukasi.index') }}">
                            <i class="fa-solid fa-book-open-reader"></i> Edukasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibu.catatan.index') }}">
                            <i class="fa-solid fa-notebook"></i> Catatan Kehamilan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibu.reminder.index') }}">
                            <i class="fa-solid fa-bell"></i> Reminder
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('edit-profil') }}">
                            <i class="fa-solid fa-circle-user"></i> Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>
                    </li>
                </ul>
                
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
@endsection

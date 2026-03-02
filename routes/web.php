<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Ibu\DashboardController as IbuDashboardController;
use App\Http\Controllers\Ibu\KonsultasiController as IbuKonsultasiController;
use App\Http\Controllers\Ibu\BookingController as IbuBookingController;
use App\Http\Controllers\Ibu\EdukasiController as IbuEdukasiController;
use App\Http\Controllers\Ibu\CatatanController as IbuCatatanController;
use App\Http\Controllers\Ibu\ReminderController as IbuReminderController;
use App\Http\Controllers\Bidan\DashboardController as BidanDashboardController;
use App\Http\Controllers\Bidan\DataIbuController as BidanDataIbuController;
use App\Http\Controllers\Bidan\KonsultasiController as BidanKonsultasiController;
use App\Http\Controllers\Bidan\BookingController as BidanBookingController;
use App\Http\Controllers\Bidan\EdukasiController as BidanEdukasiController;
use App\Http\Controllers\Bidan\RisikoController as BidanRisikoController;
use App\Http\Controllers\Bidan\LaporanController as BidanLaporanController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/edit-profil', [AuthController::class, 'editProfil'])->name('edit-profil');
Route::post('/edit-profil', [AuthController::class, 'updateProfil']);

// Ibu Routes
Route::prefix('ibu')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [IbuDashboardController::class, 'index'])->name('ibu.dashboard');
    
    Route::get('/konsultasi', [IbuKonsultasiController::class, 'index'])->name('ibu.konsultasi.index');
    Route::get('/konsultasi/create', [IbuKonsultasiController::class, 'create'])->name('ibu.konsultasi.create');
    Route::post('/konsultasi', [IbuKonsultasiController::class, 'store'])->name('ibu.konsultasi.store');
    Route::get('/konsultasi/{id}', [IbuKonsultasiController::class, 'detail'])->name('ibu.konsultasi.detail');
    Route::post('/konsultasi/{id}', [IbuKonsultasiController::class, 'sendMessage'])->name('ibu.konsultasi.sendMessage');
    
    Route::get('/booking', [IbuBookingController::class, 'index'])->name('ibu.booking.index');
    Route::get('/booking/create', [IbuBookingController::class, 'create'])->name('ibu.booking.create');
    Route::post('/booking', [IbuBookingController::class, 'store'])->name('ibu.booking.store');
    
    Route::get('/edukasi', [IbuEdukasiController::class, 'index'])->name('ibu.edukasi.index');
    Route::get('/edukasi/{id}', [IbuEdukasiController::class, 'detail'])->name('ibu.edukasi.detail');
    
    Route::get('/catatan', [IbuCatatanController::class, 'index'])->name('ibu.catatan.index');
    Route::get('/catatan/create', [IbuCatatanController::class, 'create'])->name('ibu.catatan.create');
    Route::post('/catatan', [IbuCatatanController::class, 'store'])->name('ibu.catatan.store');
    
    Route::get('/reminder', [IbuReminderController::class, 'index'])->name('ibu.reminder.index');
    Route::get('/reminder/create', [IbuReminderController::class, 'create'])->name('ibu.reminder.create');
    Route::post('/reminder', [IbuReminderController::class, 'store'])->name('ibu.reminder.store');
    Route::get('/reminder/{id}/complete', [IbuReminderController::class, 'complete'])->name('ibu.reminder.complete');
    Route::get('/reminder/{id}/destroy', [IbuReminderController::class, 'destroy'])->name('ibu.reminder.destroy');
});

// Bidan Routes
Route::prefix('bidan')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BidanDashboardController::class, 'index'])->name('bidan.dashboard');
    
    Route::get('/data-ibu', [BidanDataIbuController::class, 'index'])->name('bidan.data-ibu.index');
    Route::get('/data-ibu/{id}', [BidanDataIbuController::class, 'detail'])->name('bidan.data-ibu.detail');
    
    Route::get('/konsultasi', [BidanKonsultasiController::class, 'index'])->name('bidan.konsultasi.index');
    Route::get('/konsultasi/{id}', [BidanKonsultasiController::class, 'detail'])->name('bidan.konsultasi.detail');
    Route::post('/konsultasi/{id}', [BidanKonsultasiController::class, 'sendMessage'])->name('bidan.konsultasi.sendMessage');
    Route::get('/konsultasi/{id}/selesai', [BidanKonsultasiController::class, 'selesai'])->name('bidan.konsultasi.selesai');
    
    Route::get('/booking', [BidanBookingController::class, 'index'])->name('bidan.booking.index');
    Route::get('/booking/{id}/terima', [BidanBookingController::class, 'terima'])->name('bidan.booking.terima');
    Route::get('/booking/{id}/tolak', [BidanBookingController::class, 'tolakSimple'])->name('bidan.booking.tolak');
    Route::post('/booking/{id}/tolak', [BidanBookingController::class, 'tolak'])->name('bidan.booking.tolak.post');
    Route::post('/booking/{id}/jadwal-ulang', [BidanBookingController::class, 'jadwalUlang'])->name('bidan.booking.jadwal-ulang');
    Route::get('/booking/{id}/selesai', [BidanBookingController::class, 'selesai'])->name('bidan.booking.selesai');
    
    Route::get('/edukasi', [BidanEdukasiController::class, 'index'])->name('bidan.edukasi.index');
    Route::get('/edukasi/create', [BidanEdukasiController::class, 'create'])->name('bidan.edukasi.create');
    Route::post('/edukasi', [BidanEdukasiController::class, 'store'])->name('bidan.edukasi.store');
    Route::get('/edukasi/{id}/edit', [BidanEdukasiController::class, 'edit'])->name('bidan.edukasi.edit');
    Route::put('/edukasi/{id}', [BidanEdukasiController::class, 'update'])->name('bidan.edukasi.update');
    Route::delete('/edukasi/{id}', [BidanEdukasiController::class, 'destroy'])->name('bidan.edukasi.destroy');
    
    Route::get('/risiko', [BidanRisikoController::class, 'index'])->name('bidan.risiko.index');
    Route::get('/risiko/{id}', [BidanRisikoController::class, 'penilaian'])->name('bidan.risiko.penilaian');
    Route::post('/risiko/{id}', [BidanRisikoController::class, 'simpanPenilaian'])->name('bidan.risiko.simpan');
    Route::post('/risiko/hitung', [BidanRisikoController::class, 'hitungSkorRisiko'])->name('bidan.risiko.hitung');
    
    Route::get('/laporan', [BidanLaporanController::class, 'index'])->name('bidan.laporan.index');
    Route::get('/laporan/konsultasi', [BidanLaporanController::class, 'rekapKonsultasi'])->name('bidan.laporan.konsultasi');
    Route::get('/laporan/risiko', [BidanLaporanController::class, 'dataIbuRisiko'])->name('bidan.laporan.risiko');
    Route::get('/laporan/booking', [BidanLaporanController::class, 'bookingStatus'])->name('bidan.laporan.booking');
    Route::get('/laporan/distribusi', [BidanLaporanController::class, 'distribusiUsiaKehamilan'])->name('bidan.laporan.distribusi');
});

<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\Booking;
use App\Models\PenilaianRisiko;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalIbu = User::where('role', 'ibu_hamil')
            ->where('is_aktif', true)
            ->count();

        $konsultasiAktif = Konsultasi::where('bidan_id', $user->id)
            ->where('status', 'aktif')
            ->count();

        $bookingMenunggu = Booking::where('bidan_id', $user->id)
            ->where('status', 'menunggu')
            ->count();

        $notifikasiCount = Notifikasi::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        $bookingTerbaru = Booking::where('bidan_id', $user->id)
            ->with('ibu')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $konsultasiTerbaru = Konsultasi::where('bidan_id', $user->id)
            ->where('status', 'aktif')
            ->with('ibu')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $ibuRisikoTinggi = PenilaianRisiko::where('kategori_risiko', 'tinggi')
            ->with('ibu.profilIbuHamil')
            ->orderBy('tanggal_penilaian', 'desc')
            ->limit(5)
            ->get();

        return view('bidan.dashboard', compact(
            'totalIbu',
            'konsultasiAktif',
            'bookingMenunggu',
            'notifikasiCount',
            'bookingTerbaru',
            'konsultasiTerbaru',
            'ibuRisikoTinggi'
        ));
    }
}

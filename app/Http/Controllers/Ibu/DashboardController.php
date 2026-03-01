<?php

namespace App\Http\Controllers\Ibu;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\PesanKonsultasi;
use App\Models\Booking;
use App\Models\CatatanKehamilan;
use App\Models\Reminder;
use App\Models\Notifikasi;
use App\Models\KontenEdukasi;
use App\Models\PenilaianRisiko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profil = $user->profilIbuHamil;

        $usiaKehamilan = null;
        $trimester = null;
        $hariTersisaHPL = null;

        if ($profil && $profil->hpht) {
            $hpht = new \DateTime($profil->hpht);
            $today = new \DateTime();
            $diff = $hpht->diff($today);
            $totalDays = $diff->days;
            $usiaKehamilan = [
                'minggu' => floor($totalDays / 7),
                'hari' => $totalDays % 7
            ];

            if ($usiaKehamilan['minggu'] <= 13) {
                $trimester = 1;
            } elseif ($usiaKehamilan['minggu'] <= 27) {
                $trimester = 2;
            } else {
                $trimester = 3;
            }

            if ($profil->hpl) {
                $hpl = new \DateTime($profil->hpl);
                $hariTersisaHPL = $today->diff($hpl)->days;
            }
        }

        $bookingBerikutnya = Booking::where('ibu_id', $user->id)
            ->where('status', 'diterima')
            ->where('tanggal_booking', '>=', now()->format('Y-m-d'))
            ->orderBy('tanggal_booking')
            ->first();

        $reminderHariIni = Reminder::where('ibu_id', $user->id)
            ->where('tanggal', now()->format('Y-m-d'))
            ->where('is_selesai', false)
            ->where('is_aktif', true)
            ->get();

        $notifikasiCount = Notifikasi::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        return view('ibu.dashboard', compact(
            'profil',
            'usiaKehamilan',
            'trimester',
            'hariTersisaHPL',
            'bookingBerikutnya',
            'reminderHariIni',
            'notifikasiCount'
        ));
    }
}

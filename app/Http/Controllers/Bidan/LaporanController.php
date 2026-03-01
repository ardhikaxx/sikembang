<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\Booking;
use App\Models\PenilaianRisiko;
use App\Models\CatatanKehamilton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('bidan.laporan.index');
    }

    public function rekapKonsultasi(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        $konsultasis = Konsultasi::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->with(['ibu', 'bidan'])
            ->get();

        return view('bidan.laporan.konsultasi', compact('konsultasis', 'bulan', 'tahun'));
    }

    public function dataIbuRisiko()
    {
        $risikoRendah = PenilaianRisiko::where('kategori_risiko', 'rendah')
            ->distinct()
            ->count('ibu_id');

        $risikoSedang = PenilaianRisiko::where('kategori_risiko', 'sedang')
            ->distinct()
            ->count('ibu_id');

        $risikoTinggi = PenilaianRisiko::where('kategori_risiko', 'tinggi')
            ->distinct()
            ->count('ibu_id');

        return view('bidan.laporan.risiko', compact('risikoRendah', 'risikoSedang', 'risikoTinggi'));
    }

    public function bookingStatus()
    {
        $statusBooking = Booking::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return view('bidan.laporan.booking', compact('statusBooking'));
    }

    public function distribusiUsiaKehamilanan()
    {
        $ibus = User::where('role', 'ibu_hamil')
            ->where('is_aktif', true)
            ->with('profilIbuHamil')
            ->get();

        $distribusi = [
            'trimester1' => 0,
            'trimester2' => 0,
            'trimester3' => 0,
        ];

        foreach ($ibus as $ibu) {
            if ($ibu->profilIbuHamil && $ibu->profilIbuHamil->hpht) {
                $hpht = new \DateTime($ibu->profilIbuHamil->hpht);
                $today = new \DateTime();
                $diff = $hpht->diff($today);
                $minggu = floor($diff->days / 7);

                if ($minggu <= 13) {
                    $distribusi['trimester1']++;
                } elseif ($minggu <= 27) {
                    $distribusi['trimester2']++;
                } else {
                    $distribusi['trimester3']++;
                }
            }
        }

        return view('bidan.laporan.distribusi', compact('distribusi'));
    }
}

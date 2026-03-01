<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PenilaianRisiko;
use App\Models\CatatanKehamilan;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class DataIbuController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'ibu_hamil')
            ->where('is_aktif', true)
            ->with('profilIbuHamil');

        if ($request->risiko) {
            $ibuIds = PenilaianRisiko::where('kategori_risiko', $request->risiko)
                ->distinct()
                ->pluck('ibu_id');
            $query->whereIn('id', $ibuIds);
        }

        $ibus = $query->orderBy('created_at', 'desc')->get();

        return view('bidan.data-ibu.index', compact('ibus'));
    }

    public function detail($id)
    {
        $ibu = User::where('role', 'ibu_hamil')
            ->with('profilIbuHamil')
            ->findOrFail($id);

        $catatans = CatatanKehamilan::where('ibu_id', $id)
            ->orderBy('tanggal_periksa', 'desc')
            ->get();

        $konsultasis = Konsultasi::where('ibu_id', $id)
            ->with('bidan')
            ->orderBy('created_at', 'desc')
            ->get();

        $penilaianRisiko = PenilaianRisiko::where('ibu_id', $id)
            ->with('bidan')
            ->orderBy('tanggal_penilaian', 'desc')
            ->get();

        return view('bidan.data-ibu.detail', compact('ibu', 'catatans', 'konsultasis', 'penilaianRisiko'));
    }
}

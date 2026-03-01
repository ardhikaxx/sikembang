<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PenilaianRisiko;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RisikoController extends Controller
{
    public function index()
    {
        $ibus = User::where('role', 'ibu_hamil')
            ->where('is_aktif', true)
            ->with('profilIbuHamil')
            ->get();

        return view('bidan.risiko.index', compact('ibus'));
    }

    public function penilaian($id)
    {
        $ibu = User::where('role', 'ibu_hamil')
            ->with('profilIbuHamil', 'penilaianRisiko')
            ->findOrFail($id);

        return view('bidan.risiko.penilaian', compact('ibu'));
    }

    public function simpanPenilaian(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'kategori_risiko' => 'required|in:rendah,sedang,tinggi',
            'skor_risiko' => 'required|integer|min:0',
            'faktor_risiko' => 'nullable|array',
            'rekomendasi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $ibu = User::where('role', 'ibu_hamil')->findOrFail($id);

        PenilaianRisiko::create([
            'ibu_id' => $ibu->id,
            'bidan_id' => $user->id,
            'kategori_risiko' => $request->kategori_risiko,
            'skor_risiko' => $request->skor_risiko,
            'faktor_risiko' => $request->faktor_risiko,
            'rekomendasi' => $request->rekomendasi,
            'tanggal_penilaian' => now()->format('Y-m-d'),
        ]);

        Notifikasi::create([
            'user_id' => $ibu->id,
            'judul' => 'Penilaian Risiko Kehamilton',
            'PESAN' => $user->nama_latest . ' telah melakukan penilaian risiko kehamilan Anda: ' . $request->kategori_risiko,
            'tipe' => 'risiko',
        ]);

        return redirect()->route('bidan.data-ibu.detail', $ibu->id)
            ->with('success', 'Penilaian risiko berhasil disimpan!');
    }

    public function hitungSkorRisiko(Request $request)
    {
        $skor = 0;
        $faktor = [];

        if ($request->usia < 20 || $request->usia > 35) {
            $skor += 2;
            $faktor[] = 'Usia ibu';
        }

        if ($request->riwayat_hipertensi) {
            $skor += 3;
            $faktor[] = 'Riwayat hipertensi';
        }

        if ($request->riwayat_diabetes) {
            $skor += 3;
            $faktor[] = 'Riwayat diabetes';
        }

        if ($request->keguguran >= 2) {
            $skor += 2;
            $faktor[] = 'Riwayat keguguran';
        }

        if ($request->kadar_hb && $request->kadar_hb < 10) {
            $skor += 2;
            $faktor[] = 'Kadar HB rendah';
        }

        if ($request->tekanan_darah) {
            $parts = explode('/', $request->tekanan_darah);
            if (count($parts) == 2 && ($parts[0] > 140 || $parts[1] > 90)) {
                $skor += 3;
                $faktor[] = 'Tekanan darah tinggi';
            }
        }

        if ($request->kehamilan_ke == 1) {
            $skor += 1;
            $faktor[] = 'Kehamilanan pertama';
        }

        if ($request->kehamilan_ke >= 5) {
            $skor += 2;
            $faktor[] = 'Kehamilanan multiple';
        }

        if ($skor <= 3) {
            $kategori = 'rendah';
        } elseif ($skor <= 6) {
            $kategori = 'sedang';
        } else {
            $kategori = 'tinggi';
        }

        return response()->json([
            'skor' => $skor,
            'kategori' => $kategori,
            'faktor' => $faktor,
        ]);
    }
}

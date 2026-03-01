<?php

namespace App\Http\Controllers\Ibu;

use App\Http\Controllers\Controller;
use App\Models\KontenEdukasi;
use App\Models\KategoriEdukasi;
use App\Models\ProfilIbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EdukasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profil = $user->profilIbuHamil;

        $trimester = 'semua';
        if ($profil && $profil->hpht) {
            $hpht = new \DateTime($profil->hpht);
            $today = new \DateTime();
            $diff = $hpht->diff($today);
            $totalDays = $diff->days;
            $minggu = floor($totalDays / 7);

            if ($minggu <= 13) {
                $trimester = '1';
            } elseif ($minggu <= 27) {
                $trimester = '2';
            } else {
                $trimester = '3';
            }
        }

        $kontens = KontenEdukasi::published()
            ->with('kategori')
            ->where(function($query) use ($trimester) {
                $query->where('trimester', $trimester)
                    ->orWhere('trimester', 'semua');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $kategoris = KategoriEdukasi::orderBy('urutan')->get();

        return view('ibu.edukasi.index', compact('kontens', 'kategoris', 'trimester'));
    }

    public function detail($id)
    {
        $konten = KontenEdukasi::with('kategori', 'bidan')
            ->published()
            ->findOrFail($id);

        $konten->increment('views');

        return view('ibu.edukasi.detail', compact('konten'));
    }
}

<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use App\Models\PesanKonsultasi;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $konsultasis = Konsultasi::where('bidan_id', $user->id)
            ->with(['ibu', 'pesanTerakhir'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('bidan.konsultasi.index', compact('konsultasis'));
    }

    public function detail($id)
    {
        $user = Auth::user();
        $konsultasi = Konsultasi::where('id', $id)
            ->where('bidan_id', $user->id)
            ->with(['ibu.profilIbuHamil', 'pesan.pengirim', 'pesan.lampiran'])
            ->firstOrFail();

        $konsultasi->update(['is_read_bidan' => true]);

        return view('bidan.konsultasi.detail', compact('konsultasi'));
    }

    public function sendMessage(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'pesan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $konsultasi = Konsultasi::where('id', $id)
            ->where('bidan_id', $user->id)
            ->firstOrFail();

        $message = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $user->id,
            'pesan' => $request->pesan,
        ]);

        $konsultasi->update([
            'is_read_ibu' => false,
        ]);

        Notifikasi::create([
            'user_id' => $konsultasi->ibu_id,
            'judul' => 'Balasan Bidan',
            'pesan' => 'Bidan ' . $user->nama_lengkap . ' membalas konsultasi Anda: ' . substr($request->pesan, 0, 50),
            'tipe' => 'konsultasi',
            'referensi_id' => $konsultasi->id,
            'referensi_tipe' => 'konsultasi',
        ]);

        return redirect()->route('bidan.konsultasi.detail', $konsultasi->id)
            ->with('success', 'Pesan terkirim!');
    }

    public function selesai($id)
    {
        $user = Auth::user();
        $konsultasi = Konsultasi::where('id', $id)
            ->where('bidan_id', $user->id)
            ->firstOrFail();

        $konsultasi->update(['status' => 'selesai']);

        Notifikasi::create([
            'user_id' => $konsultasi->ibu_id,
            'judul' => 'Konsultasi Selesai',
            $user->nama_lengkap . ' telah menyelesaikan konsultasi ini.',
            'tipe' => 'konsultasi',
            'referensi_id' => $konsultasi->id,
            'referensi_tipe' => 'konsultasi',
        ]);

        return redirect()->back()->with('success', 'Konsultasi ditandai selesai!');
    }
}

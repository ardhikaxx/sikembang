<?php

namespace App\Http\Controllers\Ibu;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $konsultasis = Konsultasi::where('ibu_id', $user->id)
            ->with(['bidan', 'pesanTerakhir'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ibu.konsultasi.index', compact('konsultasis'));
    }

    public function create()
    {
        $bidans = User::where('role', 'bidan')
            ->where('is_aktif', true)
            ->with('profilBidan')
            ->get();

        return view('ibu.konsultasi.create', compact('bidans'));
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'bidan_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $konsultasi = Konsultasi::create([
            'ibu_id' => $user->id,
            'bidan_id' => $request->bidan_id,
            'judul' => $request->judul,
            'status' => 'aktif',
        ]);

        PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $user->id,
            'pesan' => $request->pesan,
        ]);

        Notifikasi::create([
            'user_id' => $request->bidan_id,
            'judul' => 'Konsultasi Baru',
            'pesan' => 'Anda menerima konsultasi baru dari ' . $user->nama_lengkap,
            'tipe' => 'konsultasi',
            'referensi_id' => $konsultasi->id,
            'referensi_tipe' => 'konsultasi',
        ]);

        return redirect()->route('ibu.konsultasi.detail', $konsultasi->id)
            ->with('success', 'Konsultasi berhasil dibuat!');
    }

    public function detail($id)
    {
        $user = Auth::user();
        $konsultasi = Konsultasi::where('id', $id)
            ->where('ibu_id', $user->id)
            ->with(['bidan.profilBidan', 'pesan.pengirim', 'pesan.lampiran'])
            ->firstOrFail();

        $konsultasi->update(['is_read_ibu' => true]);

        return view('ibu.konsultasi.detail', compact('konsultasi'));
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
            ->where('ibu_id', $user->id)
            ->firstOrFail();

        $message = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi->id,
            'pengirim_id' => $user->id,
            'pesan' => $request->pesan,
        ]);

        $konsultasi->update([
            'is_read_bidan' => false,
        ]);

        Notifikasi::create([
            'user_id' => $konsultasi->bidan_id,
            'judul' => 'Balasan Konsultasi',
            'pesan' => $user->nama_lengkap . ' membalas konsultasi: ' . substr($request->pesan, 0, 50),
            'tipe' => 'konsultasi',
            'referensi_id' => $konsultasi->id,
            'referensi_tipe' => 'konsultasi',
        ]);

        return redirect()->route('ibu.konsultasi.detail', $konsultasi->id)
            ->with('success', 'Pesan terkirim!');
    }
}

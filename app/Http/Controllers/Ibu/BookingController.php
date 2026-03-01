<?php

namespace App\Http\Controllers\Ibu;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('ibu_id', $user->id)
            ->with('bidan.profilBidan')
            ->orderBy('tanggal_booking', 'desc')
            ->get();

        return view('ibu.booking.index', compact('bookings'));
    }

    public function create()
    {
        $bidans = User::where('role', 'bidan')
            ->where('is_aktif', true)
            ->with('profilBidan')
            ->get();

        return view('ibu.booking.create', compact('bidans'));
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'bidan_id' => 'required|exists:users,id',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jam_booking' => 'required',
            'jenis' => 'required|in:online,offline',
            'keluhan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        Booking::create([
            'ibu_id' => $user->id,
            'bidan_id' => $request->bidan_id,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking' => $request->jam_booking,
            'jenis' => $request->jenis,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu',
        ]);

        Notifikasi::create([
            'user_id' => $request->bidan_id,
            'judul' => 'Booking Baru',
            'pesan' => 'Anda menerima booking baru dari ' . $user->nama_lengkap,
            'tipe' => 'booking',
        ]);

        return redirect()->route('ibu.booking.index')
            ->with('success', 'Booking berhasil dibuat!');
    }
}

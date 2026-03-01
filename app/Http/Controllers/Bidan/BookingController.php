<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\JadwalUlangBooking;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Booking::where('bidan_id', $user->id);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $bookings = $query->with('ibu')
            ->orderBy('tanggal_booking', 'desc')
            ->get();

        return view('bidan.booking.index', compact('bookings'));
    }

    public function terima($id)
    {
        $user = Auth::user();
        $booking = Booking::where('id', $id)
            ->where('bidan_id', $user->id)
            ->firstOrFail();

        $booking->update(['status' => 'diterima']);

        Notifikasi::create([
            'user_id' => $booking->ibu_id,
            'judul' => 'Booking Diterima',
            'pesan' => 'Booking Anda pada tanggal ' . $booking->tanggal_booking->format('d-m-Y') . ' telah diterima.',
            'tipe' => 'booking',
        ]);

        return redirect()->back()->with('success', 'Booking diterima!');
    }

    public function tolak(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'alasan_tolak' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $booking = Booking::where('id', $id)
            ->where('bidan_id', $user->id)
            ->firstOrFail();

        $booking->update([
            'status' => 'ditolak',
            'alasan_tolak' => $request->alasan_tolak,
        ]);

        Notifikasi::create([
            'user_id' => $booking->ibu_id,
            'judul' => 'Booking Ditolak',
            $booking->ibu->nama_lengkap . ', mohon maaf booking Anda ditolak: ' . $request->alasan_tolak,
            'tipe' => 'booking',
        ]);

        return redirect()->back()->with('success', 'Booking ditolak!');
    }

    public function jadwalUlang(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'tanggal_baru' => 'required|date|after:today',
            'jam_baru' => 'required',
            'alasan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $booking = Booking::where('id', $id)
            ->where('bidan_id', $user->id)
            ->firstOrFail();

        JadwalUlangBooking::create([
            'booking_id' => $booking->id,
            'tanggal_baru' => $request->tanggal_baru,
            'jam_baru' => $request->jam_baru,
            'alasan' => $request->alasan,
        ]);

        $booking->update(['status' => 'dijadwalkan_ulang']);

        Notifikasi::create([
            'user_id' => $booking->ibu_id,
            'judul' => 'Booking Dijadwalkan Ulang',
            $booking->ibu->nama_lengkap . ', booking Anda dijadwalkan ulang ke tanggal ' . $request->tanggal_baru,
            'tipe' => 'booking',
        ]);

        return redirect()->back()->with('success', 'Jadwal booking diubah!');
    }

    public function selesai($id)
    {
        $user = Auth::user();
        $booking = Booking::where('id', $id)
            ->where('bidan_id', $user->id)
            ->firstOrFail();

        $booking->update(['status' => 'selesai']);

        return redirect()->back()->with('success', 'Booking ditandai selesai!');
    }
}

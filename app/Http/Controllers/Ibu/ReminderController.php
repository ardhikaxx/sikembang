<?php

namespace App\Http\Controllers\Ibu;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reminders = Reminder::where('ibu_id', $user->id)
            ->orderBy('tanggal')
            ->get();

        return view('ibu.reminder.index', compact('reminders'));
    }

    public function create()
    {
        return view('ibu.reminder.create');
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'judul' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'jenis' => 'required|in:kontrol,vitamin,lab,lainnya',
            'tanggal' => 'required|date',
            'jam' => 'nullable',
            'is_berulang' => 'boolean',
            'frekuensi' => 'nullable|in:harian,mingguan,bulanan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        Reminder::create([
            'ibu_id' => $user->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'is_berulang' => $request->is_berulang ?? false,
            'frekuensi' => $request->is_berulang ? $request->frekuensi : null,
            'is_aktif' => true,
        ]);

        return redirect()->route('ibu.reminder.index')
            ->with('success', 'Reminder berhasil ditambahkan!');
    }

    public function complete($id)
    {
        $user = Auth::user();
        $reminder = Reminder::where('id', $id)
            ->where('ibu_id', $user->id)
            ->firstOrFail();

        $reminder->update(['is_selesai' => true]);

        return redirect()->back()->with('success', 'Reminder ditandai selesai!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $reminder = Reminder::where('id', $id)
            ->where('ibu_id', $user->id)
            ->firstOrFail();

        $reminder->delete();

        return redirect()->back()->with('success', 'Reminder dihapus!');
    }
}

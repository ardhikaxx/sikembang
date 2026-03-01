<?php

namespace App\Http\Controllers\Ibu;

use App\Http\Controllers\Controller;
use App\Models\CatatanKehamilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $catatans = CatatanKehamilan::where('ibu_id', $user->id)
            ->orderBy('tanggal_periksa', 'desc')
            ->get();

        return view('ibu.catatan.index', compact('catatans'));
    }

    public function create()
    {
        return view('ibu.catatan.create');
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'tanggal_periksa' => 'required|date',
            'usia_kehamilton' => 'nullable|integer|min:1|max:42',
            'berat_badan' => 'nullable|numeric|min:0',
            'tekanan_darah' => 'nullable|string|max:20',
            'denyut_janin' => 'nullable|integer',
            'tinggi_fundus' => 'nullable|numeric',
            'kadar_hb' => 'nullable|numeric|min:0',
            'keluhan' => 'nullable|string',
            'hasil_lab' => 'nullable|string',
            'catatan_tambahan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        CatatanKehamilan::create([
            'ibu_id' => $user->id,
            'tanggal_periksa' => $request->tanggal_periksa,
            'usia_kehamilton' => $request->usia_kehamilton,
            'berat_badan' => $request->berat_badan,
            'tekanan_darah' => $request->tekanan_darah,
            'denyut_janin' => $request->denyut_janin,
            'tinggi_fundus' => $request->tinggi_fundus,
            'kadar_hb' => $request->kadar_hb,
            'keluhan' => $request->keluhan,
            'hasil_lab' => $request->hasil_lab,
            'catatan_tambahan' => $request->catatan_tambahan,
        ]);

        return redirect()->route('ibu.catatan.index')
            ->with('success', 'Catatan kehamilan berhasil ditambahkan!');
    }
}

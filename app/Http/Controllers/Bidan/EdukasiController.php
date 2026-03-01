<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\KontenEdukasi;
use App\Models\KategoriEdukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EdukasiController extends Controller
{
    public function index()
    {
        $kontens = KontenEdukasi::with('kategori')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('bidan.edukasi.index', compact('kontens'));
    }

    public function create()
    {
        $kategoris = KategoriEdukasi::orderBy('urutan')->get();
        return view('bidan.edukasi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'kategori_id' => 'required|exists:kategori_edukasi,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3048',
            'trimester' => 'required|in:1,2,3,semua',
            'minggu_ke' => 'nullable|integer|min:1|max:40',
            'is_published' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $slug = Str::slug($request->judul) . '-' . time();

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('edukasi', 'public');
        }

        KontenEdukasi::create([
            'kategori_id' => $request->kategori_id,
            'bidan_id' => $user->id,
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'trimester' => $request->trimester,
            'minggu_ke' => $request->minggu_ke,
            'is_published' => $request->is_published ?? false,
        ]);

        return redirect()->route('bidan.edukasi.index')
            ->with('success', 'Konten edukasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $konten = KontenEdukasi::findOrFail($id);
        $kategoris = KategoriEdukasi::orderBy('urutan')->get();

        return view('bidan.edukai.edit', compact('konten', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'kategori_id' => 'required|exists:kategori_edukasi,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3048',
            'trimester' => 'required|in:1,2,3,semua',
            'minggu_ke' => 'nullable|integer|min:1|max:40',
            'is_published' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $konten = KontenEdukasi::findOrFail($id);

        $gambarPath = $konten->gambar;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('edukasi', 'public');
        }

        $konten->update([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
            'trimester' => $request->trimester,
            'minggu_ke' => $request->minggu_ke,
            'is_published' => $request->is_published ?? false,
        ]);

        return redirect()->route('bidan.edukai.index')
            ->with('success', 'Konten edukasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $konten = KontenEdukasi::findOrFail($id);
        $konten->delete();

        return redirect()->back()->with('success', 'Konten edukasi dihapus!');
    }
}

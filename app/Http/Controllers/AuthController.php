<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilIbuHamil;
use App\Models\ProfilBidan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->with('error', 'Email tidak terdaftar')
                ->withInput();
        }

        if (!$user->is_aktif) {
            return redirect()->back()
                ->with('error', 'Akun Anda telah dinonaktifkan')
                ->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if ($user->role === 'ibu_hamil') {
                return redirect()->route('ibu.dashboard');
            } elseif ($user->role === 'bidan') {
                return redirect()->route('bidan.dashboard');
            }
            
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->with('error', 'Password yang Anda masukkan salah')
            ->withInput();
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'nullable|string|max:20',
            'role' => 'required|in:ibu_hamil,bidan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        if ($request->role === 'ibu_hamil') {
            $hpht = $request->hpht ? $request->hpht : now()->format('Y-m-d');
            $hpl = date('Y-m-d', strtotime($hpht . ' +280 days'));
            $usia = $request->tanggal_lahir ? (now()->format('Y') - date('Y', strtotime($request->tanggal_lahir))) : null;

            ProfilIbuHamil::create([
                'user_id' => $user->id,
                'tanggal_lahir' => $request->tanggal_lahir,
                'usia' => $usia,
                'hpht' => $hpht,
                'hpl' => $hpl,
                'golongan_darah' => $request->golongan_darah,
                'rhesus' => $request->rhesus,
                'alamat' => $request->alamat,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'riwayat_alergi' => $request->riwayat_alergi,
                'kehamilan_ke' => $request->kehamilan_ke ?? 1,
            ]);
        } elseif ($request->role === 'bidan') {
            ProfilBidan::create([
                'user_id' => $user->id,
                'no_str' => $request->no_str,
                'instansi' => $request->instansi,
                'spesialisasi' => $request->spesialisasi,
            ]);
        }

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function editProfil()
    {
        $user = Auth::user();
        
        if ($user->role === 'ibu_hamil') {
            $profil = $user->profilIbuHamil;
        } else {
            $profil = $user->profilBidan;
        }
        
        return view('auth.edit-profil', compact('user', 'profil'));
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:150',
            'no_hp' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
        ]);

        if ($user->role === 'ibu_hamil' && $user->profilIbuHamil) {
            $profil = $user->profilIbuHamil;
            
            $updateData = [
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'riwayat_alergi' => $request->riwayat_alergi,
                'berat_sebelum' => $request->berat_sebelum,
                'tinggi_badan' => $request->tinggi_badan,
                'kehamilan_ke' => $request->kehamilan_ke,
                'anak_hidup' => $request->anak_hidup,
                'keguguran' => $request->keguguran,
            ];

            if ($request->hpht) {
                $updateData['hpht'] = $request->hpht;
                $updateData['hpl'] = date('Y-m-d', strtotime($request->hpht . ' +280 days'));
            }

            $profil->update($updateData);
        } elseif ($user->role === 'bidan' && $user->profilBidan) {
            $user->profilBidan->update([
                'no_str' => $request->no_str,
                'instansi' => $request->instansi,
                'spesialisasi' => $request->spesialisasi,
                'bio' => $request->bio,
                'pengalaman_tahun' => $request->pengalaman_tahun,
            ]);
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}

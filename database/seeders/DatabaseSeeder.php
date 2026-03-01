<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\KategoriEdukasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Nutrisi Kehamilan', 'slug' => 'nutrisi-kehamilan', 'icon' => 'fa-carrot', 'urutan' => 1],
            ['nama' => 'Tanda Bahaya', 'slug' => 'tanda-bahaya', 'icon' => 'fa-triangle-exclamation', 'urutan' => 2],
            ['nama' => 'Persiapan Menyusui', 'slug' => 'persiapan-menyusui', 'icon' => 'fa-baby-carriage', 'urutan' => 3],
            ['nama' => 'Persiapan Persalinan', 'slug' => 'persiapan-persalinan', 'icon' => 'fa-hospital', 'urutan' => 4],
            ['nama' => 'Tips Sehat Trimester 1', 'slug' => 'tips-sehat-t1', 'icon' => 'fa-heart', 'urutan' => 5],
            ['nama' => 'Tips Sehat Trimester 2', 'slug' => 'tips-sehat-t2', 'icon' => 'fa-heart', 'urutan' => 6],
            ['nama' => 'Tips Sehat Trimester 3', 'slug' => 'tips-sehat-t3', 'icon' => 'fa-heart', 'urutan' => 7],
            ['nama' => 'Aktivitas Fisik', 'slug' => 'aktivitas-fisik', 'icon' => 'fa-person-walking', 'urutan' => 8],
        ];

        foreach ($kategoris as $kategori) {
            KategoriEdukasi::create($kategori);
        }

        $bidan = User::create([
            'nama_lengkap' => 'Bidan Admin',
            'email' => 'bidan@sikembang.com',
            'password' => Hash::make('password'),
            'role' => 'bidan',
            'no_hp' => '081234567890',
        ]);

        $bidan->profilBidan()->create([
            'no_str' => '1234567890',
            'instansi' => 'Puskesmas Sehat',
            'spesialisasi' => 'Kehamilan',
            'pengalaman_tahun' => 5,
        ]);

        $ibuHamil = User::create([
            'nama_lengkap' => 'Ibu Hamil User',
            'email' => 'ibuhamil@sikembang.com',
            'password' => Hash::make('password'),
            'role' => 'ibu_hamil',
            'no_hp' => '081122334455',
        ]);

        $ibuHamil->profilIbuHamil()->create([
            'tanggal_lahir' => '1990-01-01',
            'usia' => 34,
            'hpht' => '2025-05-01',
            'hpl' => '2026-02-05', // Calculated: 2025-05-01 + 280 days
            'golongan_darah' => 'A',
            'rhesus' => '+',
            'berat_sebelum' => 55,
            'tinggi_badan' => 160,
            'alamat' => 'Jl. Contoh Alamat No. 123',
            'riwayat_penyakit' => 'Tidak ada',
            'riwayat_alergi' => 'Tidak ada',
            'kehamilan_ke' => 1,
            'anak_hidup' => 0,
            'keguguran' => 0,
        ]);

        $this->call([
            IbuHamilSeeder::class,
            KontenEdukasiSeeder::class,
            KonsultasiSeeder::class,
            BookingSeeder::class,
            CatatanKehamilanSeeder::class,
            PenilaianRisikoSeeder::class,
        ]);
    }
}

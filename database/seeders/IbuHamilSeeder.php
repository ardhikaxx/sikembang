<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProfilIbuHamil;
use Illuminate\Support\Facades\Hash;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker; 

class IbuHamilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hardcoded data for Ibu Hamil
        $ibuHamilData = [
            [
                'user' => [
                    'nama_lengkap' => 'Fatimah Azzahra',
                    'email' => 'fatimah.azzahra@sikembang.com',
                    'password' => Hash::make('password'),
                    'role' => 'ibu_hamil',
                    'no_hp' => '081234567891',
                ],
                'profil' => [
                    'tanggal_lahir' => '1995-03-15',
                    'usia' => 31,
                    'hpht' => '2025-01-20',
                    'hpl' => '2025-10-27',
                    'golongan_darah' => 'O',
                    'rhesus' => '+',
                    'berat_sebelum' => 58.5,
                    'tinggi_badan' => 158.0,
                    'alamat' => 'Jl. Mawar No. 5, Jakarta',
                    'riwayat_penyakit' => 'Diabetes Gestasional',
                    'riwayat_alergi' => 'Obat-obatan (antibiotik)',
                    'kehamilan_ke' => 2,
                    'anak_hidup' => 1,
                    'keguguran' => 0,
                ]
            ],
            [
                'user' => [
                    'nama_lengkap' => 'Siti Aminah',
                    'email' => 'siti.aminah@sikembang.com',
                    'password' => Hash::make('password'),
                    'role' => 'ibu_hamil',
                    'no_hp' => '081234567892',
                ],
                'profil' => [
                    'tanggal_lahir' => '1998-07-22',
                    'usia' => 28,
                    'hpht' => '2025-02-10',
                    'hpl' => '2025-11-17',
                    'golongan_darah' => 'A',
                    'rhesus' => '+',
                    'berat_sebelum' => 52.0,
                    'tinggi_badan' => 162.0,
                    'alamat' => 'Jl. Kenanga No. 10, Bandung',
                    'riwayat_penyakit' => 'Tidak ada',
                    'riwayat_alergi' => 'Tidak ada',
                    'kehamilan_ke' => 1,
                    'anak_hidup' => 0,
                    'keguguran' => 0,
                ]
            ],
            [
                'user' => [
                    'nama_lengkap' => 'Dian Pertiwi',
                    'email' => 'dian.pertiwi@sikembang.com',
                    'password' => Hash::make('password'),
                    'role' => 'ibu_hamil',
                    'no_hp' => '081234567893',
                ],
                'profil' => [
                    'tanggal_lahir' => '1993-11-01',
                    'usia' => 32,
                    'hpht' => '2024-12-05',
                    'hpl' => '2025-09-12',
                    'golongan_darah' => 'B',
                    'rhesus' => '-',
                    'berat_sebelum' => 65.0,
                    'tinggi_badan' => 160.0,
                    'alamat' => 'Jl. Melati No. 15, Surabaya',
                    'riwayat_penyakit' => 'Hipertensi Kronis',
                    'riwayat_alergi' => 'Seafood',
                    'kehamilan_ke' => 3,
                    'anak_hidup' => 2,
                    'keguguran' => 0,
                ]
            ],
        ];

        foreach ($ibuHamilData as $data) {
            $user = User::create($data['user']);
            $user->profilIbuHamil()->create($data['profil']);
        }
    }
}

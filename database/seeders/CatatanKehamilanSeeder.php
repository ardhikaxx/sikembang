<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CatatanKehamilan;
use App\Models\ProfilIbuHamil;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class CatatanKehamilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No Faker needed
        // $faker = Faker::create('id_ID');

        // Get specific Ibu Hamil users
        $ibuFatimah = User::where('email', 'fatimah.azzahra@sikembang.com')->first();
        $ibuSiti = User::where('email', 'siti.aminah@sikembang.com')->first();
        $ibuDian = User::where('email', 'dian.pertiwi@sikembang.com')->first();


        // Ensure users exist
        if (!$ibuFatimah || !$ibuSiti || !$ibuDian) {
            $this->command->info('Required Ibu Hamil users not found. Skipping CatatanKehamilan seeding.');
            return;
        }

        // --- Catatan Kehamilan for Fatimah Azzahra ---
        $profilFatimah = $ibuFatimah->profilIbuHamil;
        if ($profilFatimah && $profilFatimah->hpht) {
            $hphtFatimah = new \DateTime($profilFatimah->hpht);

            // Entry 1 for Fatimah (Trimester 1)
            $tanggalPeriksa1Fatimah = (clone $hphtFatimah)->modify('+8 weeks');
            $usiaKehamilanWeeks1Fatimah = floor($tanggalPeriksa1Fatimah->diff($hphtFatimah)->days / 7);
            CatatanKehamilan::create([
                'ibu_id' => $ibuFatimah->id,
                'tanggal_periksa' => $tanggalPeriksa1Fatimah->format('Y-m-d'),
                'usia_kehamilan' => $usiaKehamilanWeeks1Fatimah,
                'berat_badan' => 59.0,
                'tekanan_darah' => '110/70',
                'denyut_janin' => 130,
                'tinggi_fundus' => 10.0,
                'kadar_hb' => 12.5,
                'keluhan' => 'Mual di pagi hari, sedikit pusing.',
                'hasil_lab' => 'Normal',
                'catatan_tambahan' => 'Edukasi tentang nutrisi trimester 1.',
            ]);

            // Entry 2 for Fatimah (Trimester 2)
            $tanggalPeriksa2Fatimah = (clone $hphtFatimah)->modify('+20 weeks');
            $usiaKehamilanWeeks2Fatimah = floor($tanggalPeriksa2Fatimah->diff($hphtFatimah)->days / 7);
            CatatanKehamilan::create([
                'ibu_id' => $ibuFatimah->id,
                'tanggal_periksa' => $tanggalPeriksa2Fatimah->format('Y-m-d'),
                'usia_kehamilan' => $usiaKehamilanWeeks2Fatimah,
                'berat_badan' => 63.2,
                'tekanan_darah' => '115/75',
                'denyut_janin' => 140,
                'tinggi_fundus' => 22.5,
                'kadar_hb' => 11.8,
                'keluhan' => 'Nyeri punggung sesekali, nafsu makan meningkat.',
                'hasil_lab' => 'Normal',
                'catatan_tambahan' => 'Edukasi tentang posisi tidur yang nyaman.',
            ]);
        }

        // --- Catatan Kehamilan for Siti Aminah ---
        $profilSiti = $ibuSiti->profilIbuHamil;
        if ($profilSiti && $profilSiti->hpht) {
            $hphtSiti = new \DateTime($profilSiti->hpht);

            // Entry 1 for Siti (Trimester 1)
            $tanggalPeriksa1Siti = (clone $hphtSiti)->modify('+10 weeks');
            $usiaKehamilanWeeks1Siti = floor($tanggalPeriksa1Siti->diff($hphtSiti)->days / 7);
            CatatanKehamilan::create([
                'ibu_id' => $ibuSiti->id,
                'tanggal_periksa' => $tanggalPeriksa1Siti->format('Y-m-d'),
                'usia_kehamilan' => $usiaKehamilanWeeks1Siti,
                'berat_badan' => 53.5,
                'tekanan_darah' => '105/65',
                'denyut_janin' => 128,
                'tinggi_fundus' => 12.0,
                'kadar_hb' => 13.0,
                'keluhan' => 'Cepat lelah.',
                'hasil_lab' => 'Normal',
                'catatan_tambahan' => 'Anjuran istirahat cukup.',
            ]);
        }

        // --- Catatan Kehamilan for Dian Pertiwi ---
        $profilDian = $ibuDian->profilIbuHamil;
        if ($profilDian && $profilDian->hpht) {
            $hphtDian = new \DateTime($profilDian->hpht);

            // Entry 1 for Dian (Trimester 3)
            $tanggalPeriksa1Dian = (clone $hphtDian)->modify('+30 weeks');
            $usiaKehamilanWeeks1Dian = floor($tanggalPeriksa1Dian->diff($hphtDian)->days / 7);
            CatatanKehamilan::create([
                'ibu_id' => $ibuDian->id,
                'tanggal_periksa' => $tanggalPeriksa1Dian->format('Y-m-d'),
                'usia_kehamilan' => $usiaKehamilanWeeks1Dian,
                'berat_badan' => 68.0,
                'tekanan_darah' => '130/85',
                'denyut_janin' => 145,
                'tinggi_fundus' => 30.5,
                'kadar_hb' => 10.5,
                'keluhan' => 'Kaki bengkak, sesak napas ringan.',
                'hasil_lab' => 'Cek gula darah rutin',
                'catatan_tambahan' => 'Edukasi tanda bahaya preeklamsia.',
            ]);
        }
    }
}

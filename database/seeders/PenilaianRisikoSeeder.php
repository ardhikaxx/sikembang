<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PenilaianRisiko;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class PenilaianRisikoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // No Faker needed
        // $faker = Faker::create('id_ID');

        // Get specific Bidan and Ibu Hamil users
        $bidanAdmin = User::where('email', 'bidan@sikembang.com')->first();
        $ibuFatimah = User::where('email', 'fatimah.azzahra@sikembang.com')->first();
        $ibuSiti = User::where('email', 'siti.aminah@sikembang.com')->first();
        $ibuDian = User::where('email', 'dian.pertiwi@sikembang.com')->first();

        // Ensure users exist
        if (!$bidanAdmin || !$ibuFatimah || !$ibuSiti || !$ibuDian) {
            $this->command->info('Required Bidan or Ibu Hamil users not found. Skipping PenilaianRisiko seeding.');
            return;
        }

        // --- Penilaian Risiko for Fatimah Azzahra (Sedang) ---
        PenilaianRisiko::create([
            'ibu_id' => $ibuFatimah->id,
            'bidan_id' => $bidanAdmin->id,
            'kategori_risiko' => 'sedang',
            'skor_risiko' => 7,
            'faktor_risiko' => json_encode(['Diabetes Gestasional', 'Usia > 35']),
            'rekomendasi' => 'Rujuk ke dokter spesialis, pantau kadar gula darah secara rutin, anjurkan diet khusus.',
            'tanggal_penilaian' => '2025-02-15',
        ]);

        // --- Penilaian Risiko for Siti Aminah (Rendah) ---
        PenilaianRisiko::create([
            'ibu_id' => $ibuSiti->id,
            'bidan_id' => $bidanAdmin->id,
            'kategori_risiko' => 'rendah',
            'skor_risiko' => 3,
            'faktor_risiko' => json_encode(['Tidak ada riwayat penyakit', 'Usia ideal']),
            'rekomendasi' => 'Edukasi nutrisi dan gaya hidup sehat, kontrol rutin sesuai jadwal.',
            'tanggal_penilaian' => '2025-02-20',
        ]);

        // --- Penilaian Risiko for Dian Pertiwi (Tinggi) ---
        PenilaianRisiko::create([
            'ibu_id' => $ibuDian->id,
            'bidan_id' => $bidanAdmin->id,
            'kategori_risiko' => 'tinggi',
            'skor_risiko' => 12,
            'faktor_risiko' => json_encode(['Hipertensi Kronis', 'Rhesus Negatif']),
            'rekomendasi' => 'Manajemen tekanan darah ketat, pemantauan ketat oleh dokter spesialis, edukasi tanda bahaya.',
            'tanggal_penilaian' => '2025-01-30',
        ]);
    }
}

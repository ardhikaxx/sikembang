<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PenilaianRisiko;
use Faker\Factory as Faker;

class PenilaianRisikoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get all Ibu users
        $ibuIds = User::where('role', 'ibu_hamil')->pluck('id')->toArray();
        // Get all Bidan users
        $bidanIds = User::where('role', 'bidan')->pluck('id')->toArray();

        // Ensure there are ibu and bidan users
        if (empty($ibuIds) || empty($bidanIds)) {
            $this->command->info('No Ibu Hamil or Bidan users found. Skipping PenilaianRisiko seeding.');
            return;
        }

        for ($i = 0; $i < 30; $i++) { // Create 30 assessments
            $ibuId = $faker->randomElement($ibuIds);
            $bidanId = $faker->randomElement($bidanIds);
            $kategoriRisiko = $faker->randomElement(['rendah', 'sedang', 'tinggi']);
            $skorRisiko = 0;

            // Simple logic for skor_risiko based on kategori_risiko
            if ($kategoriRisiko === 'rendah') {
                $skorRisiko = $faker->numberBetween(0, 5);
            } elseif ($kategoriRisiko === 'sedang') {
                $skorRisiko = $faker->numberBetween(6, 10);
            } else {
                $skorRisiko = $faker->numberBetween(11, 20);
            }

            PenilaianRisiko::create([
                'ibu_id' => $ibuId,
                'bidan_id' => $bidanId,
                'kategori_risiko' => $kategoriRisiko,
                'skor_risiko' => $skorRisiko,
                'faktor_risiko' => json_encode($faker->words(rand(2, 5), false)), // Random factors as JSON
                'rekomendasi' => $faker->paragraph(rand(1, 2)),
                'tanggal_penilaian' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CatatanKehamilan;
use Faker\Factory as Faker;

class CatatanKehamilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get all Ibu users
        $ibuIds = User::where('role', 'ibu_hamil')->pluck('id')->toArray();

        // Ensure there are ibu users
        if (empty($ibuIds)) {
            $this->command->info('No Ibu Hamil users found. Skipping CatatanKehamilan seeding.');
            return;
        }

        foreach ($ibuIds as $ibuId) {
            // Create 2 to 5 catatan kehamilan for each ibu
            for ($i = 0; $i < rand(2, 5); $i++) {
                CatatanKehamilan::create([
                    'ibu_id' => $ibuId,
                    'tanggal_periksa' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                    'usia_kehamilan' => $faker->numberBetween(8, 40),
                    'berat_badan' => $faker->randomFloat(2, 50, 80),
                    'tekanan_darah' => $faker->numberBetween(90, 140) . '/' . $faker->numberBetween(60, 90),
                    'denyut_janin' => $faker->numberBetween(120, 160),
                    'tinggi_fundus' => $faker->randomFloat(2, 20, 35),
                    'kadar_hb' => $faker->randomFloat(2, 10, 15),
                    'keluhan' => $faker->boolean(50) ? $faker->sentence() : null,
                    'hasil_lab' => $faker->boolean(30) ? $faker->sentence() : null,
                    'catatan_tambahan' => $faker->boolean(40) ? $faker->paragraph(1) : null,
                ]);
            }
        }
    }
}

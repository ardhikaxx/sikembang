<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Reminder;
use Faker\Factory as Faker;

class ReminderSeeder extends Seeder
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
            $this->command->info('No Ibu Hamil users found. Skipping Reminder seeding.');
            return;
        }

        foreach ($ibuIds as $ibuId) {
            // Create 2 to 5 reminders for each ibu
            for ($i = 0; $i < rand(2, 5); $i++) {
                Reminder::create([
                    'ibu_id' => $ibuId,
                    'judul' => $faker->sentence(rand(3, 7)),
                    'deskripsi' => $faker->boolean(70) ? $faker->paragraph(1) : null,
                    'jenis' => $faker->randomElement(['kontrol', 'vitamin', 'lab', 'lainnya']),
                    'tanggal' => $faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
                    'jam' => $faker->boolean(70) ? $faker->time('H:i') : null,
                    'is_berulang' => $faker->boolean(30),
                    'frekuensi' => $faker->boolean(30) ? $faker->randomElement(['harian', 'mingguan', 'bulanan']) : null,
                    'is_aktif' => $faker->boolean(),
                    'is_selesai' => $faker->boolean(30),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Notifikasi;
use App\Models\Konsultasi;
use App\Models\Booking;
use App\Models\Reminder;
use App\Models\PenilaianRisiko;
use Faker\Factory as Faker;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get all user IDs
        $userIds = User::pluck('id')->toArray();
        // Get related IDs for referensi_id
        $konsultasiIds = Konsultasi::pluck('id')->toArray();
        $bookingIds = Booking::pluck('id')->toArray();
        $reminderIds = Reminder::pluck('id')->toArray();
        $penilaianRisikoIds = PenilaianRisiko::pluck('id')->toArray();

        // Ensure there are users
        if (empty($userIds)) {
            $this->command->info('No users found. Skipping Notifikasi seeding.');
            return;
        }

        foreach ($userIds as $userId) {
            // Create 2 to 5 notifications for each user
            for ($i = 0; $i < rand(2, 5); $i++) {
                $type = $faker->randomElement(['konsultasi', 'booking', 'reminder', 'risiko', 'sistem']);
                $referensiId = null;
                $referensiTipe = null;

                switch ($type) {
                    case 'konsultasi':
                        if (!empty($konsultasiIds)) {
                            $referensiId = $faker->randomElement($konsultasiIds);
                            $referensiTipe = Konsultasi::class;
                        }
                        break;
                    case 'booking':
                        if (!empty($bookingIds)) {
                            $referensiId = $faker->randomElement($bookingIds);
                            $referensiTipe = Booking::class;
                        }
                        break;
                    case 'reminder':
                        if (!empty($reminderIds)) {
                            $referensiId = $faker->randomElement($reminderIds);
                            $referensiTipe = Reminder::class;
                        }
                        break;
                    case 'risiko':
                        if (!empty($penilaianRisikoIds)) {
                            $referensiId = $faker->randomElement($penilaianRisikoIds);
                            $referensiTipe = PenilaianRisiko::class;
                        }
                        break;
                    default: // 'sistem'
                        break;
                }

                Notifikasi::create([
                    'user_id' => $userId,
                    'judul' => $faker->sentence(rand(3, 7)),
                    'pesan' => $faker->paragraph(rand(1, 3)),
                    'tipe' => $type,
                    'referensi_id' => $referensiId,
                    'referensi_tipe' => $referensiTipe,
                    'is_read' => $faker->boolean(60), // 60% chance of being read
                ]);
            }
        }
    }
}

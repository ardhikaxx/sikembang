<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\PesanKonsultasi;
use App\Models\LampiranKonsultasi;
use Faker\Factory as Faker;

class KonsultasiSeeder extends Seeder
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
            $this->command->info('No Ibu Hamil or Bidan users found. Skipping Konsultasi seeding.');
            return;
        }

        for ($i = 0; $i < 30; $i++) { // Create 30 consultations
            $ibuId = $faker->randomElement($ibuIds);
            $bidanId = $faker->randomElement($bidanIds);

            $konsultasi = Konsultasi::create([
                'ibu_id' => $ibuId,
                'bidan_id' => $bidanId,
                'judul' => $faker->sentence(rand(3, 7)),
                'status' => $faker->randomElement(['aktif', 'selesai', 'ditutup']),
                'is_read_bidan' => $faker->boolean(),
                'is_read_ibu' => $faker->boolean(),
            ]);

            // Create 2 to 5 messages for each consultation
            for ($j = 0; $j < rand(2, 5); $j++) {
                $senderId = $faker->randomElement([$ibuId, $bidanId]);
                
                $pesan = PesanKonsultasi::create([
                    'konsultasi_id' => $konsultasi->id,
                    'pengirim_id' => $senderId,
                    'pesan' => $faker->paragraph(rand(1, 3)),
                    'is_read' => $faker->boolean(),
                ]);

                // 30% chance to add an attachment
                if ($faker->boolean(30)) {
                    LampiranKonsultasi::create([
                        'pesan_id' => $pesan->id,
                        'nama_file' => $faker->word() . '.' . $faker->fileExtension(),
                        'path_file' => 'attachments/' . $faker->uuid() . '.' . $faker->fileExtension(),
                        'tipe_file' => $faker->mimeType(),
                        'ukuran_file' => $faker->numberBetween(100, 5000), // KB
                    ]);
                }
            }
        }
    }
}

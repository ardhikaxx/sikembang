<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Booking;
use App\Models\JadwalUlangBooking;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class BookingSeeder extends Seeder
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

        // Ensure users exist
        if (!$bidanAdmin || !$ibuFatimah || !$ibuSiti) {
            $this->command->info('Required Bidan or Ibu Hamil users not found. Skipping Booking seeding.');
            return;
        }

        // --- Booking 1: Menunggu, Ibu Fatimah dengan Bidan Admin ---
        Booking::create([
            'ibu_id' => $ibuFatimah->id,
            'bidan_id' => $bidanAdmin->id,
            'tanggal_booking' => '2025-03-10',
            'jam_booking' => '10:00:00',
            'jenis' => 'offline',
            'keluhan' => 'Konsultasi rutin kehamilan trimester kedua.',
            'status' => 'menunggu',
            'catatan_bidan' => null,
            'alasan_tolak' => null,
        ]);

        // --- Booking 2: Diterima, Ibu Siti dengan Bidan Admin ---
        Booking::create([
            'ibu_id' => $ibuSiti->id,
            'bidan_id' => $bidanAdmin->id,
            'tanggal_booking' => '2025-03-15',
            'jam_booking' => '14:30:00',
            'jenis' => 'online',
            'keluhan' => 'Diskusi hasil pemeriksaan lab terbaru.',
            'status' => 'diterima',
            'catatan_bidan' => 'Siapkan hasil lab dan pertanyaan.',
            'alasan_tolak' => null,
        ]);

        // --- Booking 3: Dijadwalkan Ulang, Ibu Fatimah dengan Bidan Admin ---
        $bookingRescheduled = Booking::create([
            'ibu_id' => $ibuFatimah->id,
            'bidan_id' => $bidanAdmin->id,
            'tanggal_booking' => '2025-03-05', // Original date
            'jam_booking' => '09:00:00', // Original time
            'jenis' => 'offline',
            'keluhan' => 'Pemeriksaan rutin, namun ada keperluan mendadak.',
            'status' => 'dijadwalkan_ulang',
            'catatan_bidan' => null,
            'alasan_tolak' => null,
        ]);

        JadwalUlangBooking::create([
            'booking_id' => $bookingRescheduled->id,
            'tanggal_baru' => '2025-03-12',
            'jam_baru' => '11:00:00',
            'alasan' => 'Bidan ada acara mendesak, diganti tanggal 12 Maret jam 11 pagi.',
        ]);

        // --- Booking 4: Ditolak, Ibu Siti dengan Bidan Admin ---
        Booking::create([
            'ibu_id' => $ibuSiti->id,
            'bidan_id' => $bidanAdmin->id,
            'tanggal_booking' => '2025-03-20',
            'jam_booking' => '16:00:00',
            'jenis' => 'online',
            'keluhan' => 'Konsultasi tentang pusing yang sering muncul.',
            'status' => 'ditolak',
            'catatan_bidan' => null,
            'alasan_tolak' => 'Jadwal bidan penuh, disarankan booking ulang di lain hari.',
        ]);
    }
}

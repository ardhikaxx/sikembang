<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Booking;
use App\Models\JadwalUlangBooking;
use Faker\Factory as Faker;

class BookingSeeder extends Seeder
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
            $this->command->info('No Ibu Hamil or Bidan users found. Skipping Booking seeding.');
            return;
        }

        for ($i = 0; $i < 30; $i++) { // Create 30 bookings
            $ibuId = $faker->randomElement($ibuIds);
            $bidanId = $faker->randomElement($bidanIds);

            $tanggalBooking = $faker->dateTimeBetween('-1 month', '+3 months')->format('Y-m-d');
            $jamBooking = $faker->time('H:i');

            $booking = Booking::create([
                'ibu_id' => $ibuId,
                'bidan_id' => $bidanId,
                'tanggal_booking' => $tanggalBooking,
                'jam_booking' => $jamBooking,
                'jenis' => $faker->randomElement(['online', 'offline']),
                'keluhan' => $faker->paragraph(rand(1, 3)),
                'status' => $faker->randomElement(['menunggu', 'diterima', 'ditolak', 'selesai', 'dijadwalkan_ulang']),
                'catatan_bidan' => $faker->boolean(50) ? $faker->sentence() : null,
                'alasan_tolak' => null, // Will be set if status is 'ditolak'
            ]);

            // If status is 'ditolak', set alasan_tolak
            if ($booking->status === 'ditolak') {
                $booking->update(['alasan_tolak' => $faker->sentence()]);
            }

            // 20% chance to reschedule the booking
            if ($booking->status === 'dijadwalkan_ulang' || $faker->boolean(20)) {
                JadwalUlangBooking::create([
                    'booking_id' => $booking->id,
                    'tanggal_baru' => $faker->dateTimeBetween($tanggalBooking, '+4 months')->format('Y-m-d'),
                    'jam_baru' => $faker->time('H:i'),
                    'alasan' => $faker->sentence(),
                ]);
                $booking->update(['status' => 'dijadwalkan_ulang']); // Ensure status matches if rescheduled
            }
        }
    }
}

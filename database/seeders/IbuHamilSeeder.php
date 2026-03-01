<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProfilIbuHamil;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class IbuHamilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Use Indonesian faker for more realistic names/addresses

        for ($i = 0; $i < 50; $i++) {
            // Generate birth date between 20-40 years ago
            $tanggalLahir = $faker->dateTimeBetween('-40 years', '-20 years')->format('Y-m-d');
            $usia = now()->diff(new \DateTime($tanggalLahir))->y;

            // Generate HPHT within the last 9 months
            $hpht = $faker->dateTimeBetween('-9 months', 'now')->format('Y-m-d');
            $hpl = date('Y-m-d', strtotime($hpht . ' +280 days'));

            $user = User::create([
                'nama_lengkap' => $faker->name('female'),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'), // Common password for seeded users
                'role' => 'ibu_hamil',
                'no_hp' => $faker->phoneNumber(),
            ]);

            $kehamilanKe = $faker->numberBetween(1, 5); // Max 5 pregnancies
            $anakHidup = $faker->numberBetween(0, $kehamilanKe - 1); // Anak hidup cannot be more than kehamilan_ke - 1
            $keguguran = $faker->numberBetween(0, $kehamilanKe - 1 - $anakHidup); // Keguguran cannot be more than remaining pregnancies
            if ($keguguran < 0) $keguguran = 0; // Ensure no negative value

            ProfilIbuHamil::create([
                'user_id' => $user->id,
                'tanggal_lahir' => $tanggalLahir,
                'usia' => $usia,
                'hpht' => $hpht,
                'hpl' => $hpl,
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'rhesus' => $faker->randomElement(['+', '-']),
                'berat_sebelum' => $faker->randomFloat(2, 40, 75), // kg, wider range
                'tinggi_badan' => $faker->randomFloat(2, 145, 180), // cm, wider range
                'alamat' => $faker->address(),
                'riwayat_penyakit' => $faker->boolean(30) ? $faker->sentence(3) : 'Tidak ada', // 30% chance of disease
                'riwayat_alergi' => $faker->boolean(20) ? $faker->word() : 'Tidak ada', // 20% chance of allergy
                'kehamilan_ke' => $kehamilanKe,
                'anak_hidup' => $anakHidup,
                'keguguran' => $keguguran,
            ]);
        }
    }
}

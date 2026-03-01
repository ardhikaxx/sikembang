<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KategoriEdukasi;
use App\Models\KontenEdukasi;
use Faker\Factory as Faker;

class KontenEdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get all Bidan users
        $bidanIds = User::where('role', 'bidan')->pluck('id')->toArray();

        // Get all KategoriEdukasi
        $kategoriIds = KategoriEdukasi::pluck('id')->toArray();

        // Ensure there are bidan and categories
        if (empty($bidanIds) || empty($kategoriIds)) {
            $this->command->info('No Bidan users or Edukasi categories found. Skipping KontenEdukasi seeding.');
            return;
        }

        for ($i = 0; $i < 30; $i++) { // Create 30 educational contents
            $judul = $faker->sentence(rand(5, 10));
            $slug = \Illuminate\Support\Str::slug($judul . '-' . $faker->unique()->randomNumber(5));

            KontenEdukasi::create([
                'kategori_id' => $faker->randomElement($kategoriIds),
                'bidan_id' => $faker->randomElement($bidanIds),
                'judul' => $judul,
                'slug' => $slug,
                'konten' => $faker->paragraphs(rand(5, 10), true),
                'gambar' => $faker->imageUrl(640, 480, 'health', true), // Placeholder image
                'trimester' => $faker->randomElement(['1', '2', '3', 'semua']),
                'minggu_ke' => $faker->numberBetween(1, 40),
                'is_published' => $faker->boolean(80), // 80% chance of being published
                'views' => $faker->numberBetween(0, 1000),
            ]);
        }
    }
}

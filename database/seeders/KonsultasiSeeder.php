<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Konsultasi;
use App\Models\PesanKonsultasi;
use App\Models\LampiranKonsultasi;
// No Faker needed for hardcoded data
// use Faker\Factory as Faker;

class KonsultasiSeeder extends Seeder
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
            $this->command->info('Required Bidan or Ibu Hamil users not found. Skipping Konsultasi seeding.');
            return;
        }

        // --- Konsultasi 1: Aktif, Ibu Fatimah dengan Bidan Admin ---
        $konsultasi1 = Konsultasi::create([
            'ibu_id' => $ibuFatimah->id,
            'bidan_id' => $bidanAdmin->id,
            'judul' => 'Perkembangan Janin Trimester 1',
            'status' => 'aktif',
            'is_read_bidan' => false,
            'is_read_ibu' => true,
        ]);

        $pesan1_1 = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi1->id,
            'pengirim_id' => $ibuFatimah->id,
            'pesan' => 'Halo Bidan, saya Fatimah. Mau tanya, apakah normal jika sering merasa mual di minggu ke-8 kehamilan?',
            'is_read' => true,
        ]);

        $pesan1_2 = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi1->id,
            'pengirim_id' => $bidanAdmin->id,
            'pesan' => 'Halo Ibu Fatimah, mual di trimester pertama sangat umum terjadi. Pastikan Anda tetap makan sedikit tapi sering, hindari makanan berbau menyengat. Jika mual muntah berlebihan, segera periksa ya.',
            'is_read' => false,
        ]);

        // --- Konsultasi 2: Selesai, Ibu Siti dengan Bidan Admin (dengan lampiran) ---
        $konsultasi2 = Konsultasi::create([
            'ibu_id' => $ibuSiti->id,
            'bidan_id' => $bidanAdmin->id,
            'judul' => 'Hasil USG dan Keluhan Nyeri Punggung',
            'status' => 'selesai',
            'is_read_bidan' => true,
            'is_read_ibu' => true,
        ]);

        $pesan2_1 = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi2->id,
            'pengirim_id' => $ibuSiti->id,
            'pesan' => 'Selamat siang Bidan, ini hasil USG saya (terlampir) dan saya juga sering merasakan nyeri punggung, apakah ada tips untuk menguranginya?',
            'is_read' => true,
        ]);

        LampiranKonsultasi::create([
            'pesan_id' => $pesan2_1->id,
            'nama_file' => 'hasil_usg_siti_aminah.pdf',
            'path_file' => 'attachments/usg_siti_aminah.pdf', // Example path
            'tipe_file' => 'application/pdf',
            'ukuran_file' => 512, // KB
        ]);

        $pesan2_2 = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi2->id,
            'pengirim_id' => $bidanAdmin->id,
            'pesan' => 'Siang Ibu Siti, terima kasih sudah mengirim hasil USG. Semua terlihat baik. Untuk nyeri punggung, coba gunakan kompres hangat dan lakukan peregangan ringan. Hindari mengangkat beban berat. Jika nyeri berlanjut, kita bisa jadwalkan pemeriksaan fisik.',
            'is_read' => true,
        ]);
        
        // --- Konsultasi 3: Ditutup, Ibu Fatimah dengan Bidan Admin ---
        $konsultasi3 = Konsultasi::create([
            'ibu_id' => $ibuFatimah->id,
            'bidan_id' => $bidanAdmin->id,
            'judul' => 'Pertanyaan Tentang Makanan Pantangan',
            'status' => 'ditutup',
            'is_read_bidan' => true,
            'is_read_ibu' => true,
        ]);

        $pesan3_1 = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi3->id,
            'pengirim_id' => $ibuFatimah->id,
            'pesan' => 'Bidan, apakah ada makanan tertentu yang harus saya hindari selama kehamilan? Terutama seafood.',
            'is_read' => true,
        ]);

        $pesan3_2 = PesanKonsultasi::create([
            'konsultasi_id' => $konsultasi3->id,
            'pengirim_id' => $bidanAdmin->id,
            'pesan' => 'Beberapa jenis seafood dengan merkuri tinggi sebaiknya dihindari. Namun, seafood rendah merkuri seperti salmon atau udang baik untuk omega-3. Hindari juga makanan mentah atau setengah matang. Konsultasi ini saya tutup karena sudah terjawab ya Bu.',
            'is_read' => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.~
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Web Projects
        DB::table('web_projects')->insert([
            [
                'id' => 14,
                'title' => 'STECU KOST',
                'description' => 'STECU KOST (Stay Eazy Choose Ur Kost) adalah platform online yang didedikasikan untuk membantu pengguna di Indonesia menemukan kost impian mereka dengan mudah. Situs web ini menyediakan pengalaman yang ramah pengguna dengan fungsi pencarian yang cepat dan akurat, menawarkan filter komprehensif untuk mempersempit pilihan berdasarkan kebutuhan spesifik. Pengguna dapat menjelajahi daftar kost populer dan yang baru ditambahkan, serta mengakses informasi tentang promosi dan pembaruan terbaru di pasar kost. STECU KOST bertujuan untuk menghubungkan individu dengan beragam pilihan akomodasi berkualitas di lokasi strategis, menyediakan wawasan tambahan dan penawaran khusus untuk memfasilitasi pengambilan keputusan yang tepat.',
                'url' => 'https://kos.xzyenthusiast.net/',
                'image_path' => '/storage/web-projects/PJmy7WMgMIDRJJlRzEVzRiUkhKjwlEWUNXg7uswl.png',
                'category' => 'Property',
                'technologies' => '["PHP Native","Bootstrap"]',
                'created_at' => '2025-06-19 11:45:32',
                'updated_at' => '2025-06-19 11:48:56',
            ],
            [
                'id' => 15,
                'title' => 'KerajinanKita',
                'description' => 'KerajinanKita adalah spesialis dalam kerajinan kulit buatan tangan, didukung oleh pengrajin kulit berpengalaman. Situs web ini menawarkan beragam jenis produk kerajinan kulit berkualitas tinggi yang dirancang untuk memenuhi berbagai selera pelanggan. Dengan lebih dari 20 produk kerajinan kulit yang tersedia dan rekam jejak lebih dari 150 transaksi terverifikasi dengan rating pembelian 4.9/5, KerajinanKita menjamin kualitas dan kepuasan pelanggan. Anda dapat menghubungi mereka melalui telepon di +62 812-3456-7890 atau email di customercare@kerajinankita.id. Pusat produksi mereka berlokasi di Jl. Kerajinan No. 12, Yogyakarta, Indonesia.',
                'url' => 'https://kerajinankita.xzyenthusiast.net/',
                'image_path' => '/storage/web-projects/yUIAYMyS6LwYk9M9vQxYtSIUBYSXxzAuqtrdXNLC.png',
                'category' => 'e-commerce',
                'technologies' => '["Html","Css","Javascript"]',
                'created_at' => '2025-06-19 14:21:35',
                'updated_at' => '2025-06-19 14:21:35',
            ],
        ]);

        // Designs
        DB::table('designs')->insert([
            [
                'id' => 9,
                'title' => 'ID Card',
                'description' => 'Desain ini adalah representasi visual untuk staf UKM Penalaran dan Kreativitas, menampilkan identitas "STAFF BINTER". Dengan tata letak vertikal modern, desain ini memadukan tipografi bold dan palet warna merah marun-putih yang bersih, disempurnakan dengan elemen grafis abstrak dan bingkai foto dinamis. Desain ini secara efektif mengkomunikasikan peran individu dalam organisasi, seperti yang ditunjukkan oleh nama "AZIZI ASADEL".',
                'image_path' => '/storage/designs/U04iIYzlmXdblqg44K3akTEsNTTxQCWilP6lgKkx.jpg',
                'tool' => null,
                'category' => 'ID Card',
                'created_at' => '2025-06-19 12:10:04',
                'updated_at' => '2025-06-19 12:10:04',
            ],
        ]);

        // Edited Videos
        DB::table('edited_videos')->insert([
            [
                'id' => 7,
                'title' => 'After Movie Building Character Day 2024',
                'description' => 'After Movie Building Character Day 2024',
                'video_url' => 'https://drive.google.com/file/d/1l9R9uZ92VKVlp_xEgmA3_jEvBOXsxpup/view?usp=sharing',
                'thumbnail_path' => '/storage/videos/FIv9zqMfcsTqQ4JkoTrnHUcXngX6BXFzYx3uM5YF.png',
                'software_used' => 'After Effects, Adobe Premiere Pro',
                'duration_seconds' => 3000,
                'category' => 'After Movie',
                'created_at' => '2025-06-19 12:16:01',
                'updated_at' => '2025-06-19 14:27:12',
            ],
            [
                'id' => 8,
                'title' => 'After Movie PEMABA 2024',
                'description' => 'After Movie PEMABA 2024',
                'video_url' => 'https://drive.google.com/file/d/1sdfSXDs5bJMHCuR75nAHRNOhI8f9yoIR/view?usp=sharing',
                'thumbnail_path' => '/storage/videos/EvOH2idhxQVtwfg275SYjmbymzRQrVWnVgkKTkMP.png',
                'software_used' => 'Adobe Premiere Pro',
                'duration_seconds' => 2000,
                'category' => 'After Movie',
                'created_at' => '2025-06-19 14:30:08',
                'updated_at' => '2025-06-19 14:30:08',
            ],
            [
                'id' => 9,
                'title' => 'Teaser PEMABA 2024',
                'description' => 'Teaser PEMABA 2024',
                'video_url' => 'https://drive.google.com/file/d/1H0wr1IsXSQkklzilGxMKe96JJrnxpiB-/view?usp=sharing',
                'thumbnail_path' => '/storage/videos/y3QCnJtVwtvDQOvN7aFkdtl8Yeu81LXsfiT77ZiV.png',
                'software_used' => 'Adobe Premiere Pro',
                'duration_seconds' => 900,
                'category' => 'Teaser',
                'created_at' => '2025-06-19 14:35:52',
                'updated_at' => '2025-06-19 14:35:52',
            ],
        ]);
    }
}

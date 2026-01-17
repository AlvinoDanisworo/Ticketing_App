<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'user_id' => 1,
                'kategori_id' => 1,
                'judul' => 'Konser Musik Rock',
                'deskripsi' => 'Nikmati malam penuh energi dengan band rock terkenal.',
                'lokasi' => 'Stadion Utama',
                'tanggal_waktu' => '2024-07-15 19:00:00',
                'gambar' => 'events/rock_concert.jpg',
            ],
            [
                'user_id' => 1,
                'kategori_id' => 2,
                'judul' => 'Pertandingan Sepak Bola',
                'deskripsi' => 'Dukung tim favorit Anda dalam pertandingan seru ini.',
                'lokasi' => 'Lapangan Hijau',
                'tanggal_waktu' => '2024-08-10 16:00:00',
                'gambar' => 'events/soccer_match.jpg',
            ],
            [
                'user_id' => 1,
                'judul' => 'Festival Makanan Internasional',
                'deskripsi' => 'Cicipi berbagai hidangan lezat dari seluruh dunia.',
                'tanggal_waktu' => '2024-10-05 12:00:00',
                'lokasi' => 'Taman Kota',
                'kategori_id' => 3,
                'gambar' => 'events/festival_makanan.jpg',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}

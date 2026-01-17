<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Musik'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Seni'],
            ['nama_kategori' => 'Teater'],
            ['nama_kategori' => 'Festival'],
            ['nama_kategori' => 'Pendidikan'],
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Kesehatan'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create(['nama' => $kategori['nama_kategori']]);
        }
    }
}

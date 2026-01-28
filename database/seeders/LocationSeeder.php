<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ["nama_lokasi" => "Stadion Utama"],
            ["nama_lokasi" => "Galeri Seni Kota"],
            ["nama_lokasi" => "Taman Kota"]
        ];
        foreach ($locations as $location) {
           Location::create($location);
        }
    }
}

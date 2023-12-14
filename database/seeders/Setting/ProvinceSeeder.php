<?php

namespace Database\Seeders\Setting;

use App\Models\Setting\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::create([
            'id' => 1,
            'description' => 'ACEH'
        ]);

        Province::create([
            'id' => 2,
            'description' => 'SUMATERA UTARA'
        ]);

        Province::create([
            'id' => 3,
            'description' => 'SUMATERA BARAT'
        ]);

        Province::create([
            'id' => 4,
            'description' => 'RIAU'
        ]);

        Province::create([
            'id' => 5,
            'description' => 'JAMBI'
        ]);

        Province::create([
            'id' => 6,
            'description' => 'SUMATERA SELATAN'
        ]);

        Province::create([
            'id' => 7,
            'description' => 'BENGKULU'
        ]);

        Province::create([
            'id' => 8,
            'description' => 'LAMPUNG'
        ]);

        Province::create([
            'id' => 9,
            'description' => 'KEPULAUAN BANGKA BELITUNG'
        ]);

        Province::create([
            'id' => 10,
            'description' => 'KEPULAUAN RIAU'
        ]);

        Province::create([
            'id' => 11,
            'description' => 'DKI JAKARTA'
        ]);

        Province::create([
            'id' => 12,
            'description' => 'JAWA BARAT'
        ]);

        Province::create([
            'id' => 13,
            'description' => 'JAWA TENGAH'
        ]);

        Province::create([
            'id' => 14,
            'description' => 'DI YOGYAKARTA'
        ]);

        Province::create([
            'id' => 15,
            'description' => 'JAWA TIMUR'
        ]);

        Province::create([
            'id' => 16,
            'description' => 'BANTEN'
        ]);

        Province::create([
            'id' => 17,
            'description' => 'BALI'
        ]);

        Province::create([
            'id' => 18,
            'description' => 'NUSA TENGGARA BARAT'
        ]);

        Province::create([
            'id' => 19,
            'description' => 'NUSA TENGGARA TIMUR'
        ]);

        Province::create([
            'id' => 20,
            'description' => 'KALIMANTAN BARAT'
        ]);

        Province::create([
            'id' => 21,
            'description' => 'KALIMANTAN TENGAH'
        ]);

        Province::create([
            'id' => 22,
            'description' => 'KALIMANTAN SELATAN'
        ]);

        Province::create([
            'id' => 23,
            'description' => 'KALIMANTAN TIMUR'
        ]);

        Province::create([
            'id' => 24,
            'description' => 'KALIMANTAN UTARA'
        ]);

        Province::create([
            'id' => 25,
            'description' => 'SULAWESI UTARA'
        ]);

        Province::create([
            'id' => 26,
            'description' => 'SULAWESI TENGAH'
        ]);

        Province::create([
            'id' => 27,
            'description' => 'SULAWESI SELATAN'
        ]);

        Province::create([
            'id' => 28,
            'description' => 'SULAWESI TENGGARA'
        ]);

        Province::create([
            'id' => 29,
            'description' => 'GORONTALO'
        ]);

        Province::create([
            'id' => 30,
            'description' => 'SULAWESI BARAT'
        ]);

        Province::create([
            'id' => 31,
            'description' => 'MALUKU'
        ]);

        Province::create([
            'id' => 32,
            'description' => 'MALUKU UTARA'
        ]);

        Province::create([
            'id' => 33,
            'description' => 'PAPUA'
        ]);

        Province::create([
            'id' => 34,
            'description' => 'PAPUA BARAT'
        ]);
    }
}

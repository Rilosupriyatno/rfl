<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expedition;

class ExpeditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $count = 1;
        Expedition::create([
            'name' => 'Truck',
            'price' => 1500,
        ]);
        $count += 1;
        Expedition::create([
            'name' => 'Fuso',
            'price' => 1500,
        ]);

    }
}

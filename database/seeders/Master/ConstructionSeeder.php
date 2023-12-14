<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Master\Construction;
use Illuminate\Database\Seeder;

class ConstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        Construction::create([
            'code' => 'CONS-' . date("ymd") . '-000' . $count,
            'description' => 'Knockdown',
        ]);

        $count += 1;
        Construction::create([
            'code' => 'CONS-' . date("ymd") . '-000' . $count,
            'description' => 'Fix - Stacking',
        ]);

        $count += 1;
        Construction::create([
            'code' => 'CONS-' . date("ymd") . '-000' . $count,
            'description' => 'Fix - Non Stacking',
        ]);
    }
}

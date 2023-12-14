<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\Grade;


class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        Grade::create([
            'code' => 'GRD-' . date("ymd") . '-000' . $count,
            'description' => 'AB',
        ]);

        $count += 1;
        Grade::create([
            'code' => 'GRD-' . date("ymd") . '-000' . $count,
            'description' => 'BC',
        ]);

        $count += 1;
        Grade::create([
            'code' => 'GRD-' . date("ymd") . '-000' . $count,
            'description' => 'CD',
        ]);

    }
}

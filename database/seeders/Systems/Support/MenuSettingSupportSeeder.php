<?php

namespace Database\Seeders\Systems\Support;

use Illuminate\Database\Seeder;
use App\Models\Systems\Subnavbars;

class MenuSettingSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subnavbars::create([
            'navbar_id' => '1',
            'name' => 'Data ',
            'url' => '/setting/a',
            'roles' => 'support'
        ]);
      
    }
}

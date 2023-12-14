<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Database\Seeders\Systems\CoreSeeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CoreSeeder::class);
        // Check app environment.
        // if (App::environment('local')) {
       
        // }
    }
}

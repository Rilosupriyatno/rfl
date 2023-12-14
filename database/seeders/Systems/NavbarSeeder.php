<?php

namespace Database\Seeders\Systems;

use App\Models\Systems\Navbars;
use Illuminate\Database\Seeder;
use App\Models\Systems\Subnavbars;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Navbars::truncate();
        Subnavbars::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // Navbars::create([
        //     'module' => 'fathmedic',
        //     'name' => 'Settings',
        //     'icon' => 'settings-1',
        //     'url' => '#',
        //     'roles' => "support,patient,nurse,doctor,pharmacist",
        //     'type' => 'dropdown'
        // ]);

        // Navbars::create([
        //     'module' => 'fathmedic',
        //     'name' => 'Master',
        //     'icon' => 'database',
        //     'url' => '#',
        //     'roles' => "admin-apotek,admin-klinik,admin-lab,pharmacist,administrator,doctor",
        //     'type' => 'dropdown'
        // ]);

        // Navbars::create([
        //     'module' => 'fathmedic',
        //     'name' => 'Transaksi',
        //     'icon' => 'flash',
        //     'url' => '#',
        //     'roles' => "admin-apotek,pharmacist,cashier",
        //     'type' => 'dropdown'
        // ]);

        // Navbars::create([
        //     'module' => 'fathmedic',
        //     'name' => 'Administrasi',
        //     'icon' => 'edit-square',
        //     'url' => '#',
        //     'roles' => "admin-apotek,admin-klinik,admin-lab,patient,nurse,doctor,pharmacist",
        //     'type' => 'dropdown'
        // ]);

        // Navbars::create([
        //     'module' => 'fathmedic',
        //     'name' => 'Laporan',
        //     'icon' => 'book',
        //     'url' => '#',
        //     'roles' => "admin-apotek,admin-klinik,nurse,doctor,pharmacy,cashier",
        //     'type' => 'dropdown'
        // ]);
    }
}

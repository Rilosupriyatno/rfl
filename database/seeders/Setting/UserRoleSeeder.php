<?php

namespace Database\Seeders\Setting;

use App\Models\Setting\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 1;
        UserRole::create([
            'code' => 'USR-' . date("ymd") . '-000' . $count,
            'name' => 'Petani',
            'description' => 'Petani',
            'dashboard_url' => '/dashboard'
        ]);

        $count += 1;
        UserRole::create([
            'code' => 'USR-' . date("ymd") . '-000' . $count,
            'name' => 'Buyer',
            'description' => 'Buyer',
            'dashboard_url' => '/dashboard/administrator'
        ]);
        $count += 1;
        UserRole::create([
            'code' => 'USR-' . date("ymd") . '-000' . $count,
            'name' => 'SuperAdmin',
            'description' => 'SuperAdmin',
            'dashboard_url' => '/dashboard/superadmin'
        ]);
    }
}

<?php

namespace Database\Seeders\Setting;

use App\Models\Setting\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_role_id' => 1, // Register sebagai system support. Refer Database\Seeders\Setting\UserRoleSeeder
            'category_id' => 3,
            'city_id' => 56,
            'name' => "Petani",
            'username' => "petani",
            'password' => bcrypt('petani'),
            'address' => "Cirebon",
            'phone' => "08122227333",
            'picture' => "-",
        ]);

        User::create([
            'user_role_id' => 2, // Register sebagai administrator. Refer Database\Seeders\Setting\UserRoleSeeder
            'category_id' => 1,
            'city_id' => 56,
            'name' => "Buyer",
            'username' => "buyer",
            'password' => bcrypt('buyer'),
            'address' => "Cirebon",
            'phone' => "08122227333",
            'picture' => "-",
        ]);
        User::create([
            'user_role_id' => 3, // Register sebagai administrator. Refer Database\Seeders\Setting\UserRoleSeeder
            'category_id' => 4,
            'city_id' => 56,
            'name' => "SuperAdmin",
            'username' => "superadmin",
            'password' => bcrypt('superadmin'),
            'address' => "Cirebon",
            'phone' => "08122227333",
            'picture' => "-",
        ]);
    }
}

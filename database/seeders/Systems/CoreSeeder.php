<?php

namespace Database\Seeders\Systems;

use App\Models\Setting\City;
use App\Models\Expedition;
use App\Models\Setting\User;
use App\Models\Setting\Village;
use App\Models\Systems\Navbars;
use Illuminate\Database\Seeder;
use App\Models\Setting\District;
use App\Models\Setting\Province;
use App\Models\Master\Grade;
use App\Models\Master\Category;
use App\Models\Setting\UserRole;
use App\Models\Administration\Seller\Product;
use App\Models\Administration\Seller\ProductPicture;
// use App\Models\Systems\Subnavbars;
use App\Models\Master\Construction;
use Database\Seeders\Setting\CitySeeder;
use Database\Seeders\Setting\UserSeeder;
use Database\Seeders\Systems\NavbarSeeder;
use Database\Seeders\Setting\DistrictSeeder;
use Database\Seeders\Setting\ProvinceSeeder;
use Database\Seeders\Setting\UserRoleSeeder;
use Database\Seeders\Setting\Village0Seeder;
use Database\Seeders\Setting\Village1Seeder;
use Database\Seeders\Setting\Village2Seeder;
use Database\Seeders\Setting\Village3Seeder;
use Database\Seeders\Setting\Village4Seeder;
use Database\Seeders\Setting\Village5Seeder;
use Database\Seeders\Setting\Village6Seeder;
use Database\Seeders\Setting\Village7Seeder;
use Database\Seeders\Setting\Village8Seeder;
use Database\Seeders\Setting\Village9Seeder;
use Database\Seeders\Setting\Village10Seeder;
use Database\Seeders\Setting\Village11Seeder;
use Database\Seeders\Setting\Village12Seeder;
use Database\Seeders\Setting\Village13Seeder;
use Database\Seeders\Setting\Village14Seeder;
use Database\Seeders\Setting\Village15Seeder;
use Database\Seeders\Setting\ProductSeeder;
use Database\Seeders\Setting\ProductPictureSeeder;
use Database\Seeders\Systems\SubnavbarSeeder;
use Database\Seeders\Master\ConstructionSeeder;
use Database\Seeders\Master\GradeSeeder;
use Database\Seeders\Master\CategorySeeder;
use Database\Seeders\ExpeditionSeeder;


class CoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeder = [];

        if (Category::count() == 0) {
            $seeder[] = CategorySeeder::class;
        }
        if (UserRole::count() == 0) {
            $seeder[] = UserRoleSeeder::class;
        }
        if (Province::count() == 0) {
            $seeder[] = ProvinceSeeder::class;
        }

        if (City::count() == 0) {
            $seeder[] = CitySeeder::class;
        }

        if (District::count() == 0) {
            $seeder[] = DistrictSeeder::class;
        }

        if (Village::count() == 0) {
            $seeder[] = Village0Seeder::class;
            $seeder[] = Village1Seeder::class;
            $seeder[] = Village2Seeder::class;
            $seeder[] = Village3Seeder::class;
            $seeder[] = Village4Seeder::class;
            $seeder[] = Village5Seeder::class;
            $seeder[] = Village6Seeder::class;
            $seeder[] = Village7Seeder::class;
            $seeder[] = Village8Seeder::class;
            $seeder[] = Village9Seeder::class;
            $seeder[] = Village10Seeder::class;
            $seeder[] = Village11Seeder::class;
            $seeder[] = Village12Seeder::class;
            $seeder[] = Village13Seeder::class;
            $seeder[] = Village14Seeder::class;
            $seeder[] = Village15Seeder::class;
        }

        if (User::count() == 0) {
            $seeder[] = UserSeeder::class;
        }

        // $seeder[] = NavbarSeeder::class;

        // $seeder[] = SubnavbarSeeder::class;
        if (Construction::count() == 0) {
            $seeder[] = ConstructionSeeder::class;
        }
        if (Grade::count() == 0) {
            $seeder[] = GradeSeeder::class;
        }
        if (Expedition::count() == 0) {
            $seeder[] = ExpeditionSeeder::class;
        }

        if (Product::count() == 0) {
            $seeder[] = ProductSeeder::class;
        }
        if (ProductPicture::count() == 0) {
            $seeder[] = ProductPictureSeeder::class;
        }


        // $seeder[] = DefaultMasterSeeder::class;

        $this->call($seeder);
    }
}

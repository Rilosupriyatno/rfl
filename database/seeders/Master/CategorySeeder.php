<?php

namespace Database\Seeders\Master;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'description' => 'None',
            'deleted_at' => now()
        ]);
        $count = 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/product/',
            'image' => 'assets/icons/chair-wicker.png',
            'description' => 'Produk Jadi',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/product/',
            'image' => 'assets/icons/rotan.svg',
            'description' => 'Bahan Baku Rotan',
        ]);
        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'description' => 'None',
            'deleted_at' => now()
        ]);
        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/product/',
            'image' => 'assets/icons/log.png',
            'description' => 'Bahan Baku Pendukung',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/product/',
            'image' => 'assets/icons/drill.png',
            'description' => 'Mesin/Alat Perlengkapan ',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/product/',
            'image' => 'assets/icons/chair-wicker.png',
            'description' => 'Servis Mesin/Alat',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/boxes-piles.png',
            'description' => 'Jasa Olah Bahan Baku',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/pen.png',
            'description' => 'Jasa Desain',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/bars.png',
            'description' => 'Jasa Anyam',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/chair.png',
            'description' => 'Jasa Rangka',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/woven.png',
            'description' => 'Jasa Anyam & Rangka',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/car-painting.png',
            'description' => 'Jasa Powder Coating',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/chair-wicker.png',
            'description' => 'Jasa Cushion',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/product.png',
            'description' => 'Jasa Finishing',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/toolbox.png',
            'description' => 'Sewa Peralatan',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/car-with-a-roof.png',
            'description' => 'Sewa Transportasi',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/warehouse.png',
            'description' => 'Sewa Gudang',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/flag.png',
            'description' => 'Sewa Bendera',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/graduation.png',
            'description' => 'Sertifikasi',
            'deleted_at' => now()
        ]);

        $count += 1;
        Category::create([
            'code' => 'KTR-' . date("ymd") . '-000' . $count,
            'url' => '/administration/katalog/service/',
            'image' => 'assets/icons/profit.png',
            'description' => 'Pembiayaan',
            'deleted_at' => now()
        ]);
    }
}

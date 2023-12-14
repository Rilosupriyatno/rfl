<?php

namespace Database\Seeders\Setting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administration\Seller\ProductPicture;


class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        ProductPicture::create([
            'product_id' => 1,
            'name' => 'assets/image/rotan1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

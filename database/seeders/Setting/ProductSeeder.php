<?php

namespace Database\Seeders\Setting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administration\Seller\product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        Product::create([
            'seller_id' => 1,
            'category_id' => 3,
            'grade_id' => 1,
            'name' => 'Rotan Manau',
            'description' => 'Rotan Manau',
            'price' => 120000,
            'stock' => 100,
            'unit' => 'Kg',
            'rattan_from' => 'Banjarmasin',
            'weight' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

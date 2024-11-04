<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Condiments',
            ],
            [
                'name' => 'Dairy',
            ],
            [
                'name' => 'Snacks',
            ],
            [
                'name' => 'Beverages',
            ],
            [
                'name' => 'Personal Care',
            ],
            [
                'name' => 'Canned Goods',
            ],
            [
                'name' => 'Cereal',
            ],
            [
                'name' => 'Frozen Foods',
            ],
            [
                'name' => 'Meat',
            ],
            [
                'name' => 'Bakery',
            ],
            [
                'name' => 'Vegetables',
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'name' => $category['name'],
                'is_active' => true,
            ]);
        }
    }
}

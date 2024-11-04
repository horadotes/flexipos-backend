<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_category_id' => 1,
                'barcode' => '4800024582461',
                'name' => 'Sweet Chili Sauce',
                'brand' => 'Del Monte',
                'quantity_onhand' => '0',
                'wholesale_unit' => 'PC',
                'retail_unit' => '1',
                'wholesale_quantity' => '1',
                'current_price' => '0',
                'reorder_point' => '1',
                'markup' => '10',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_category_id' => 4,
                'barcode' => '480198111998',
                'name' => 'Wilkins Pure Purified Water 1L',
                'brand' => 'Wilkins',
                'quantity_onhand' => '0',
                'wholesale_unit' => 'BOTTLE',
                'retail_unit' => '1',
                'wholesale_quantity' => '1',
                'current_price' => '0',
                'reorder_point' => '1',
                'markup' => '1',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_category_id' => 4,
                'barcode' => '4800049720121',
                'name' => 'Purified Drinking Water 1L',
                'brand' => 'Natures Spring',
                'quantity_onhand' => '0',
                'wholesale_unit' => 'BOTTLE',
                'retail_unit' => '1',
                'wholesale_quantity' => '1',
                'current_price' => '0',
                'reorder_point' => '1',
                'markup' => '1',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_category_id' => 5,
                'barcode' => '4800067453544',
                'name' => 'Hydrogen Peroxide (AGUA OXIGENADA) 120mL',
                'brand' => 'RHEA',
                'quantity_onhand' => '0',
                'wholesale_unit' => 'BOTTLE',
                'retail_unit' => '1',
                'wholesale_quantity' => '1',
                'current_price' => '0',
                'reorder_point' => '1',
                'markup' => '1',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more products as needed
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

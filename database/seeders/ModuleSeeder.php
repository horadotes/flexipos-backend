<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'name' => 'dashboard',
            ],
            [
                'name' => 'pos',
            ],
            [
                'name' => 'product_category',
            ],
            [
                'name' => 'product',
            ],
            [
                'name' => 'adjustment',
            ],
            [
                'name' => 'supplier',
            ],
            [
                'name' => 'customer',
            ],
            [
                'name' => 'employee',
            ],
            [
                'name' => 'bill',
            ],
            [
                'name' => 'bills_payment',
            ],
            [
                'name' => 'sales_invoice',
            ],
            [
                'name' => 'collections',
            ],
            [
                'name' => 'credit_memo',
            ],
            [
                'name' => 'spoilage',
            ],
            [
                'name' => 'replacement',
            ],
            [
                'name' => 'roles_and_permissions',
            ],
            [
                'name' => 'customer_return',
            ],
            [
                'name' => 'supplier_return',
            ],
        ];

        foreach ($modules as $module) {
            Module::create([
                'name' => $module['name'],
            ]);
        }
    }
}

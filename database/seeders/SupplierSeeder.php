<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Acme Corp',
                'address' => '123 Industry Road, Industrial City, State, 12345',
                'phone' => '1112223333',
                'alternate_phone' => '4445556666',
                'is_active' => true,
            ],
            [
                'name' => 'Tech Supplies Inc.',
                'address' => '456 Technology Ave, Silicon Valley, State, 54321',
                'phone' => '7778889999',
                'alternate_phone' => '0001112222',
                'is_active' => true,
            ],
            [
                'name' => 'Office Essentials',
                'address' => '789 Corporate Blvd, Business City, State, 67890',
                'phone' => '3334445555',
                'alternate_phone' => '6667778888',
                'is_active' => true,
            ],
            [
                'name' => 'Furniture World',
                'address' => '101 Furniture St, Decor Town, State, 78901',
                'phone' => '9990001111',
                'alternate_phone' => '2223334444',
                'is_active' => true,
            ],
            [
                'name' => 'Paper Products Ltd.',
                'address' => '202 Paper Lane, Print City, State, 89012',
                'phone' => '5556667777',
                'alternate_phone' => '8889990000',
                'is_active' => true,
            ],
            [
                'name' => 'Green Energy Co.',
                'address' => '303 Renewable Rd, Eco City, State, 90123',
                'phone' => '1234567890',
                'alternate_phone' => '0987654321',
                'is_active' => true,
            ],
            [
                'name' => 'Catering Supplies Inc.',
                'address' => '404 Catering Way, Food City, State, 01234',
                'phone' => '2345678901',
                'alternate_phone' => '1234567890',
                'is_active' => true,
            ],
            [
                'name' => 'Building Materials LLC',
                'address' => '505 Construction Dr, Build Town, State, 12345',
                'phone' => '3456789012',
                'alternate_phone' => '2345678901',
                'is_active' => true,
            ],
            [
                'name' => 'Fashion Textiles',
                'address' => '606 Textile Blvd, Fashion City, State, 23456',
                'phone' => '4567890123',
                'alternate_phone' => '3456789012',
                'is_active' => true,
            ],
            [
                'name' => 'Automotive Parts Co.',
                'address' => '707 Auto Parts Ln, Motor City, State, 34567',
                'phone' => '5678901234',
                'alternate_phone' => '4567890123',
                'is_active' => true,
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create([
                'name' => $supplier['name'],
                'address' => $supplier['address'],
                'phone' => $supplier['phone'],
                'alternate_phone' => $supplier['alternate_phone'],
                'is_active' => $supplier['is_active'],
            ]);
        }
    }
}

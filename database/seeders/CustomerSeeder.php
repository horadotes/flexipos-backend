<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'firstname' => 'WALK IN',
                'lastname' => 'CASH',
                'email' => 'walk-in.customer@flexipos.com',
                'phone' => 'none',
                'address' => 'none',
                'is_active' => true,
            ],
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890',
                'address' => '123 Main St, City, State, 12345',
                'is_active' => true,
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'email' => 'janesmith@example.com',
                'phone' => '2345678901',
                'address' => '456 Maple St, City, State, 54321',
                'is_active' => true,
            ],
            [
                'firstname' => 'Robert',
                'lastname' => 'Johnson',
                'email' => 'robertjohnson@example.com',
                'phone' => '3456789012',
                'address' => '789 Oak St, City, State, 67890',
                'is_active' => true,
            ],
            [
                'firstname' => 'Michael',
                'lastname' => 'Williams',
                'email' => 'michaelwilliams@example.com',
                'phone' => '4567890123',
                'address' => '101 Pine St, City, State, 78901',
                'is_active' => true,
            ],
            [
                'firstname' => 'Mary',
                'lastname' => 'Brown',
                'email' => 'marybrown@example.com',
                'phone' => '5678901234',
                'address' => '202 Cedar St, City, State, 89012',
                'is_active' => true,
            ],
            [
                'firstname' => 'Patricia',
                'lastname' => 'Jones',
                'email' => 'patriciajones@example.com',
                'phone' => '6789012345',
                'address' => '303 Birch St, City, State, 90123',
                'is_active' => true,
            ],
            [
                'firstname' => 'Jennifer',
                'lastname' => 'Garcia',
                'email' => 'jennifergarcia@example.com',
                'phone' => '7890123456',
                'address' => '404 Walnut St, City, State, 01234',
                'is_active' => true,
            ],
            [
                'firstname' => 'Linda',
                'lastname' => 'Martinez',
                'email' => 'lindamartinez@example.com',
                'phone' => '8901234567',
                'address' => '505 Chestnut St, City, State, 12345',
                'is_active' => true,
            ],
            [
                'firstname' => 'James',
                'lastname' => 'Rodriguez',
                'email' => 'jamesrodriguez@example.com',
                'phone' => '9012345678',
                'address' => '606 Redwood St, City, State, 23456',
                'is_active' => true,
            ],
            [
                'firstname' => 'William',
                'lastname' => 'Hernandez',
                'email' => 'williamhernandez@example.com',
                'phone' => '0123456789',
                'address' => '707 Poplar St, City, State, 34567',
                'is_active' => true,
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create([
                'firstname' => $customer['firstname'],
                'lastname' => $customer['lastname'],
                'email' => $customer['email'],
                'phone' => $customer['phone'],
                'address' => $customer['address'],
                'is_active' => $customer['is_active'],
            ]);
        }
    }
}

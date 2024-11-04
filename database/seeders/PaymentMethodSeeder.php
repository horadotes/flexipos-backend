<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $payment_methods = [
            [
                'name' => 'Credit Card',
                'type' => 'Card',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cash',
                'type' => 'Cash',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bank Transfer',
                'type' => 'Bank',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cheque',
                'type' => 'Cheque',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($payment_methods as $method) {
            PaymentMethod::create([
                'name' => $method['name'],
                'type' => $method['type'],
                'is_active' => $method['is_active'],
            ]);
        }
    }
}

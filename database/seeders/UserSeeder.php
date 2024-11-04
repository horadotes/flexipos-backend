<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'superadmin@flexipos.com',
            'password' => Hash::make('superadmin'),
        ]);

        User::create([
            'role_id' => 2,
            'firstname' => 'Johnny',
            'lastname' => 'Depp',
            'email' => 'admin@flexipos.com',
            'password' => Hash::make('admin'),
        ]);
    }
}

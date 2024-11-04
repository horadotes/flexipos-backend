<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'create',
            ],
            [
                'name' => 'read',
            ],
            [
                'name' => 'update',
            ],
            [
                'name' => 'delete',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role' => 'administrator',
            ],
            [
                'role' => 'kepala dinas',
            ],
            [
                'role' => 'operator',
            ],
        ];
        Role::insert($roles);
    }
}

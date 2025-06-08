<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'regex@admin.com',
                'nama' => 'Jregex root',
                'password' => bcrypt('admin123'),
                'role_id' => 1,
            ],
            [
                'email' => 'regex@example.com',
                'nama' => 'Jregex',
                'password' => bcrypt('admin123'),
                'role_id' => 3,
            ],
        ];
        User::insert($users);
    }
}

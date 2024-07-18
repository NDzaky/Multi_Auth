<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $users = [
            [
                'first_name' => 'Normal',
                'last_name' => 'User',
                'email' => 'User@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'first_name' => 'Superadmin',
                'last_name' => 'User',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'role' => 'superadmin',
            ],
        ];

        User::insert($users);
    }
}
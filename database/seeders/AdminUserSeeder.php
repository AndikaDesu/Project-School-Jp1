<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'dika@admin.com'],
            [
                'name' => 'Admin Kuywisata',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
    }
}

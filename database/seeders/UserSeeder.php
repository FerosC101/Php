<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@resume.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Vince Anjo R. Villar',
            'email' => 'vincevillar02@gmail.com',
            'password' => Hash::make('vince123'),
            'email_verified_at' => now(),
        ]);
    }
}
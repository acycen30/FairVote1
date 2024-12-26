<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@fairvote.com',
            'password' => Hash::make('password'), // Use a secure password
            'role' => 'admin',
        ]);

        // Organizer User
        User::create([
            'name' => 'Organizer User',
            'email' => 'organizer@fairvote.com',
            'password' => Hash::make('password'),
            'role' => 'organizer',
        ]);

        // Voter User
        User::create([
            'name' => 'Voter User',
            'email' => 'voter@fairvote.com',
            'password' => Hash::make('password'),
            'role' => 'voter',
        ]);
    }
}

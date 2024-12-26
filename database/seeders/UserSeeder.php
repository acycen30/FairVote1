<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@fairvote.com',
            'password' => Hash::make('adminyes'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Organizer User',
            'email' => 'organizer@fairvote.com',
            'password' => Hash::make('organizeryes'),
            'role' => 'organizer',
        ]);

        User::create([
            'name' => 'Voter User',
            'email' => 'voter@fairvote.com',
            'password' => Hash::make('voteryes'),
            'role' => 'voter',
        ]);
    }
}

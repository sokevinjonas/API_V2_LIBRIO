<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Jonas K',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'terms' => true,
            'country' => 'BF',
            'accountType' => 'admin',
            'profile_picture' => null,
            'bio' => 'Administrateur principal du système.',
        ]);
        User::factory()->create([
            'name' => 'SO Jonas K',
            'email' => 'sokevin7@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'terms' => true,
            'country' => 'BF',
            'accountType' => 'admin',
            'profile_picture' => null,
            'bio' => 'Administrateur principal du système.',
        ]);
    }
}
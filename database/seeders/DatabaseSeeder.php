<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test F2P User',
            'email' => 'user@example.com',
            'password'=> bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Test Buddy User',
            'email' => 'buddy@example.com',
            'role'=> 'buddy',
            'password'=>bcrypt('12345678'),
        ]);
    }
}

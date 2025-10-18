<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create a regular test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create an admin user for the admin-only login form
        // Email is used as username in the login form
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            // The User model casts 'password' => 'hashed', so passing plain text will be hashed
            'password' => 'password',
        ]);
    }
}

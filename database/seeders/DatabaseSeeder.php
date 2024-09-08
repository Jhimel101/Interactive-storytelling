<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Story;
use App\Models\Choice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call Author Seeder
        $this->call(AuthorSeeder::class);


        $user = User::create([
            'name' => 'User Example',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        $author = User::where('email', 'author@example.com')->first();
    }
}

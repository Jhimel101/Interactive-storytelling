<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Author Name',
            'email' => 'author@example.com',
            'password' => Hash::make('123456'), // use a secure password
            'role' => 'author',
        ]);
    }
}

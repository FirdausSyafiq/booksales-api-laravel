<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin1@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer1@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'customer'
        ]);
    }
}

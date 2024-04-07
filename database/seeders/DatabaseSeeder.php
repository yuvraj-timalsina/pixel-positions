<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Baby',
            'last_name' => 'Doe',
            'email' => 'admin@dev.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            JobSeeder::class,
        ]);
    }
}

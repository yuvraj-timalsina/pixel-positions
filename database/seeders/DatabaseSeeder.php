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
            'name' => 'John Doe',
            'email' => 'admin@dev.com',
        ]);

        $this->call([
            JobSeeder::class,
        ]);
    }
}

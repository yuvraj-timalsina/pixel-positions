<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'employer_id' => Employer::factory(),
            'salary' => '$'.fake()->numberBetween(30000, 120000),
        ];
    }
}

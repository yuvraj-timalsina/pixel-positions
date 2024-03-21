<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function find(int $id): array
    {
        return Arr::first(static::all(), fn ($job) => $job['id'] == $id) ?? abort(404);
    }

    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'PHP Developer',
                'salary' => '$50,000',
            ],
            [
                'id' => 2,
                'title' => 'Frontend Developer',
                'salary' => '$60,000',
            ],
            [
                'id' => 3,
                'title' => 'Backend Developer',
                'salary' => '$70,000',
            ],
        ];
    }
}

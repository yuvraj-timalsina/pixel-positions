<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/jobs', function () {
    return view('jobs',
        [
            'jobs' => [
                [
                    'id' => 1,
                    'title' => 'PHP Developer',
                    'salary' => '50,000',
                ],
                [
                    'id' => 2,
                    'title' => 'Frontend Developer',
                    'salary' => '60,000',
                ],
                [
                    'id' => 3,
                    'title' => 'Backend Developer',
                    'salary' => '70,000',
                ],
            ],
        ]);
})->name('jobs');

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'PHP Developer',
            'salary' => '50,000',
        ],
        [
            'id' => 2,
            'title' => 'Frontend Developer',
            'salary' => '60,000',
        ],
        [
            'id' => 3,
            'title' => 'Backend Developer',
            'salary' => '70,000',
        ],
    ];

    $job = Arr::first($jobs, fn ($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
})->name('job');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

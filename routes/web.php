<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->get();

    return view('jobs', ['jobs' => $jobs]);
})->name('jobs');

Route::get('/jobs/{id}', function ($id) {
    $job = Job::query()->find($id);

    return view('job', ['job' => $job]);
})->name('job');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

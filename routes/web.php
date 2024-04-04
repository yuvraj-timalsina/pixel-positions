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
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index', ['jobs' => $jobs]);
})->name('jobs');

Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('create');

Route::get('/jobs/{id}', function ($id) {
    $job = Job::query()->find($id);

    return view('jobs.show', ['job' => $job]);
})->name('job');

Route::post('jobs', function () {
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    return redirect()->route('jobs');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

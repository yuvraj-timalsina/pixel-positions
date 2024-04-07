<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('home');
})->name('home');

Route::get('/about', static function () {
    return view('about');
})->name('about');

Route::get('/jobs', static function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index', ['jobs' => $jobs]);
})->name('jobs');

Route::get('/jobs/create', static function () {
    return view('jobs.create');
})->name('jobs.create');

Route::get('/jobs/{id}', static function ($id) {
    $job = Job::query()->find($id);

    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

Route::post('jobs', static function () {
    request()?->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect()->route('jobs');
})->name('jobs.store');

Route::get('/contact', static function () {
    return view('contact');
})->name('contact');

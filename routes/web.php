<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('home');
})->name('home');

Route::get('/about', static function () {
    return view('about');
})->name('about');

// index
Route::get('/jobs', static function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index', ['jobs' => $jobs]);
})->name('jobs');

// create
Route::get('/jobs/create', static function () {
    return view('jobs.create');
})->name('jobs.create');

// show
Route::get('/jobs/{id}', static function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

// store
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

// edit
Route::get('/jobs/{id}/edit', static function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
})->name('jobs.edit');

// update
Route::patch('/jobs/{id}', static function ($id) {
    //
});

// destroy
Route::delete('/jobs/{id}', static function ($id) {
    //
})->name('jobs.destroy');

Route::get('/contact', static function () {
    return view('contact');
})->name('contact');

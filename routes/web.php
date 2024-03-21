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
    return view('jobs', ['jobs' => Job::all()]);
})->name('jobs');

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
})->name('job');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

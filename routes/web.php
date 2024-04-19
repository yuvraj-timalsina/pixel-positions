<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('', 'home')->name('home');
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');

Route::post('jobs', [JobController::class, 'store'])
    ->middleware('auth')
    ->name('jobs.store');

Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit-job', 'job')
    ->name('jobs.edit');

Route::put('jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->name('jobs.update');

Route::delete('jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->name('jobs.destroy');

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store'])->name('login');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout');

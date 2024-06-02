<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('', [JobController::class, 'index'])->name('home');

Route::get('jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
Route::post('jobs', [JobController::class, 'store'])->middleware('auth')->name('jobs.store');

Route::get('search', SearchController::class)->name('search');
Route::get('tags/{tag:name}', TagController::class)->name('tags');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store'])->name('login');
});

Route::delete('logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');

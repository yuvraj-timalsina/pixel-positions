<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('', 'home')->name('home');
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Route::resource('jobs', JobController::class);

Route::get('register', [RegisterUserController::class, 'create'])->name('register');
Route::post('register', [RegisterUserController::class, 'store'])->name('register-user');

Route::get('login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store'])->name('login-user');

<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

    Route::get('/', [RegisterController::class, 'index'])->name('auth.register');
    Route::get('/', [LoginController::class, 'index'])->name('auth.login');

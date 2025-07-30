<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PinController;
use App\Http\Controllers\BulkSMSController;
use App\Http\Controllers\CableController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ElectricityController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Architecture\Services\ServiceContainer;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware('auth', 'verified')->name('user.dashboard');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'showAdminDashboard'])->middleware('auth', 'verified')->name('admin.dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('/buyAirtime', [AirtimeController::class, 'showAirtime'])->name('user.buyAirtime');
Route::get('/buyCable', [CableController::class, 'showCable'])->name('user.buyCable');
Route::get('/buyData', [DataController::class, 'showData'])->name('user.buyData');
Route::get('/buyElectricity', [ElectricityController::class, 'showElectricity'])->name('user.buyElectricity');
Route::get('/buyExam', [ExamController::class, 'showExam'])->name('user.buyExam');
Route::get('/bulkSMS', [BulkSMSController::class, 'showBulkSMS'])->name('user.bulkSMS');
Route::get('/set-pin', [PinController::class, 'showPin'])->name('auth.set-pin');
Route::post('/set-pin', [PinController::class, 'storePin'])->name('auth.set-pin');
Route::get('/service', [ServiceController::class, 'showService'])->name('admin.service');


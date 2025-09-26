<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PinController;
use App\Http\Controllers\BillerController;
use App\Http\Controllers\BulkSMSController;
use App\Http\Controllers\CableController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerCareController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ElectricityController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.registerPost');
// Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::get('/login', [LoginController::class, 'index'])->name('login');      
Route::post('/login', [LoginController::class, 'login'])->name('auth.loginPost');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware('auth', 'verified')->name('user.dashboard');
    Route::get('/buyAirtime', [OrderController::class, 'showAirtime'])->name('user.showAirtime');
    Route::post('/buyAirtime', [OrderController::class, 'buyAirtime'])->name('user.buyAirtime');
    Route::get('/buyCable', [CableController::class, 'showCable'])->name('user.buyCable');
    Route::get('/buyData', [OrderController::class, 'showData'])->name('user.buyData');
    Route::get('/buyElectricity', [ElectricityController::class, 'showElectricity'])->name('user.buyElectricity');
    Route::get('/buyExam', [ExamController::class, 'showExam'])->name('user.buyExam');
    Route::get('/bulkSMS', [BulkSMSController::class, 'showBulkSMS'])->name('user.bulkSMS');
    Route::get('/set-pin', [PinController::class, 'showPin'])->name('auth.set-pin');
    Route::post('/set-pin', [PinController::class, 'storePin'])->name('auth.set-pinPost');
    Route::get('/wallet', [WalletController::class, 'getWalletBalance'])->name('user.wallet');
    Route::get('/order', [OrderController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/{order}', [OrderController::class, 'orderView'])->name('user.order.view');
    Route::get('/transaction', [TransactionController::class, 'transactionIndex'])->name('user.transaction.index');
    Route::get('/transaction/{transaction}', [TransactionController::class, 'transactionView'])->name('user.transaction.view');
    Route::get('/account', [AccountController::class, 'account'])->name('user.account');
    Route::get('/add_money', [AddMoneyController::class, 'addMoney'])->name('user.addMoney');
    Route::get('/customer_care', [CustomerCareController::class, 'customerCare'])->name('user.customerCare');
    Route::get('/payment', [PaymentController::class, 'payment'])->name('user.payment');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/setting', [SettingController::class, 'setting'])->name('user.setting');
    Route::get('/categories', [OrderController::class, 'loadCategories'])->name('categories.load');
    Route::get('/packages', [OrderController::class, 'loadPackages'])->name('packages.load');
    Route::get('/package/amount', [OrderController::class, 'loadAmount'])->name('package.amount');

}); 

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/dashboard', [AdminDashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::resource('service', ServiceController::class);
    Route::resource('biller', BillerController::class);
    Route::resource('category', CategoryController::class);
    // Route::post('/categories/update-status', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');
    Route::resource('package', PackageController::class);
    Route::resource('users_log', UserLogController::class);
});

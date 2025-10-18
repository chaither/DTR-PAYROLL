<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PayrollController;

// Login routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Dashboard routes (protected)
Route::middleware(['auth.session'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.index');
    Route::post('/payroll/process', [PayrollController::class, 'process'])->name('payroll.process');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('ensureIsUser');
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
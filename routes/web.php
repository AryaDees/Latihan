<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
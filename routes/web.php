<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');

Route::middleware('ensureIsUser')->group(function () {    
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//presensi
route::get('/presensi/create',[PresensiController::class, 'create']);
});
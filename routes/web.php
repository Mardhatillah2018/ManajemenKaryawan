<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::resource('/departemen', DepartemenController::class);
Route::resource('/jabatan', JabatanController::class);
Route::resource('/karyawan', KaryawanController::class);

Route::resource('/gaji', GajiController::class);
Route::patch('/gaji/{id}/ubah-status', [GajiController::class, 'ubahStatus'])->name('gaji.ubah-status');
Route::get('/gaji/{id}/cetak-pdf', [GajiController::class, 'cetakPdf'])->name('gaji.cetakPdf');



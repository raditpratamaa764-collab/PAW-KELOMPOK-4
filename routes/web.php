<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TambahController;
use Illuminate\Support\Facades\Route;

// Hanya guest (yang sudah login dialihkan ke '/')
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// Harus login (guest otomatis dialihkan ke /login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // User & Admin boleh melihat daftar
    Route::get('/', [TambahController::class, 'index'])->name('tambah.index');

    // Hanya admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/daftar-tambah', [TambahController::class, 'daftar'])->name('tambah.daftar');
        Route::post('/tambah', [TambahController::class, 'store'])->name('tambah.store');
        Route::get('/tambah/{tambah}/edit', [TambahController::class, 'edit'])->name('tambah.edit');
        Route::put('/tambah/{tambah}', [TambahController::class, 'update'])->name('tambah.update');
        Route::delete('/tambah/{tambah}', [TambahController::class, 'destroy'])->name('tambah.destroy');
    });
});
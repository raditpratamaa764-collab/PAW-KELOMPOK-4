<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\AuthController;


Route::get('/', [MejaController::class, 'index']);
Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');

Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});


Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/meja/tambah', [MejaController::class, 'create'])
        ->can('tambah-meja')
        ->name('meja.create');

    Route::post('/meja', [MejaController::class, 'store'])
        ->middleware('role:admin')
        ->name('meja.store');

    Route::middleware('role:admin,staff')->group(function(){
        Route::get('/meja/{meja}/edit', [MejaController::class, 'edit'])
            ->name('meja.edit')
            ->can('update', 'meja');
            
        Route::put('/meja/{meja}', [MejaController::class, 'update'])
            ->name('meja.update')
            ->can('update', 'meja');
    });

    Route::delete('/meja/{meja', [MejaController::class, 'destroy'])
        ->name('meja.destroy')
        ->middleware('role:admin')
        ->can('delete', 'meja');
});




Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e) {
        return 'DB gagal connect: ' . $e->getMessage();
    }
})->withoutMiddleware('web');
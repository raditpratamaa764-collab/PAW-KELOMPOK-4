<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;

Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');

Route::get('/meja/tambah', [MejaController::class, 'create'])->name('meja.create');
Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');

Route::get('/meja/{id}/edit', [MejaController::class, 'edit'])->name('meja.edit');
Route::put('/meja/{id}', [MejaController::class, 'update'])->name('meja.update');

Route::delete('/meja/{id}', [MejaController::class, 'destroy'])->name('meja.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes-koneksi', function () {
    try{
        DB::connection()->getPdo();
        return" DB berhasil connect!";
    } catch(\Exception $e) {
        return 'DB gagal connect: ' . $e->getMessage();
    }
})->withoutMiddleware('web');

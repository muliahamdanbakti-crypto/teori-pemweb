<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Selamat datang di Toko Web';
});

Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
Route::get('/promo', [\App\Http\Controllers\PromoController::class, 'index'])->name('promo.index');

Route::get('/laporan/stok', [LaporanController::class, 'index'])->name('laporan.stok');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{product}/edit', [ProdukController::class, 'edit'])->whereNumber('product')->name('produk.edit');
Route::put('/produk/{product}', [ProdukController::class, 'update'])->whereNumber('product')->name('produk.update');
Route::delete('/produk/{product}', [ProdukController::class, 'destroy'])->whereNumber('product')->name('produk.destroy');
Route::get('/produk/{product}', [ProdukController::class, 'detail'])->whereNumber('product')->name('produk.detail');


Route::get('/cari/{kata?}', function ($kata = 'semua') {
    return 'Mencari: '.$kata;
})->name('cari');
Route::get('/nota/{nomor}', [NotaController::class, 'show'])->whereNumber('nomor')->name('nota.show');
Route::get('/user/{nama?}', function ($nama = 'Tamu') {
    return 'Halo, '.$nama;
})->name('user.show');

// === INI YANG DI FOTO TADI - TARUH DI SINI PALING BAWAH ===
Route::middleware('auth')
    ->prefix('admin/laporan')
    ->name('admin.laporan.')
    ->group(function () {
        Route::get('/stok-menipis', [LaporanController::class, 'stokMenipis'])->name('menipis');
        Route::get('/stok-habis', [LaporanController::class, 'stokHabis'])->name('habis');
    });
<?php

use App\Http\Controllers\DaftarBeasiswaController;
use App\Http\Controllers\HasilBeasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', fn () => redirect()->route('daftar.index'));
// Route::get('/', [DaftarBeasiswaController::class, 'index'])->name('daftar');
Route::resource('/daftar', DaftarBeasiswaController::class);
Route::resource('/hasil', HasilBeasiswaController::class);
// Route::post('/upload', [DaftarBeasiswaController::class, 'cetakBarcode'])->name('produk.cetak_barcode');

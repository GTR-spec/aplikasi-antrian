<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\KendaraanController;

Route::get('/', [AntrianController::class, 'index']);

Route::patch('/antrian/{id}/status', [AntrianController::class, 'updateStatus'])->name('antrian.updateStatus');

Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');

Route::get('/laporan/pdf', [LaporanController::class, 'cetakLaporanPDF'])->name('laporan.pdf');
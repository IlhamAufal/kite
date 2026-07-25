<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DatalogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Authenticated routes (session timeout protected)
Route::middleware(['auth', 'session.timeout'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [AuthController::class, 'index'])->name('dashboard');
    });
    
    Route::get('/datalog', [DatalogController::class, 'index'])->name('datalog');
    
    Route::middleware(['auth'])->prefix('reports')->name('reports.')->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/pencatatan-penyesuaian', [ReportController::class, 'pencatatanPenyesuaian'])->name('pencatatan-penyesuaian');
    Route::get('/peb-change-log', [ReportController::class, 'pebChangeLog'])->name('peb-change-log');
    Route::get('/pemasukan-bahan-baku', [ReportController::class, 'pemasukanBahanBaku'])->name('pemasukan-bahan-baku');
    Route::get('/pemakaian-bahan-baku', [ReportController::class, 'pemakaianBahanBaku'])->name('pemakaian-bahan-baku');
    Route::get('/mutasi-bahan-baku', [ReportController::class, 'mutasiBahanBaku'])->name('mutasi-bahan-baku');
    Route::get('/pemasukan-hasil-produksi', [ReportController::class, 'pemasukanHasilProduksi'])->name('pemasukan-hasil-produksi');
    Route::get('/pengeluaran-hasil-produksi', [ReportController::class, 'pengeluaranHasilProduksi'])->name('pengeluaran-hasil-produksi');
    Route::get('/mutasi-hasil-produksi', [ReportController::class, 'mutasiHasilProduksi'])->name('mutasi-hasil-produksi');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\StatistikController as AdminStatistikController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

// -------------------------------------------------------------
// PUBLIC FRONTEND ROUTES
// -------------------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Rate limiting on contact submission (5 submissions per minute)
Route::post('/kontak', [KontakController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('kontak.store');

// -------------------------------------------------------------
// ADMIN PANEL ROUTES
// -------------------------------------------------------------
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // Auth Routes with Brute-Force Rate Limiting (5 attempts per minute)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('admin.login.submit');
        
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::resource('berita', AdminBeritaController::class)
            ->parameters(['berita' => 'berita'])
            ->names('admin.berita');

        Route::resource('galeri', AdminGaleriController::class)
            ->parameters(['galeri' => 'galeri'])
            ->except(['create', 'edit', 'show'])
            ->names('admin.galeri');

        Route::resource('statistik', AdminStatistikController::class)
            ->parameters(['statistik' => 'statistik'])
            ->except(['create', 'edit', 'show'])
            ->names('admin.statistik');
        
        Route::get('/kontak', [AdminKontakController::class, 'index'])->name('admin.kontak.index');
        Route::get('/kontak/{kontak}', [AdminKontakController::class, 'show'])->name('admin.kontak.show');
        Route::delete('/kontak/{kontak}', [AdminKontakController::class, 'destroy'])->name('admin.kontak.destroy');

        Route::get('/setting', [AdminSettingController::class, 'index'])->name('admin.setting.index');
        Route::post('/setting', [AdminSettingController::class, 'update'])->name('admin.setting.update');
    });
});
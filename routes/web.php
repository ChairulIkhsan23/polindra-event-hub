<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Staff\Dashboard as StaffDashboard;
use App\Livewire\Dosen\Dashboard as DosenDashboard;
use App\Livewire\Mahasiswa\Dashboard as MahasiswaDashboard;
use App\Livewire\Publik\Kegiatan\Index as PublikKegiatan;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    });

    Route::prefix('staff')->middleware('role:staff')->group(function () {
        Route::get('/dashboard', StaffDashboard::class)->name('staff.dashboard');
    });

    Route::prefix('dosen')->middleware('role:dosen')->group(function () {
        Route::get('/dashboard', DosenDashboard::class)->name('dosen.dashboard');
    });

    Route::prefix('mahasiswa')->middleware('role:mahasiswa')->group(function () {
        Route::get('/dashboard', MahasiswaDashboard::class)->name('mahasiswa.dashboard');
    });
});

// Route::get('/', PublikKegiatan::class)->name('home'); 

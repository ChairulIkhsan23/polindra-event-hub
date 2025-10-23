<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Staff\Dashboard as StaffDashboard;
use App\Livewire\Dosen\Dashboard as DosenDashboard;
use App\Livewire\Mahasiswa\Dashboard as MahasiswaDashboard;

/*
|--------------------------------------------------------------------------
| Root Route — Redirect to Login or Dashboard
|--------------------------------------------------------------------------
|
| Ketika user buka "/", maka:
| - Kalau belum login => redirect ke /login
| - Kalau sudah login => redirect ke dashboard sesuai role
|
*/
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        return match ($user->role->nama ?? '') {
            'Administrator' => redirect()->route('admin.dashboard'),
            'Staff'         => redirect()->route('staff.dashboard'),
            'Dosen'         => redirect()->route('dosen.dashboard'),
            'Mahasiswa'     => redirect()->route('mahasiswa.dashboard'),
            default         => redirect()->route('dashboard'),
        };
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Hanya untuk user login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboard::class)
        ->middleware('role:Administrator')
        ->name('admin.dashboard');

    Route::get('/staff/dashboard', StaffDashboard::class)
        ->middleware('role:Staff')
        ->name('staff.dashboard');

    Route::get('/dosen/dashboard', DosenDashboard::class)
        ->middleware('role:Dosen')
        ->name('dosen.dashboard');

    Route::get('/mahasiswa/dashboard', MahasiswaDashboard::class)
        ->middleware('role:Mahasiswa')
        ->name('mahasiswa.dashboard');
});

/*
|--------------------------------------------------------------------------
| Default dashboard fallback
|--------------------------------------------------------------------------
|
| Kalau nanti ada redirect default dari Breeze ke "/dashboard",
| maka Laravel akan otomatis arahkan sesuai role user.
|
*/
Route::middleware(['auth'])->get('/dashboard', function () {
    $user = auth()->user();

    return match ($user->role->nama ?? '') {
        'Administrator' => redirect()->route('admin.dashboard'),
        'Staff'         => redirect()->route('staff.dashboard'),
        'Dosen'         => redirect()->route('dosen.dashboard'),
        'Mahasiswa'     => redirect()->route('mahasiswa.dashboard'),
        default         => redirect()->route('login'),
    };
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze default)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

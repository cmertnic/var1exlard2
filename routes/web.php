<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});
Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin', [ReportController::class, 'adminIndex'])->name('admin.index');

    Route::get('/request', [ReportController::class, 'index'])->name('request.index');
    Route::get('/request/{tourId}', [ReportController::class, 'create'])->name('request.create');
    Route::post('/request', [ReportController::class, 'store'])->name('request.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
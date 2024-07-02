<?php

use Codehubcare\Moderyat\Http\Controllers\DashboardController;
use Codehubcare\Moderyat\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('pages', PageController::class);
});

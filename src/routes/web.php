<?php

use Codehubcare\Moderyat\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});

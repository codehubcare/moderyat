<?php

use Codehubcare\Moderyat\Http\Controllers\DashboardController;
use Codehubcare\Moderyat\Http\Controllers\PageController;
use Codehubcare\Moderyat\Http\Controllers\PostController;
use Codehubcare\Moderyat\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('moderyat')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('pages', PageController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});

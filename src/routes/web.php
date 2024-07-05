<?php

use Codehubcare\Moderyat\Http\Controllers\DashboardController;
use Codehubcare\Moderyat\Http\Controllers\PageController;
use Codehubcare\Moderyat\Http\Controllers\PasswordController;
use Codehubcare\Moderyat\Http\Controllers\PostCategoryController;
use Codehubcare\Moderyat\Http\Controllers\PostController;
use Codehubcare\Moderyat\Http\Controllers\UserController;
use Codehubcare\Moderyat\Http\Controllers\ProfileController;
use Codehubcare\Moderyat\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::prefix('moderyat')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('pages', PageController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('post-categories', PostCategoryController::class);

    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Change password
    Route::get('change-password', [PasswordController::class, 'index'])->name('change-password.index');
    Route::put('change-password', [PasswordController::class, 'update'])->name('change-password.update');

    // Settings
    Route::resource('settings', SettingsController::class);
    Route::post('process', [SettingsController::class, 'process'])->name('settings.process');
});

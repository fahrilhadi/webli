<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserChangePasswordController;
use App\Http\Controllers\Admin\AdminChangePasswordController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('user.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// route for user
Route::middleware(['auth', 'verified'])->group(function () {
    // profile
    Route::resource('/profile', UserProfileController::class, ['as' => 'user']);
    // change password
    Route::resource('/change-password', UserChangePasswordController::class, ['as' => 'user']);
});

require __DIR__.'/auth.php';

// group route with prefix "admin"
Route::prefix('admin')->group(function () {
    // group route with middleware "auth,role:admin"
    Route::middleware(['auth','role:admin'])->group(function () {
        // dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        // logout
        Route::get('/logout', [AdminLogoutController::class, 'destroy'])->name('admin.logout');
        // profile
        Route::resource('/profile', AdminProfileController::class, ['as' => 'admin']);
        // change password
        Route::resource('/change-password', AdminChangePasswordController::class, ['as' => 'admin']);
    });
});

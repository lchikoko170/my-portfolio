<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::post('/contact', [ContactMessageController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
|
| Guests can access the admin login page.
| Authenticated users are redirected away from these routes.
|
*/

Route::middleware('guest')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Admin Login Page
        Route::get('/login', [AdminAuthController::class, 'create'])
            ->name('login');

        // Process Admin Login
        Route::post('/login', [AdminAuthController::class, 'store'])
            ->name('login.store');
    });


/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
|
| Only authenticated users can access these routes.
|
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Admin Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Admin Logout
        Route::post('/logout', [AdminAuthController::class, 'destroy'])
            ->name('logout');
    });


/*
|--------------------------------------------------------------------------
| User Profile
|--------------------------------------------------------------------------
|
| Breeze profile management routes.
|
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Breeze Authentication Routes
|--------------------------------------------------------------------------
|
| Keep these if Breeze authentication is still installed.
|
*/

require __DIR__ . '/auth.php';
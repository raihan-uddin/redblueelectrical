<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Admin-only routes with 'admin' prefix
    Route::middleware(AdminMiddleware::class)
        ->prefix('admin')
        ->group(function () {
            Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');
            // Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
            // Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
            // Add more admin routes here
        });

});

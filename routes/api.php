<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\OrderController;
// use App\Http\Controllers\Api\SalesController;

// ====================
// Public routes
// ====================

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Products (customer + admin basic view)
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Admin product list (same controller, but different endpoint if needed)
Route::get('/admin/products', [ProductController::class, 'index']);

// ====================
// Protected routes (require token)
// ====================
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/dashboard/stats', [DashboardController::class, 'stats']);

    // Products (admin CRUD)
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // ✅ Orders (customer checkout → admin records order + sale)
    Route::post('/orders', [OrderController::class, 'store']);
});

/*
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/sales', [SalesController::class, 'index']);
});
*/

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

// Default route → Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Inventory Page
Route::get('/inventory', function () {
    return view('inventory');
})->name('inventory');

// Sales Page
Route::get('/sales', function () {
    return view('sales');
})->name('sales');

// Products Page
Route::get('/products', function () {
    return view('products');
})->name('products');

// Deliveries Page
Route::get('/deliveries', function () {
    return view('deliveries');
})->name('deliveries');

Route::get('/sales', [SalesController::class, 'index'])->name('sales');
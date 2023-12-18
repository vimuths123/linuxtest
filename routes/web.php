<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product routes
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    // Customer routes
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

    // Customer routes
    Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
    Route::post('issues/store', [IssueController::class, 'store'])->name('issues.store');
    Route::get('issues', [IssueController::class, 'index'])->name('issues.index');
    Route::get('/issues/{issue}', [IssueController::class, 'show'])->name('issues.show');
    Route::get('/issues/{issue}/edit', [IssueController::class, 'edit'])->name('issues.edit');
    Route::put('/issues/{issue}', [IssueController::class, 'update'])->name('issues.update');

    // Order routes
    Route::get('/place_order', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::post('/store_order', [OrderController::class, 'storePlacedOrder'])->name('order.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});




require __DIR__.'/auth.php';

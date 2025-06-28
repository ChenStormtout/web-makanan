<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

// Admin Controllers
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

// Customer Controllers
use App\Http\Controllers\Customer\MenuController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\HistoryController as CustomerHistoryController;

require __DIR__ . '/auth.php';

// ===============================
// Public / Guest Route
// ===============================
Route::get('/', function () {
    return view('welcome');
});

// ===============================
// Route yang Butuh Auth
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {

    // ===============================
    // Dashboard Umum
    // ===============================
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    // ===============================
    // Profil Pengguna
    // ===============================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ===============================
    // Keranjang (Cart) - Customer
    // ===============================
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('customer.cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('customer.cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('customer.cart.checkout');

    // ===============================
    // Admin Routes
    // ===============================
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Produk
        Route::resource('products', ProductController::class);

        // Pesanan
        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::put('orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::put('orders/{id}/done', [AdminOrderController::class, 'markAsDone'])->name('orders.done');
        Route::get('orders/{id}/invoice', [AdminOrderController::class, 'generateInvoice'])->name('orders.invoice');
        Route::delete('orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

        // Laporan Penjualan
        Route::get('reports', [AdminReportController::class, 'index'])->name('reports.index');
    });

    // ===============================
    // Customer Routes
    // ===============================
    Route::prefix('customer')->name('customer.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/history', [DashboardController::class, 'index'])->name('customer.history.index');
        Route::get('/orders', [DashboardController::class, 'orders'])->name('customer.orders');

        // Menu
        Route::get('/menu', [MenuController::class, 'index'])->name('menu');
        Route::get('/history', [HisController::class, 'index'])->name('admin.history.index');


        // Pesanan Aktif
        Route::get('/orders', [CustomerOrderController::class, 'index'])->name('orders');

        // Riwayat
        Route::get('/history', [CustomerHistoryController::class, 'index'])->name('history.index');
    });
});

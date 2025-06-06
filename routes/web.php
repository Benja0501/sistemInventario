<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\DiscrepancyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BatchController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

//Purchase Orders
Route::resource('purchase_orders', PurchaseOrderController::class);
Route::patch('purchase_orders/{purchaseOrder}/approve', [PurchaseOrderController::class, 'approve'])
    ->name('purchase_orders.approve')->middleware('auth');
Route::patch('purchase_orders/{purchaseOrder}/reject', [PurchaseOrderController::class, 'reject'])
    ->name('purchase_orders.reject')->middleware('auth');
//Receptions
Route::resource('receptions', ReceptionController::class)->middleware('auth');
//Discrepancies
Route::resource('discrepancies', DiscrepancyController::class)->middleware('auth');
//Products
Route::resource('products', ProductController::class)->middleware('auth');
//Suppliers
Route::resource('suppliers', SupplierController::class)->middleware('auth');
//Batches
Route::resource('batches', BatchController::class)->middleware('auth');
Route::get('batches/expiring-soon', [BatchController::class, 'expiringSoon'])
    ->name('batches.expiring')->middleware('auth');
//Notifications
Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.read')->middleware('auth');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

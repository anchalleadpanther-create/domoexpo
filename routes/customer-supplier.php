<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Seller\SellerController;
use App\Http\Controllers\Customer\Seller\ProductOrderController;

Route::middleware(['web', 'auth:buyer'])->prefix('seller')->name('seller.')->group(function () {
  Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
  Route::get('/profile', [SellerController::class, 'profile'])->name('profile');
  Route::patch('/profile/{id}', [SellerController::class, 'update'])->name('profile-update');

  Route::get('/product-orders/{type}/{status}', [ProductOrderController::class, 'index'])->name('products-orders');
  
  Route::get('/product-order-detail/{orderId}', [ProductOrderController::class, 'show'])->name('product-order-detail');

  Route::get('/product-order-change-status/{orderId}/{status}', [ProductOrderController::class, 'changeProductOrderStatus'])->name('product-order-change-status');

});

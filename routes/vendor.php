<?php

use App\Actions\Vendor\ProfileUpdate;
use Illuminate\Support\Facades\Route;
use App\Actions\Admin\Products\ExportProducts;
use App\Http\Controllers\Vendor\AuthController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProductOrderController;
use App\Http\Controllers\Customer\Buyer\UserSharedDocumentController;

Route::get('/vendor/login', [AuthController::class, 'create'])->middleware('guest')->name('vendor.login');
Route::post('/vendor/login', [AuthController::class, 'store'])->middleware('guest')->name('vendor.login');

Route::prefix('vendor')->name('vendor.')->middleware(['web', 'auth:vendor', 'CheckStatusAndLogout'])->group(function () {
  Route::view('/dashboard', 'vendors.dashboard')->name('dashboard');
  Route::view('/profile', 'vendors.profile')->name('profile');
  Route::post('/profile', ProfileUpdate::class)->name('profile');

  Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  Route::get('/export-products', ExportProducts::class)->name('products.export-products');
  Route::post('/update-stock', [ProductController::class, 'updateStock'])->name('products.update-stock');
  Route::get('/orders/{type}/{status}', [ProductOrderController::class, 'index'])->name('products-orders.index');
  Route::get('/orders/{id}', [ProductOrderController::class, 'show'])->name('products-orders.show');
  Route::get('/po-listing', [ProductOrderController::class, 'showPO'])->name('products-orders-po.show');

  Route::get('/user-shared-document', [UserSharedDocumentController::class, 'index'])->name('user-shared-document');
  Route::post('/save-user-shared-document', [UserSharedDocumentController::class, 'sendDocument'])->name('save-user-shared-document');
  Route::get('/boq-projects-for-documents', [UserSharedDocumentController::class, 'supplierBoqProjects'])->name('boq-projects-for-documents');
});

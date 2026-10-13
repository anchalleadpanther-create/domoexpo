<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Admin\Supplier\ExpertBookings;
use App\Actions\Admin\Supplier\ExportSuppliers;
use App\Http\Controllers\Supplier\SupplierController;

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin')->name('admin.')->group(function () {

  Route::get('/supplier/status/{id}/{status}', [SupplierController::class, 'toggleStatus'])->name('supplier.status');
  Route::get('/supplier/access/{id}', [SupplierController::class, 'supplierStatus'])->name('supplier.access-status');
  
  Route::get('/supplier/{type}/{supplierStatus}', [SupplierController::class, 'index'])->name('supplier.index');

  Route::resource('suppliers', SupplierController::class)->except('index');

  Route::post('/supplier/change-password', [SupplierController::class, 'changePassword'])->name('supplier.change-password');

  Route::get('/expert-bookings', ExpertBookings::class)->name('expert-bookings');
  Route::get('/export-suppliers', ExportSuppliers::class)->name('export-suppliers');
  
  Route::get('/mapped-category/{supplierId}', [SupplierController::class, 'showMappedCategory'])->name('supplier.mapped-category');
  Route::post('/map-supplier-category', [SupplierController::class, 'mapSupplierCategory'])->name('supplier.map-supplier-category');
  
  
  Route::post('/supplier/activete-subscription-plan', [SupplierController::class, 'activateFreeSubscriptionPlan'])->name('supplier.activete-subscription-plan');
  
  
});

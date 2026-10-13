<?php

use App\Actions\Reports\UTMReport;
use App\Actions\Reports\OrderReport;
use App\Actions\Reports\BrandsReport;
use App\Actions\Reports\OrdersReport;
use Illuminate\Support\Facades\Route;
use App\Actions\Reports\CouponsReport;
use App\Actions\Reports\LocationReport;
use App\Actions\Reports\ProductsReport;
use App\Actions\Reports\CustomersReport;
use App\Actions\Reports\LineSheetReport;
use App\Actions\Reports\UTMSourceReport;
use App\Actions\Reports\CategoriesReport;
use App\Actions\Reports\DateWiseOrderReport;
use App\Http\Controllers\Reports\ExportReportsController;

Route::get('/admin/reports/facebook-products-report', [ ExportReportsController::class, 'facebookProductsReport'])->name('admin.facebook-products-report');
Route::get('/admin/reports/facebook-products-report-usa', [ ExportReportsController::class, 'facebookProductsReportUSA'])->name('admin.facebook-products-report-usa');
Route::get('/admin/reports/facebook-products-report-gbp', [ExportReportsController::class, 'facebookProductsReportGBP'])->name('admin.facebook-products-report-gbp');

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin/reports')->name('admin.')->group(function () {
  Route::get('/orders-report', OrdersReport::class)->name('orders-report');
  Route::get('/customers-report', CustomersReport::class)->name('customers-report');
  Route::get('/products-report', ProductsReport::class)->name('products-report');
  Route::get('/brands-report', BrandsReport::class)->name('brands-report');
  Route::get('/categories-report', CategoriesReport::class)->name('categories-report');
  Route::get('/line-sheet-report', LineSheetReport::class)->name('line-sheet-report');
  Route::get('/coupons-report', CouponsReport::class)->name('coupons-report');
  Route::get('/utm-report', UTMReport::class)->name('utm-report');
  Route::get('/utm-source-report', UTMSourceReport::class)->name('utm-source-report');
  Route::get('/location-report', LocationReport::class)->name('location-report');
  Route::get('/date-wise-order-report', DateWiseOrderReport::class)->name('date-wise-order-report');
  Route::get('/order-report', OrderReport::class)->name('order-report');
});

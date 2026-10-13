<?php

use App\Actions\GetCategory;
use App\Actions\ProductsViaSearch;
use App\Actions\GetProductsViaBrands;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalAjaxController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/get-categories', CategoryController::class);

Route::get('/get-category/{parentId}', GetCategory::class)->name('api.get-category');

Route::get('/getStates/{countryId}', [GlobalAjaxController::class, 'getStates'])->name('getStates');

Route::get('/getCities/{stateId}', [GlobalAjaxController::class, 'getCities'])->name('getCities');
Route::get('/getCitiesByCountry/{countryId}', [GlobalAjaxController::class, 'getCitiesByCountry'])->name('getCitiesByCountry');
Route::get('/getRazorPayKey', [GlobalAjaxController::class, 'getRazorPayKey'])->name('getRazorPayKey');

Route::get('/get-products-by-search', ProductsViaSearch::class)->name('get-products-by-search');

Route::get('/get-products-by-brands', GetProductsViaBrands::class)->name('get-products-by-brands');

Route::get('/validate-order-id', [GlobalAjaxController::class, 'validateOrderCounterId'])->name('validate-order-id');

Route::get('/get-selected-date-slots/{expertId}/{date}', [GlobalAjaxController::class, 'getSelectedDateSlots'])->name('get-selected-date-slots');
Route::get('/deleteSupplierMapCountry/{sellerID}/{date}', [GlobalAjaxController::class, 'getSelectedDateSlots'])->name('get-selected-date-slots');

Route::get('/get-products-by-category-id', [GlobalAjaxController::class, 'getProductsByCategoryId'])->name('get-products-by-category-id');

Route::get('/get-seller-quote-detail', [GlobalAjaxController::class, 'getSellerQuoteDetail'])->name('get-seller-quote-detail');


















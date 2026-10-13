<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalAjaxController;
use App\Http\Controllers\Api\Product\ProductController;

Route::get('get-products-by-category/{categoryId}', [ProductController::class, 'getProductByCategory']);

Route::get('product-details/{productId}/{typeOneId?}/{typeTwoId?}', [ProductController::class, 'getProductDetails']);

Route::get('all-products', [ProductController::class, 'getAllProducts']);

Route::get('get-product-id/{productId}/{typeOneId?}/{typeTwoId?}', [GlobalAjaxController::class, 'getProductId']);

Route::get('/get-delivery-pincode-info/{pincode}', [GlobalAjaxController::class, 'getDeliveryPincodeInfo'])->name('get-delivery-pincode-info');


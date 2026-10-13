<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Seller\SellerController;
use App\Http\Controllers\Customer\Seller\SellerAuthController;
use App\Http\Controllers\Customer\Seller\SellerProfileController;
use App\Http\Controllers\Customer\Seller\ProductOrderController;
use App\Http\Controllers\Customer\Seller\Product\SellerProductController;
use App\Http\Controllers\Customer\Seller\Service\SellerServiceController;
// use App\Http\Controllers\Customer\Seller\RFQ\RfqSellerLisitngController;

 
// Route::get('/seller-rfq-rfq', [RfqSellerLisitngController::class, 'index']);
  
Route::middleware(['Middleware404'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('seller', [SellerAuthController::class,'seller'])->name('seller')->middleware('Middleware404');
    Route::match(['get','post'],'seller-login', [SellerAuthController::class,'login'])->name('seller-login')->middleware('Middleware404');
    Route::get('seller-signup', [SellerAuthController::class,'signup'])->name('seller-signup')->middleware('guest:vendor');
    Route::post('save-seller-signup', [SellerAuthController::class,'store'])->name('save-seller-signup');
    Route::view('/forgot-password', 'customer.seller.forgot-password')->name('forgot-password');
    Route::post('/forgot-password', [SellerAuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/reset-password/{token}/{email}', [SellerAuthController::class, 'resetPasswordView'])->name('password.reset');
    Route::post('/set-new-password', [SellerAuthController::class, 'setNewPassword'])->name('set-new-password');
   
}); 


Route::middleware(['Middleware404','web', 'auth:vendor'])->prefix('seller')->name('seller.')->group(function () {
  Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
 
  Route::get('/manage-profile', [SellerProfileController::class, 'manage_profile'])->name('manage-profile');
  Route::get('/delete-mapped-category/{mappedCategoryid}', [SellerProfileController::class, 'deleteMappedSupplierCategory'])->name('delete-mapped-category');
  
  Route::any('/profile/{supplier_id}', [SellerProfileController::class, 'update'])->name('profile-update');
  Route::post('/save-seller-qna', [SellerProfileController::class, 'save_seller_qna'])->name('save-seller-qna');
  Route::post('/save-seller-client-testimonials', [SellerProfileController::class, 'save_client_testimonial'])->name('save-seller-client-testimonials');
  Route::get('/getTestimonial', [SellerProfileController::class, 'getTestimonial'])->name('getTestimonial');
  
  
  Route::get('/getSellerCategoryTableHtml', [SellerProfileController::class, 'getSellerCategoryTableHtml'])->name('get-seller-category-table-html');
  Route::get('/deleteSellerCategoryTableData/{row_id}', [SellerProfileController::class, 'deleteSellerCategoryTableData'])->name('delete-seller-category-table-data');
  
  Route::get('/getClientTestimonialsHtml', [SellerProfileController::class, 'getClientTestimonialsHtml'])->name('get-client-testimonials-html');
  Route::get('/deleteClientTestimonialsTableData', [SellerProfileController::class, 'deleteClientTestimonialsTableData'])->name('delete-client-testimonials-table-data');
  
  
  
  
  // company profile
  Route::get('/company-profile/{formType}', [SellerProfileController::class, 'company_profile'])->name('company-profile');
  Route::get('/online-store-profile/{formType}', [SellerProfileController::class, 'online_store_profile'])->name('online-store-profile');
  Route::get('/point-of-sale/{formType}', [SellerProfileController::class, 'point_of_sale'])->name('point-of-sale');
 
    Route::middleware(['check.supplier'])->group(function(){
      // Product
      Route::get('/seller-products', [SellerProductController::class, 'index'])->name('seller-products');
      Route::get('/edit-seller-product/{id}', [SellerProductController::class, 'edit'])->name('edit-seller-product');
      Route::post('/products/update/{id}', [SellerProductController::class, 'update'])->name('products.update');  
      Route::get('/create-seller-product', [SellerProductController::class, 'create'])->name('create-seller-product');
      Route::post('/products/store', [SellerProductController::class, 'store'])->name('products.store');
    
      // Service
      Route::get('/seller-services', [SellerServiceController::class, 'index'])->name('seller-services');
      Route::get('/edit-seller-service/{id}', [SellerServiceController::class, 'edit'])->name('edit-seller-service');
      Route::post('/service/update/{id}', [SellerServiceController::class, 'update'])->name('services.update');  
      Route::get('/create-seller-service', [SellerServiceController::class, 'create'])->name('create-seller-service');
      Route::post('/services/store', [SellerServiceController::class, 'store'])->name('services.store');
      Route::get('/services/change/status/{id}/{status}', [SellerServiceController::class, 'toggleStatus'])->name('services.change-service-status');
    
      Route::get('/product-orders/{type}/{status}', [ProductOrderController::class, 'index'])->name('products-orders');
      Route::get('/product-order-detail/{orderId}', [ProductOrderController::class, 'show'])->name('product-order-detail');
      Route::get('/product-order-change-status/{orderId}/{status}', [ProductOrderController::class, 'changeProductOrderStatus'])->name('product-order-change-status');
    });
  
  
  Route::get('/logout', [SellerController::class, 'logout'])->name('logout');
});
Route::get('/deleteSupplierMapCountry/{sellerId}/{countryId}', [SellerProfileController::class, 'deleteSupplierMapCountry'])->name('deleteSupplierMapCountry');


// Route::middleware(['web', 'auth:buyer'])->prefix('seller')->name('seller.')->group(function () {
//   Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
//   Route::get('/profile', [SellerController::class, 'profile'])->name('profile');
//   Route::patch('/profile/{id}', [SellerController::class, 'update'])->name('profile-update');
//   Route::get('/product-orders/{type}/{status}', [ProductOrderController::class, 'index'])->name('products-orders');
//   Route::get('/product-order-detail/{orderId}', [ProductOrderController::class, 'show'])->name('product-order-detail');
//   Route::get('/product-order-change-status/{orderId}/{status}', [ProductOrderController::class, 'changeProductOrderStatus'])->name('product-order-change-status');
// });

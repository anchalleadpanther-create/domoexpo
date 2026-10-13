<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Admin\Orders\Delhivery;
use App\Actions\Admin\Orders\AddOrderComment;
use App\Actions\Admin\Orders\UpdatePoPayment;
use App\Actions\Admin\Products\ExportProducts;
use App\Http\Controllers\GlobalAjaxController;
use App\Actions\Admin\Orders\RegenerateInvoice;
use App\Actions\Admin\Products\ProductEnquiries;
use App\Actions\Admin\Orders\PurchaseOrderStatus;
use App\Actions\Admin\Products\BulkProductUpload;
use App\Actions\Admin\Products\BulkUpdateProducts;
use App\Actions\Admin\Orders\BulkOrderStatusChange;
use App\Actions\Cron\GenerateBlueDartToken;
use App\Actions\Admin\Orders\GenerateBlueDartWaybill;;
use App\Http\Controllers\Ecommerce\BrandController;
use App\Http\Controllers\Ecommerce\TaxesController;
use App\Http\Controllers\Ecommerce\CouponController;
use App\Http\Controllers\Ecommerce\FilterController;
use App\Actions\Admin\Orders\RegeneratePOAndSendMail;
use App\Actions\Admin\Products\AbandonedCartProducts;
use App\Actions\Admin\Products\ExportProductsWithSku;
use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\Ecommerce\RatingListingController;
use App\Actions\Admin\Orders\PurchaseOrderStatusAdmin;
use App\Actions\Admin\Products\BulkProductImageUpload;
use App\Http\Controllers\Ecommerce\CategoryController;
use App\Http\Controllers\Ecommerce\ServiceCategoryController;
use App\Http\Controllers\Ecommerce\ShippingController;
use App\Actions\Admin\Orders\UpdateOrderAdvancedAmount;
use App\Http\Controllers\Ecommerce\SelfOrderController;
// use App\Http\Controllers\Ecommerce\ProductPricingController;
use App\Actions\Admin\Products\BulkUpdateProductsWithSku;
use App\Http\Controllers\Ecommerce\FilterValueController;
use App\Http\Controllers\Ecommerce\ProductTypeController;
use App\Http\Controllers\Ecommerce\ProductOrderController;
use App\Actions\Admin\Products\AbandonedCartProductRemarks;
use App\Http\Controllers\Ecommerce\ProductTypeValueController;
use App\Actions\Admin\Products\CreateAbandonedCartProductRemark;
use App\Actions\Admin\Products\BulkUpdateProductsCategoryWithSku;
use App\Http\Controllers\Ecommerce\CustomTailoredEnquiryController;
use App\Http\Controllers\Ecommerce\RequestForQuotationController;

use App\Http\Controllers\Ecommerce\BoqQuotationController;

use App\Http\Controllers\Ecommerce\PaymentReportController;




Route::get('/import-category', [CategoryController::class, 'importCategories'])->name('import-category');


Route::get('/get-categories-filters-and-product-types', [GlobalAjaxController::class, 'getCategoriesAndFilter'])->name('get-categories-filters-and-product-types');
Route::get('/get-service-categories-filters-and-product-types', [GlobalAjaxController::class, 'getServiceCategoriesAndFilter'])->name('get-service-categories-filters-and-product-types');

Route::get('get-brands', [GlobalAjaxController::class, 'getBrands'])->name('get-brands');

Route::get('get-product-type-length', [GlobalAjaxController::class, 'getProductTypeLength'])->name('get-product-type-length');

Route::get('/purchase-order/{status}/{pdfName}', PurchaseOrderStatus::class)->name('purchase-order-status');
Route::get('/purchase-order-admin/{status}/{pdfName}', PurchaseOrderStatusAdmin::class)->name('purchase-order-status-admin');

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin')->name('admin.')->group(function () {
  // Route::get('/product-pricing/{id}/{type}/edit', [ProductPricingController::class, 'edit'])->name('product-pricing.edit');
  // Route::patch('/product-pricing/{id}/{type}/update', [ProductPricingController::class, 'update'])->name('product-pricing.update');
  
  // Route::patch('/product-pricing/{id}/{type}/update', [ProductPricingController::class, 'update'])->name('product-pricing.update');
  
  Route::get('/payment-reports',[PaymentReportController::class,'index'])->name('payment-reports');
  // web.php
  Route::get('/payment-report/{id}/email-preview', [PaymentReportController::class, 'emailPreview'])->name('email-preview');
  Route::post('/payment-report/{id}/send-email', [PaymentReportController::class, 'sendEmail'])->name('send-email');
 Route::get('/payment-report/{id}/email-preview-pdf', [PaymentReportController::class, 'emailPreviewPdf'])->name('email-preview-pdf');



  

  Route::get('/generate/blueDartToken', GenerateBlueDartToken::class)->name('generate.blueDartToken');
  Route::get('/generate/blueDartWaybill', GenerateBlueDartWaybill::class)->name('generate.blueDartWaybill');
  
  Route::view('/products/bulk-upload', 'ecommerce.bulk-product-upload')->name('products.bulk-upload');
  Route::post('/products/bulk-upload', BulkProductUpload::class)->name('products.bulk-upload.store');

  Route::view('/products/bulk-image-upload', 'ecommerce.bulk-product-image-upload')->name('products.bulk-image-upload');
  Route::post('/products/bulk-image-upload', BulkProductImageUpload::class)->name('products.bulk-image-upload.store');
  Route::post('/product-images-sort', [ProductController::class, 'updateImageSorts'])->name('product-images.sort');
  Route::delete('/delete-product-image/{id}', [ProductController::class, 'deleteProductImage'])->name('delete-product-image');
  Route::get('/product-rating/{id}', [ProductController::class, 'productRatings'])->name('product-rating');
  Route::get('/product-rating/status/{id}/{status?}', [ProductController::class, 'toggleRatingStatus'])->name('ratingStatus');
  
  
  Route::get('ratings', [RatingListingController::class, 'ratings'])->name('ratings');
  Route::get('/product-rating/status/{id}/{status?}', [RatingListingController::class, 'toggleRatingStatus'])->name('ratingStatus');
  

  Route::get('/product-order-change-status/{orderId}/{status}', [ProductOrderController::class, 'changeProductOrderStatus'])->name('product-order-change-status');
  Route::post('/bulk-order-status-change/products', BulkOrderStatusChange::class)->name('bulk-order-status-change');
  Route::get('/regenerate-po/{poDocument}', RegeneratePOAndSendMail::class)->name('regenerate-po');
  Route::get('/regenerate-invoice/{invoiceDocument}', RegenerateInvoice::class)->name('regenerate-invoice');

  Route::post('/add-order-comment/{id}', AddOrderComment::class)->name('add-order-comment');

  Route::get('/get-intital-order-info/{customerId}', [SelfOrderController::class, 'getInitialOrderInfo'])->name('get-intital-order-info');
  Route::get('/check-coupon/{code}/{buyerId}', [SelfOrderController::class, 'checkCoupon'])->name('check-coupon');
  Route::get('/get-product-via-sku/{sku}', [SelfOrderController::class, 'getProductViaSku'])->name('get-product-via-sku');
  Route::post('/place-order', [SelfOrderController::class, 'placeOrder'])->name('place-order');

  Route::view('/products/bulk/update', 'ecommerce.bulk-product-update')->name('products.bulk-update');
  Route::post('/bulk-product-update', BulkUpdateProducts::class)->name('products.bulk-product-update');

  Route::view('/products/bulk/update-with-sku', 'ecommerce.bulk-product-update-with-sku')->name('products.bulk-update-with-sku');
  Route::post('/bulk-product-update-with-sku', BulkUpdateProductsWithSku::class)->name('products.bulk-product-update-with-sku');

  Route::view('/products-category/bulk/update-with-sku', 'ecommerce.bulk-product-category-update-with-sku')->name('products.bulk-product-category-update-with-sku');
  Route::post('/bulk-product-category-update-with-sku', BulkUpdateProductsCategoryWithSku::class)->name('products.bulk-product-category-update-with-sku');


  Route::get('/product-enquiries', ProductEnquiries::class)->name('products.product-enquiries');

  Route::get('/abandoned-cart', AbandonedCartProducts::class)->name('products.abandoned-cart');
  Route::post('/abandoned-cart-remark', CreateAbandonedCartProductRemark::class)->name('products.abandoned-cart-remark');
  Route::get('/get-abandoned-cart-remark/{id}', AbandonedCartProductRemarks::class)->name('products.get-abandoned-cart-remark');

  Route::get('/export-products', ExportProducts::class)->name('products.export-products');
  Route::get('/export-products-with-sku', ExportProductsWithSku::class)->name('products.export-products-with-sku');

  Route::post('/update-order-advanced-amount/{supplierOrderId}', UpdateOrderAdvancedAmount::class)->name('update-order-advanced-amount');

  // resource routes
  Route::post('/save-product-category', [CategoryController::class, 'saveProductCategory'])->name('save-product-category');
  Route::get('/map-product-category/{sku}', [CategoryController::class, 'mapProductCategory'])->name('map-product-category');
  
  
  Route::get('/map-related-category-list', [CategoryController::class, 'mapRelatedCategoryList'])->name('map-related-category-list');

  Route::delete('/delete-mapped-related-category/{id}', [CategoryController::class, 'deleteMappedRelatedCategory'])->name('delete-mapped-related-category');
  Route::get('/map-related-category', [CategoryController::class, 'mapRelatedCategory'])->name('map-related-category');
  Route::post('/save-related-category', [CategoryController::class, 'saveMapRelatedCategory'])->name('save-related-category');


  Route::put('/category-sort', [CategoryController::class, 'updateSorts'])->name('categories.sort');
  Route::get('/category/status/{id}/{status}', [CategoryController::class, 'toggleStatus'])->name('category.status');
  Route::get('/category/{parent_id}', [CategoryController::class, 'index'])->name('category.index');
  Route::get('/category/create/{parent_id}', [CategoryController::class, 'create'])->name('category.create');
  
  

  
  
  Route::get('/product/{type}', [ProductController::class, 'index'])->name('products.index');
  Route::put('/products/sort/update', [ProductController::class, 'sort'])->name('products.update-sort');
  Route::post('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');
  Route::post('/products/bulk-status-update', [ProductController::class, 'bulkStatus'])->name('products.bulk-status-update');
  Route::delete('/delete-product-category/{sku}/{categoryId}', [ProductController::class, 'deleteProductCategory'])->name('delete-product-category');
  Route::get('/products/status/{id}/{status}', [ProductController::class, 'toggleStatus'])->name('products.status');
  Route::get('/products-orders/{type}/{status}', [ProductOrderController::class, 'index'])->name('products-orders');
  Route::put('/product-type-sort', [ProductTypeController::class, 'updateSorts'])->name('product-type.sort');
  Route::get('/product-type/status/{id}/{status}', [ProductTypeController::class, 'toggleStatus'])->name('product-type.status');
  Route::get('/product-type-value/status/{id}/{status}', [ProductTypeValueController::class, 'toggleStatus'])->name('product-type-value.status');
  Route::patch('/product-type-value', [ProductTypeValueController::class, 'updateSorts'])->name('product-type-value.sort');
  Route::get('/filter/status/{id}/{status}', [FilterController::class, 'toggleStatus'])->name('filter.status');
  Route::patch('/filter/sort', [FilterController::class, 'updateSorts'])->name('filter.sort');
  Route::get('/filter-values/status/{id}/{status}', [FilterValueController::class, 'toggleStatus'])->name('filter-values.status');
  Route::patch('/filter-values/sort', [FilterValueController::class, 'updateSorts'])->name('filter-values.sort');
  Route::get('/brand/status/{id}/{status}', [BrandController::class, 'toggleStatus'])->name('brand.status');
  Route::get('/taxes/status/{id}/{status}', [TaxesController::class, 'toggleStatus'])->name('taxes.status');
  Route::get('/shipping/status/{id}/{status}', [ShippingController::class, 'toggleStatus'])->name('shipping.status');
  Route::get('/coupon-change-status/{id}/{status}', [CouponController::class, 'toggleStatus'])->name('coupon.status');
  Route::get('/delhivery', Delhivery::class);
  Route::post('/update-po-payment', UpdatePoPayment::class)->name('update-po-payment');
  
   
  Route::get('/service-category/{parent_id}', [ServiceCategoryController::class, 'index'])->name('service-category.index');
  Route::put('/service-category-sort', [ServiceCategoryController::class, 'updateSorts'])->name('service-categories.sort');
  Route::get('/service-category/status/{id}/{status}', [ServiceCategoryController::class, 'toggleStatus'])->name('service-category.status');
  Route::get('/service-category/create/{parent_id}', [ServiceCategoryController::class, 'create'])->name('service-category.create');
  
  

  Route::resource('category', CategoryController::class)->except(['index', 'create']);
  Route::resource('service-category', ServiceCategoryController::class)->except(['index', 'create']);
  
 
  
  Route::get('/category/export-products/{categoryId}', [CategoryController::class, 'exportProducts'])->name('category.export-products');
  Route::post('/category/import-products', [CategoryController::class, 'importProducts'])->name('category.import-products');
  Route::resource('products', ProductController::class)->except(['index']);
  Route::resource('product-orders', ProductOrderController::class)->except(['index']);
  
   Route::post('/change-rfq-status', [RequestForQuotationController::class, 'changeRFQStatus'])->name('change-rfq-status');
   Route::get('/requested-seller-quotation/{rfq_id}', [RequestForQuotationController::class, 'requestedSellerQuotation'])->name('requested-seller-quotation');

    Route::get('/contractor-projects', [BoqQuotationController::class, 'contractorProjects'])->name('contractor-projects');
     Route::get('project-detail-pdf/{boq_id}',[BoqQuotationController::class,'boqPDF'])->name('project-detail-pdf');
    Route::get('supplier-rate-quotation/{boq_id}/{contractor_id}',[BoqQuotationController::class,'supplierRateQuotation'])->name('supplier-rate-quotation'); 
     
    
  Route::resources([
    'product-type' => ProductTypeController::class,
    'product-type-value' => ProductTypeValueController::class,
    'filter' => FilterController::class,
    'filter-values' => FilterValueController::class,
    'brand' => BrandController::class,
    'taxes' => TaxesController::class,
    'shipping' => ShippingController::class,
    'coupon' => CouponController::class,
    'custom-tailored-enquiries' => CustomTailoredEnquiryController::class,
    'request-for-quotation' => RequestForQuotationController::class,
    'boq-projects' => BoqQuotationController::class,
  ]);
});

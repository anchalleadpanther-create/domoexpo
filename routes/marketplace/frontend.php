<?php

use App\Actions\StaticPage;
use App\Actions\Customer\Events;
use App\Actions\Customer\EventDetail;
use App\Actions\Customer\SetCurrency;
use Illuminate\Support\Facades\Route;
use App\Actions\Customer\EventRegister;
use App\Actions\Marketplace\DetailPage\ProductDetail;
use App\Actions\Marketplace\DetailPage\ServiceDetail;
use App\Actions\Marketplace\DetailPage\SupplierDetail;
use App\Actions\Marketplace\DetailPage\BuyerUsersDetail;
use App\Actions\Customer\Experts\Experts;
use App\Actions\Customer\GetProductFilters;
use App\Actions\Customer\DesignerOnboarding;
use App\Actions\Customer\Experts\BookExpert;
use App\Http\Controllers\GlobalAjaxController;
use App\Actions\Customer\EventExhibitorRegister;
use App\Actions\Customer\Experts\ExpertPackages;
use App\Http\Controllers\Customer\FAQController;
use App\Actions\Customer\Experts\ExpertPackageDetail;
use App\Http\Controllers\Customer\Blog\BlogController;
use App\Actions\Customer\AcceptClubExclusiveInvitation;
use App\Http\Controllers\Extensions\NewsletterController;
use App\Actions\Customer\SaveProductCustomTailoredEnquiry;
use App\Http\Controllers\Customer\ProductSearchController;
use App\Http\Controllers\Customer\CustomHomePagesController;
use App\Actions\Customer\Experts\ExpertPackageBookingConfirm;
use App\Http\Controllers\Customer\Designer\DesignerController;
use App\Http\Controllers\Customer\Girl\GirlController;
use App\Http\Controllers\Customer\RakhiController;

use App\Http\Controllers\Customer\Boy\BoyController;
use App\Http\Controllers\Customer\Personalised\PersonalisedController;
use App\Http\Controllers\Customer\ReturnFavoursController;
use App\Http\Controllers\Customer\WishlistController;

use App\Http\Controllers\Customer\RequestForQuotationController;
use App\Actions\Admin\Orders\GenerateShippingLabelBlueDart;


use App\Http\Controllers\Customer\HoliController;
use App\Http\Controllers\Customer\WeddingController;

use App\Http\Controllers\Marketplace\ComparisonController;
use App\Http\Controllers\Marketplace\ProductEnquiryController;
use App\Actions\Marketplace\SaveProductEnquiry;
use App\Actions\Marketplace\SaveRFQEnquiry;
use App\Http\Controllers\Marketplace\RatingController;


Route::name('customer.')->group(function () {
  Route::post('/product-enquiry/store', SaveProductEnquiry::class)->name('product-enquiry.store');
  Route::post('/rfq-enquiry/store', SaveRFQEnquiry::class)->name('rfq-enquiry.store');

  Route::get('/comparison', [ComparisonController::class,'index'])->name('product.compare');
  Route::get('/product/compare/store', [ComparisonController::class,'store'])->name('compare.store');
  
  Route::get('/supplier/comparison', [ComparisonController::class,'supplier_comparison'])->name('supplier.compare');
  Route::get('/product/supplier/store', [ComparisonController::class,'supplier_store'])->name('compare.supplier-store');
  
  Route::get('/remove/product/compare', [ComparisonController::class,'removeComparisonProdcuts'])->name('remove.compare');
//   Route::get('/product/enquiry', [ProductEnquiryController::class,'index'])->name('product.enquiry');
  
  
  Route::get('/supplier-detail/{supplier_id}', SupplierDetail::class)->name('supplier-detail');
  Route::get('/{categorySlug?}/{productSlug?}/{sku}/{uuid}/buy', ProductDetail::class)->name('product-detail');
  Route::get('/service/{serviceSlug?}', ServiceDetail::class)->name('service-detail');
  Route::get('/pages/{pageName}', StaticPage::class)->name('static-page');
  Route::get('/detail/{type}/{id}', BuyerUsersDetail::class)->name('buyer-users-detail');
  Route::post('/save-review', [RatingController::class,'saveRating'])->name('save-review');
  
  
  Route::get('/search/', [App\Http\Controllers\Marketplace\Listing\SearchListingController::class, 'lisitings'])->name('search');
  Route::get('/s/{categorySlug?}/{pagetype?}', [App\Http\Controllers\Marketplace\Listing\ServiceCategoryListingController::class, 'lisitings'])->name('service-category');
  Route::get('/p/{categorySlug?}/{pagetype?}', [App\Http\Controllers\Marketplace\Listing\CategoryProductListingController::class, 'lisitings'])->name('product-category');
  Route::get('/sh/{search?}/{pagetype?}', [App\Http\Controllers\Marketplace\Listing\ListingBySearchController::class, 'lisitings'])->name('listing-by-search');
  
 
  Route::get('/get-variant-detail/{productId}', [GlobalAjaxController::class, 'getVariantDetail'])->name('get-variant-detail');
  Route::get('/products-filters', GetProductFilters::class)->name('products-filters');

  Route::get('/product/filter/ajax', [CategoryProductListingController::class, 'productsFilteredAjax'])->name('products-filtered-ajax');
  Route::get('/product/filter', [CategoryProductListingController::class, 'productsFiltered']);


  Route::get('/designer/{brandSlug}', [DesignerController::class, 'products'])->name('designer-products');
  Route::get('/designer-filter/ajax/filters', [DesignerController::class, 'productsFilteredAjax'])->name('designer-products-filtered-ajax');
  Route::get('/designer-filter/filters', [DesignerController::class, 'productsFiltered']);

  Route::get('/products/search', [ProductSearchController::class, 'products'])->name('search-products');
  Route::get('/products/search/filter/ajax', [ProductSearchController::class, 'productsFilteredAjax'])->name('search-products-filtered-ajax');
  Route::get('/products/search/filter/', [ProductSearchController::class, 'productsFiltered']);

  Route::get('/blog/{blogName}/{blogId}', [BlogController::class, 'blogDetail'])->name('blog-detail');
  Route::get('/set-new-currency/pricing', SetCurrency::class)->name('set-currency');
 
});


Route::middleware(['web', 'auth:buyer'])->group(function () {
  Route::get('/rfq', [RequestForQuotationController::class, 'rfq'])->name('rfq');
  Route::post('/save-rfq', [RequestForQuotationController::class, 'Saverfq'])->name('save-rfq');
});
















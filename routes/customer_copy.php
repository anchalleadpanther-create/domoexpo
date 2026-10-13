<?php

// use App\Actions\StaticPage;
// use App\Actions\Customer\Events;
// use App\Actions\Customer\EventDetail;
// use App\Actions\Customer\SetCurrency;
// use Illuminate\Support\Facades\Route;
// use App\Actions\Customer\EventRegister;
// use App\Actions\Customer\ProductDetail;
// use App\Actions\Customer\Experts\Experts;
// use App\Actions\Customer\GetProductFilters;
// use App\Actions\Customer\DesignerOnboarding;
// use App\Actions\Customer\Experts\BookExpert;
// use App\Actions\Customer\SaveProductEnquiry;
// use App\Http\Controllers\GlobalAjaxController;
// use App\Actions\Customer\EventExhibitorRegister;
// use App\Actions\Customer\Experts\ExpertPackages;
// use App\Http\Controllers\Customer\FAQController;
// use App\Actions\Customer\Experts\ExpertPackageDetail;
// use App\Http\Controllers\Customer\Blog\BlogController;
// use App\Actions\Customer\AcceptClubExclusiveInvitation;
// use App\Http\Controllers\Extensions\NewsletterController;
// use App\Actions\Customer\SaveProductCustomTailoredEnquiry;
// use App\Http\Controllers\Customer\ProductSearchController;
// use App\Http\Controllers\Customer\CategoryProductController;
// use App\Http\Controllers\Customer\CustomHomePagesController;
// use App\Actions\Customer\Experts\ExpertPackageBookingConfirm;
// use App\Http\Controllers\Customer\Designer\DesignerController;
// use App\Http\Controllers\Customer\Girl\GirlController;
// use App\Http\Controllers\Customer\RakhiController;

// use App\Http\Controllers\Customer\Boy\BoyController;
// use App\Http\Controllers\Customer\ComparisonController;
// use App\Http\Controllers\Customer\Personalised\PersonalisedController;
// use App\Http\Controllers\Customer\ReturnFavoursController;
// use App\Http\Controllers\Customer\WishlistController;

// use App\Http\Controllers\Customer\RequestForQuotationController;
// use App\Actions\Admin\Orders\GenerateShippingLabelBlueDart;


// Route::get('/blogs', [BlogController::class, 'blogListing'])->name('blogs')->middleware('Middleware404');
// Route::get('/eid', [CustomHomePagesController::class, 'eid'])->name('eid')->middleware('Middleware404');
// Route::get('/store-locator', [CustomHomePagesController::class, 'storeLocator'])->name('store-locator')->middleware('Middleware404');
// Route::get('/return-favours', [ReturnFavoursController::class, 'returnFavours'])->name('return-favours')->middleware('Middleware404');

//   Route::get('/generate-shipping-label/{blueDartAwb}', [GenerateShippingLabelBlueDart::class,'handle'])->name('generate-shipping-label');
  
  
// Route::name('customer.')->group(function () {
//   Route::get('/get-variant-detail/{productId}', [GlobalAjaxController::class, 'getVariantDetail'])->name('get-variant-detail');
//   // Route::get('/men', [CustomHomePagesController::class, 'men'])->name('product-category');
//   // Route::get('/women', [CustomHomePagesController::class, 'women'])->name('product-category');
  
//   Route::get('/rfq', [RequestForQuotationController::class, 'rfq'])->name('rfq');
//   Route::post('/save-rfq', [RequestForQuotationController::class, 'Saverfq'])->name('save-rfq');

//   Route::get('/kids', [CustomHomePagesController::class, 'kids'])->name('product-category');
//   Route::get('/weddings', [CustomHomePagesController::class, 'weddings'])->name('product-category');
//   Route::get('/faq', [CustomHomePagesController::class, 'faq'])->name('faq');
//   Route::get('/fei-experts', Experts::class)->name('tfe-experts');
//   Route::get('/fei-expert-packages/{fullName}/{id}', ExpertPackages::class)->name('tfe-expert-packages');
//   Route::get('/fei-expert-package-detail/{packageName}/{packageId}', ExpertPackageDetail::class)->name('tfe-expert-package-detail');
//   Route::post('/tfe-expert-package-booking', BookExpert::class)->name('tfe-expert-package-booking');
//   Route::post('/tfe-expert-package-booking-confirmed', ExpertPackageBookingConfirm::class)->name('tfe-expert-package-booking-confirmed');
//   Route::get('/fei-events', Events::class)->name('tfe-events');
//   Route::get('/fei-event-details/{slug}', EventDetail::class)->name('tfe-event-details');
//   Route::post('/tfe-event-register', EventRegister::class)->name('tfe-event-register');
//   Route::post('/tfe-event-exhibitor-register', EventExhibitorRegister::class)->name('tfe-event-exhibitor-register');
//   Route::view('/designer-onboarding', 'customer.designers.designer-onboarding')->name('designer-onboarding');
//   Route::post('/designer-onboarding', DesignerOnboarding::class)->name('designer-onboarding');
//   Route::get('/designers/{letter?}', [DesignerController::class, 'designers'])->name('designers');
//   Route::get('/filter-designer-via-category-search-and-preference', [DesignerController::class, 'filterDesignersViaCategorySearchAndPreference'])->name('filter-designer-via-category-search-and-preference');

//   Route::get('/rakhi', [RakhiController::class, 'rakhi'])->name('rakhi');
//   Route::get('/girls', [GirlController::class, 'girls'])->name('girls');
//   Route::get('/boys', [BoyController::class, 'boys'])->name('boys');
//   Route::get('/personalised', [PersonalisedController::class, 'personalised'])->name('personalised');

//   Route::resource('compare', ComparisonController::class)->except(['create', 'show', 'edit']);

//   Route::get('/products-filters', GetProductFilters::class)->name('products-filters');

//   Route::get('/{categorySlug}', [CategoryProductController::class, 'products'])->name('product-category');
//   Route::get('/{categorySlug?}/{productSlug?}/{sku?}/{uuid?}/buy', ProductDetail::class)->name('product-detail');
//   Route::get('/product/filter/ajax', [CategoryProductController::class, 'productsFilteredAjax'])->name('products-filtered-ajax');
//   Route::get('/product/filter', [CategoryProductController::class, 'productsFiltered']);

//   Route::get('faq', FAQController::class)->name('faq');

//   Route::get('/blog/{blogName}/{blogId}', [BlogController::class, 'blogDetail'])->name('blog-detail');

//   Route::get('/designer/{brandSlug}', [DesignerController::class, 'products'])->name('designer-products');

//   Route::get('/designer-filter/ajax/filters', [DesignerController::class, 'productsFilteredAjax'])->name('designer-products-filtered-ajax');
//   Route::get('/designer-filter/filters', [DesignerController::class, 'productsFiltered']);

//   Route::get('/products/search', [ProductSearchController::class, 'products'])->name('search-products');

//   Route::get('/products/search/filter/ajax', [ProductSearchController::class, 'productsFilteredAjax'])->name('search-products-filtered-ajax');
//   Route::get('/products/search/filter/', [ProductSearchController::class, 'productsFiltered']);

//   Route::get('/pages/{pageName}', StaticPage::class)->name('static-page');

//   Route::view('/program/loyalty', 'customer.static.loyalty')->name('loyalty');

//   Route::get('/set-new-currency/pricing', SetCurrency::class)->name('set-currency');

//   Route::post('/customer/subscribe-newsletter', [NewsletterController::class, 'store'])->name('subscribe-newsletter');

//   Route::post('/product-enquiry/store', SaveProductEnquiry::class)->name('product-enquiry.store');
//   Route::post('/product-custom-tailored-enquiry/store', SaveProductCustomTailoredEnquiry::class)->name('product-custom-tailored-enquiry.store');
//   Route::get('/club-exclusive-invitation-accepted/{id}', AcceptClubExclusiveInvitation::class)->name('club-exclusive-invitation-accepted');
// });

<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Customer\Buyer\SaveAddress;
use App\Actions\Customer\Buyer\SendOrderOtp;
use App\Actions\Customer\Buyer\ApplyGiftCard;
use App\Actions\Customer\Buyer\CheckOrderOtp;
use App\Actions\Customer\Buyer\MoveToWishlist;
use App\Actions\Customer\Buyer\ApplyDiscountCoupon;
use App\Http\Controllers\Customer\RatingController;
use App\Actions\Customer\Buyer\RemoveDiscountCoupon;
use App\Http\Controllers\Customer\Buyer\AddressController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\AskForSampleController;
use App\Actions\ProductOrder\ChangeProductOrderStatus;
use App\Http\Controllers\Customer\Buyer\CartController;
use App\Http\Controllers\Customer\Buyer\BuyerController;
use App\Http\Controllers\Customer\Buyer\BookingController;
use App\Http\Controllers\Customer\Buyer\PackageController;
use App\Http\Controllers\Customer\Buyer\CheckoutController;
use App\Http\Controllers\Customer\Buyer\TimeSlotController;
use App\Actions\ProductOrder\CancelSingleProductOrderStatus;
use App\Http\Controllers\Customer\Buyer\BuyerAuthController;
use App\Http\Controllers\Customer\Buyer\ProductOrderController;

use App\Http\Controllers\Customer\Buyer\ProductEnquiryController;
use App\Http\Controllers\Customer\Buyer\RFQEnquiriesController;



use App\Http\Controllers\Customer\Buyer\ChatMessageController;

use App\Http\Controllers\Customer\Buyer\RFQ\RfqController;
use App\Http\Controllers\Customer\Buyer\ReceviedQuotationController;
use App\Http\Controllers\Customer\Buyer\AskForSampleControllerListing;
use App\Http\Controllers\Customer\Buyer\Wishlist\BuyerWishlistListController;

use App\Http\Controllers\Customer\Buyer\ReceviedQuotationFromContractorController;
use App\Http\Controllers\Customer\Buyer\RequestForQuotation\RequestForQuotationController;
use App\Http\Controllers\Customer\Buyer\BOQ\Architect\BoqQuotationController;
use App\Http\Controllers\Customer\Buyer\BOQ\Contractor\BoqQuotationForContractorController;
use App\Http\Controllers\Customer\Buyer\BOQ\Contractor\SupplierQuotationOnBoqController;
use App\Http\Controllers\Customer\Buyer\BOQ\QS\QSBOQController;
use App\Http\Controllers\Customer\Buyer\BOQ\QS\QSBOQTemplateController;

use App\Http\Controllers\Customer\Buyer\QS\QuantitySurveyorController;
use App\Http\Controllers\Customer\Buyer\BOQ\BoqQuotationPdfController;
use App\Http\Controllers\Customer\Buyer\RFQ\QuotationRequestController;
use App\Http\Controllers\Customer\Buyer\NotificationController;
use App\Http\Controllers\Customer\Buyer\UserSharedDocumentController;


Route::middleware(['guest:buyer'])->prefix('buyer')->name('buyer.')->group(function () { 
    Route::post('/sendRegistrationOtp', [BuyerAuthController::class, 'sendRegistrationOtp'])->name('send-registration-otp');

    Route::view('/start-buying', 'customer.buyers.start-buying')->name('start-buying');
    Route::view('/start-selling', 'customer.sellers.start-selling')->name('start-selling');
    Route::get('/register', [BuyerAuthController::class, 'register'])->name('register');
    Route::post('/register', [BuyerAuthController::class, 'store'])->name('register');
    // Route::get('/login', [BuyerAuthController::class, 'show'])->name('login');
    Route::match(['get','post'],'/login', [BuyerAuthController::class, 'login'])->name('login');
    Route::get('/login/google', [BuyerAuthController::class, 'loginViaGoogle'])->name('login.google');
    Route::get('/login/google/callback', [BuyerAuthController::class, 'googleLoginCallback'])->name('login.google.callback');
    Route::get('/login/facebook', [BuyerAuthController::class, 'loginViaFacebook'])->name('login.facebook');
    Route::get('/login/facebook/callback', [BuyerAuthController::class, 'facebookLoginCallback'])->name('login.facebook.callback');
    // Route::view('/forgot-password', 'customer.auth.forgot-password')->name('forgot-password');
    Route::view('/forgot-password', 'customer.buyer.forgot-password')->name('forgot-password');
   
    Route::post('/forgot-password', [BuyerAuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/reset-password/{token}/{email}', [BuyerAuthController::class, 'resetPasswordView'])->name('password.reset');
    
  });

  Route::middleware(['DiscountCouponCalculations'])->prefix('buyer')->name('buyer.')->group(function () {
    // Cart & checkout functionality
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/remove-from-cart/{cartItemId}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
    Route::get('/get-cart-products', [CartController::class, 'getCartProducts'])->name('get-cart-products');
    Route::get('/reduce-quantity/{cartItemId}', [CartController::class, 'reduceQuantity'])->name('reduce-quantity');
    Route::get('/increase-quantity/{cartItemId}/{maxStock}', [CartController::class, 'increaseQuantity'])->name('increase-quantity');
    Route::get('/remove-gifting/{cartItemId}', [CartController::class, 'removeGifting'])->name('remove-gifting');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('CheckForEmptyCart');
    Route::post('/save-address-as-guest', SaveAddress::class)->name('save-address-as-guest');
  });

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/remove-from-cart/{cartItemId}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
Route::get('/buyer/remove-all-products-from-cart', [CartController::class, 'removeAllProductsFromCart'])->name('buyer.remove-all-products-from-cart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
Route::get('/reduce-quantity/{cartItemId}', [CartController::class, 'reduceQuantity'])->name('reduce-quantity');
Route::get('/increase-quantity/{cartItemId}/{maxStock}', [CartController::class, 'increaseQuantity'])->name('increase-quantity');
// authenticated


// BOQ Routes
Route::middleware(['web', 'auth:buyer', 'CheckStatusAndLogout'])->prefix('buyer')->name('buyer.')
  ->group(function () {
        Route::get('/business-information', [BuyerController::class, 'businessInformation'])->name('business-information');
        Route::patch('/profile/{id}', [BuyerController::class, 'update'])->name('profile-update');
      Route::middleware(['check.isUserHaveActiveSubscription'])->group(function(){
          
          //  Architect Routes ---  Bill of Quantities (Projects)
          
          Route::get('/product-enquiry', [ProductEnquiryController::class, 'index'])->name('product-enquiry');
          Route::get('/rfq-enquiries', [RFQEnquiriesController::class, 'index'])->name('rfq-enquiries');
          // Messages
        Route::get('/chat-message', [ChatMessageController::class, 'index'])->name('chat-message');
        Route::post('/save-chat-message', [ChatMessageController::class, 'saveChatMessage'])->name('save-chat-message');
        Route::get('/chat-box/{chatWithUserId}/{chatWithUserType}', [ChatMessageController::class, 'chatBox'])->name('chat-box');
        Route::get('/get-chat-messages', [ChatMessageController::class, 'getChatMessages'])->name('get-chat-messages');
        Route::get('/buyer-product-wishlist-list', [BuyerWishlistListController::class, 'product_wishlist'])->name('buyer-product-wishlist-list');
        Route::get('/buyer-designer-wishlist-list', [BuyerWishlistListController::class, 'designer_wishlist'])->name('buyer-designer-wishlist-list');


        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::get('/get-unseen-notification-count', [NotificationController::class, 'unseenNotificationCount'])->name('get-unseen-notification-count');
        Route::get('/clear-all-notification', [NotificationController::class, 'clearAllNotification'])->name('clear-all-notification');
        
         
        
        Route::get('/user-shared-document', [UserSharedDocumentController::class, 'index'])->name('user-shared-document');
        Route::post('/save-user-shared-document', [UserSharedDocumentController::class, 'sendDocument'])->name('save-user-shared-document');
        
        
          Route::get('projects',[BoqQuotationController::class,'index'])->name('projects');
          Route::get('project-preview/{boq_id}',[BoqQuotationController::class,'show'])->name('project-preview');
          Route::get('create-boq',[BoqQuotationController::class,'create'])->name('create-boq');
          Route::post('save-create-boq',[BoqQuotationController::class,'save'])->name('save-create-boq');
          Route::get('edit-boq/{boq_id}',[BoqQuotationController::class,'edit'])->name('edit-boq');
          Route::get('create-revised-project/{boq_id}',[BoqQuotationController::class,'createRevisedProject'])->name('create-revised-project');
          Route::post('save-individual-category-group',[BoqQuotationController::class,'saveIndividualCategoryGroup'])->name('save-individual-category-group');
          Route::post('acceptance-status-by-architect-developer',[BoqQuotationController::class,'acceptanceStatusByArchitectDeveloper'])->name('acceptance-status-by-architect-developer');
          
          Route::get('change-boq-status/{boq_id}/{status}',[BoqQuotationController::class,'changeBOQStatus'])->name('change-boq-status');
          
          Route::get('proposed-qs-for-boq/{boq_id}',[BoqQuotationController::class,'qsProposedByArchitect'])->name('proposed-qs-for-boq');
          Route::post('acceptance-status-by-qs-architect',[BoqQuotationController::class,'acceptanceStatusByQsArchitect'])->name('acceptance-status-by-qs-architect');
          
          Route::get('qs-project-quantity/{qs_id}/{boq_id}',[BoqQuotationController::class,'qsProjectQuantity'])->name('qs-project-quantity');
          Route::get('approved-qs-project-quantity/{qs_id}/{boq_id}',[BoqQuotationController::class,'approvedQsProjectQuantity'])->name('approved-qs-project-quantity');
          
          Route::get('contractor-quotations/{boq_id}',[BoqQuotationController::class,'contractorQuotations'])->name('contractor-quotations');
          Route::get('contractor-quotation-detail/{boq_id}/{contractor_id}',[BoqQuotationController::class,'contractorQuotationDetail'])->name('contractor-quotation-detail');
          Route::get('contractor-quotation-detail-pdf/{boq_id}/{contractor_id}',[BoqQuotationController::class,'contractorQuotationDetailPDF'])->name('contractor-quotation-detail-pdf');
          
          //   qs Routes
           Route::get('add-project-quantity/{boq_id}',[QSBOQController::class,'addProjectQuantity'])->name('add-project-quantity');
           Route::post('save-project-quantity-by-qs',[QSBOQController::class,'saveProjectQuantityByQs'])->name('save-project-quantity-by-qs');

           Route::get('boq-templates',[QSBOQTemplateController::class,'index'])->name('boq-templates');
           Route::get('boq-template-create',[QSBOQTemplateController::class,'create'])->name('boq-template-create');
           Route::get('boq-template/{template_id}',[QSBOQTemplateController::class,'show'])->name('boq-template-show');
           Route::get('boq-template-edit/{template_id}',[QSBOQTemplateController::class,'edit'])->name('boq-template-edit');
           Route::get('boq-templates-list',[QSBOQTemplateController::class,'listForSelect'])->name('boq-templates-list');
           Route::post('save-boq-as-template',[QSBOQTemplateController::class,'saveFromBoq'])->name('save-boq-as-template');
           Route::post('store-boq-template',[QSBOQTemplateController::class,'store'])->name('store-boq-template');
           Route::put('update-boq-template/{template_id}',[QSBOQTemplateController::class,'update'])->name('update-boq-template');
           Route::post('import-boq-template/{boq_id}',[QSBOQTemplateController::class,'importToBoq'])->name('import-boq-template');
           Route::delete('remove-boq-template-from-project/{boq_id}',[QSBOQTemplateController::class,'removeFromBoq'])->name('remove-boq-template-from-project');
           Route::post('duplicate-boq-template/{template_id}',[QSBOQTemplateController::class,'duplicate'])->name('duplicate-boq-template');
           Route::delete('delete-boq-template/{template_id}',[QSBOQTemplateController::class,'destroy'])->name('delete-boq-template');
         
           //   Deevloper Routes 
            Route::get('proposed-architect-for-boq/{boq_id}',[BoqQuotationController::class,'architectsProposedByDeveloper'])->name('proposed-architect-for-boq');
        
            Route::get('project-detail-pdf/{boq_id}',[BoqQuotationPdfController::class,'show'])->name('project-detail-pdf');
          
          // Contractor Routes ---  Bill of Quantities (Projects)
          Route::get('all-projects',[BoqQuotationForContractorController::class,'index'])->name('all-projects');
          Route::get('project-detail/{boq_id}',[BoqQuotationForContractorController::class,'show'])->name('project-detail');
          Route::post('accept-boq-by-contractor',[BoqQuotationForContractorController::class,'acceptBoq'])->name('accept-boq-by-contractor');
          Route::post('send-to-supplier',[BoqQuotationForContractorController::class,'sendToSupplier'])->name('send-to-supplier');
          Route::post('add-contractor-markup-to-quote-architect',[BoqQuotationForContractorController::class,'addContractorMarkupToQuoteArchitect'])->name('add-contractor-markup-to-quote-architect');
          
          Route::get('supplier-quotation-on-boq/{boq_id}',[SupplierQuotationOnBoqController::class,'index'])->name('supplier-quotation-on-boq');
          Route::post('save-contractor-rate',[SupplierQuotationOnBoqController::class,'saveContractorRate'])->name('save-contractor-rate');
          
          //   Quantity Surveyor
          Route::resource('quantity-surveyor', QuantitySurveyorController::class);
      }); 
  });


Route::middleware(['web', 'auth:buyer', 'DiscountCouponCalculations', 'CheckStatusAndLogout'])->prefix('buyer')->name('buyer.')
  ->group(function () {
     
     
      
    Route::get('/dashboard/{divName?}', [BuyerController::class, 'dashboard'])->name('dashboard');
    
    
        
    
    
    
    
    
    Route::post('/set-new-password', [BuyerAuthController::class, 'setNewPassword'])->name('set-new-password');
    Route::post('/upload-gallary-images', [BuyerController::class, 'uploadGallaryImages'])->name('upload-gallary-images');
    
    
    Route::get('/become-a-seller', [BuyerController::class, 'becomeASeller'])->name('become-a-seller');
    Route::get('/seller-login-by-his-email/{email}', [BuyerController::class, 'sellerLoginByHisEmail'])->name('seller-login-by-his-email'); 
      
    Route::post('/add-product-review', [BuyerController::class, 'addProductReview'])->name('add-product-review');

    
    Route::patch('/expert-profile', [BuyerController::class, 'updateExpertDetails'])->name('expert-profile-update');

    Route::match(['get','post'],'/add-to-wishlist/{product_id?}', [WishlistController::class, 'addToWishlist'])->name('add-to-wishlist');
    Route::get('/move-to-wishlist/{buyerId}/{cartId}', MoveToWishlist::class)->name('move-to-wishlist');
    Route::get('/remove-from-wishlist/{id}', [WishlistController::class, 'removeFromWishlist'])->name('remove-from-wishlist');
    Route::match(['get','post'],'/add-to-wishlist-designer/{designer_id?}', [WishlistController::class, 'addDesignerToWishlist'])->name('add-to-wishlist-designer');
    Route::get('/remove-from-wishlist-designer/{id}', [WishlistController::class, 'removeDesignerFromWishlist'])->name('remove-from-wishlist-designer');

    
    Route::get('/ask-for-sample', [AskForSampleController::class, 'askForSample'])->name('ask-for-sample');

    Route::get('/apply-coupon', ApplyDiscountCoupon::class)->name('apply-coupon');
    Route::get('/remove-coupon', RemoveDiscountCoupon::class)->name('remove-coupon');

    Route::get('/apply-gift-card', ApplyGiftCard::class)->name('apply-gift-card');

    Route::get('/send-otp-for-order', SendOrderOtp::class)->name('send-otp-for-order');
    Route::get('/check-otp-for-order/{id}/{otp}', CheckOrderOtp::class)->name('check-otp-for-order');
    Route::post('/new-order', [ProductOrderController::class, 'store'])->name('new-order');
    Route::get('/order-successful/{orderId}', [ProductOrderController::class, 'orderSuccessful'])->name('order-successful');
    Route::get('/order-failed/{orderId}', [ProductOrderController::class, 'orderFailed'])->name('order-failed');
    Route::get('/order-detail/{orderId}', [ProductOrderController::class, 'show'])->name('order-detail');
    Route::get('/old-order-detail/{orderId}', [ProductOrderController::class, 'show_old_order'])->name('old-order-detail');
    
    Route::get('/order-status-update/{id}/{status}/{actionBy}/{type}', function ($id, $status, $actionBy, $type) {
      CancelSingleProductOrderStatus::run($id, $status, $actionBy, $type);
      return redirect()->back()->with('success', 'Order has been cancelled successfully');
    })->name('order-status-update');

    Route::post('/ccResponse', [ProductOrderController::class, 'ccResponse'])->name('ccResponse');
    Route::get('set-time-slot-exclusions/{id}/{exludingDate}', [TimeSlotController::class, 'setExclusions'])->name('time-slot.set-exclusions');
    Route::get('/packages/status/{id}/{status}', [PackageController::class, 'toggleStatus'])->name('packages.status');
    Route::get('/packages/set-default/{id}', [PackageController::class, 'setDefault'])->name('packages.set-default');

    Route::get('/rfqs', [RfqController::class, 'index'])->name('buyer-rfq');
    Route::get('/quotation-detail/{rfq_id}', [QuotationRequestController::class, 'quotationDetail'])->name('quotation-detail');
    Route::get('/quotation-requests', [QuotationRequestController::class, 'index'])->name('quotation-requests');
    Route::post('/map-supplier-to-rfq', [QuotationRequestController::class, 'mapSupplierToRfq'])->name('map-supplier-to-rfq');
    
    
    Route::get('/buyer-create-rfq/{rfq_step?}/{rfq_id?}', [RfqController::class, 'create'])->name('buyer-create-rfq');
    Route::post('/buyer-save-rfq', [RfqController::class, 'save_rfq'])->name('buyer-save-rfq');
    
    // Route::get('/recevied-quotation', [RfqLisitngController::class, 'index'])->name('recevied-quotation');
    
     Route::get('/recevied-quotation-from-contractor/{rfq_id}', [ReceviedQuotationFromContractorController::class, 'index'])->name('recevied-quotation-from-contractor');
     Route::post('/accept-particular-contracotor-quotation-by-architector', [ReceviedQuotationFromContractorController::class, 'acceptParticularContracotorQuotationByArchitector'])->name('accept-particular-contracotor-quotation-by-architector');

    Route::get('/recevied-quotation/{rfq_id}', [ReceviedQuotationController::class, 'index'])->name('recevied-quotation');
    Route::post('/accept-particular-seller-quotation-by-buyer', [ReceviedQuotationController::class, 'acceptParticularSellerQuotationByBuyer'])->name('accept-particular-seller-quotation-by-buyer');

    Route::get('/rfq-pdf-detail/{seller_quotation_id}', [ReceviedQuotationController::class, 'rfq_pdf_detail'])->name('rfq-pdf-detail');

    Route::get('/ask-for-sample-listing',[AskForSampleControllerListing::class,'index'])->name('ask-for-sample-listing');

    Route::get('/my-bookings', [BookingController::class, 'index'])->name('my-booking.index');
    Route::get('/change-booking-status/{id}/{status}', [BookingController::class, 'toggleStatus'])->name('my-booking.status');
    Route::get('/wishlist', [BuyerController::class, 'wishlist'])->name('wishlist');
    Route::resources([
      'address' => AddressController::class,
      'rating' => RatingController::class,
      'time-slot' => TimeSlotController::class,
      'packages' => PackageController::class,
    ]);
    
    

    Route::get('/logout', [BuyerController::class, 'logout'])->name('logout');
  });
  
  
  
 

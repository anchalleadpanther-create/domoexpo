<?php

use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Actions\Admin\Orders\DHL;
use App\Http\Controllers\Controller;
use App\Mail\Customer\AbandonedCart;
use Illuminate\Support\Facades\Route;
use App\Mail\Customer\PasswordResetMail;
use App\Actions\Cron\CreditRewardAllotment;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomHomePagesController;

use App\Http\Controllers\Marketplace\IndexController;

// use App\Http\Controllers\Purchasync\IndexController;
use App\Mail\SendGiftCard;

use App\Http\Controllers\JccPaymentController;
use App\Services\FirebaseNotificationService;
use App\Http\Controllers\GlobalAjaxController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/index1', CustomerHomeController::class)->name('index1');
// Route::get('/', [CustomHomePagesController::class, 'index1'])->name('home')->middleware('setReferralInSession','Middleware404');
// Route::get('/index', [CustomHomePagesController::class, 'index1'])->name('home')->middleware('setReferralInSession');



Route::get('/checkout', [JccPaymentController::class, 'checkout'])->name('checkout');
Route::post('/jcc/order', [JccPaymentController::class, 'createOrder'])->name('jcc.order');
Route::get('/jcc/payment/callback', [JccPaymentController::class, 'return'])->name('jcc.return');
Route::get('/jcc/fail', [JccPaymentController::class, 'fail'])->name('jcc.fail');




//  firebase notification testing
Route::get('/noti', function (FirebaseNotificationService $firebaseNotificationService) {  
    $title = "Domo";
    $message = "Notification from Domo";
    // $token = "dfiinu7oR8-VotXaRoWFNK:APA91bGqxTShzuciOzVCNotIVdoWnhkHvqy1AGmWXOhaG9qCYwp_G5ovy0Eq2DULPtz4ZJLlyy8pnO4Da8vare2T43FXjF_IKfbrpBRa3c1iVaOb8WlRBTc";
    
    // $token ="cYFd0SsvSk-T4YsU03T14a:APA91bERoCP5hRpRqFkKdpqP-6oWXC1bKb9aq8vd0zCW5u0bViHZWislElgL2o6ZESUdvWkunKx0udM7eA8NRIQDdQMQzCJdb5LQwH-6LS6C8JLyp-CX5jk";
    // $token = "fxAdMEbv1RByavgftJRIi5:APA91bENCkx8s2VgRew1oEdguneBXVJ3wy5njjWaLXyIRLU_zuIxKx2kwoL9R6iboXyKflU5_dZKVoUXhSamKdFf6MN9YYAdgjbEtWNN12p6ceuJocBzcyA";
    // vishal macbook token
    // $token = "dlVCfBrOzDGzFS3uhZjQdH:APA91bEl6R3FjdtLZv9tmENvtaZUCYpAeIcPFj8dqvFFOaRZTRG2qmbNaRWqnZVo2UCnNc_u_oJ8UnJVLFP7mJwVahMrvi_zOc6jSoAr46LpCwMp-xnK0a0";
    
    
    //  $token ="fqQO8s-ahQSS2VjIqEcnDF:APA91bHec4GAcsdokTwHzbQQVre5-DuFcRnYsB0JbXMh_WCKG6cDToW2zPNUBEyKaqC3iv0lVk-ToDBTOIwxH6LFQ2oxvWhQEuaBQrNG_qayKVp7yaskjSo";
     
     $token ="fqQO8s-ahQSS2VjIqEcnDF:APA91bGlExMHviCpuS5dlKaHefCKCv-QySKYRxwmYe3r_PpdyPEFC3_9S9lYk8cHYFZuJaDCfaKHM-3JOhzlBkj4yuBjqg2fbkeVJ8zG20XPKjnDO-HIu_c";
   
//   $response =  SendFirebaseNotification($token, $title, $message);
    $response = $firebaseNotificationService->sendMessage($token,$title,$message);

    return response()->json($response);
  
});
// end of firebase notification




Route::middleware(['web'])->group(function () {
  Route::post('/save-fcm-device-token', [GlobalAjaxController::class, 'saveToken'])->name('save-fcm-device-token');
});


Route::get('clear', function() {
    \Artisan::call('optimize:clear');
    return "Cache is cleared";
});


Route::get('changeAdminPassword',function(){
  $admin =  \App\Models\User::where('email','admin@gmail.com')->first();
  $admin->password = "domo#332211#";
  $admin->save();
});

Route::get('/testemail', function () {
  return view('emails.customer.thankyou');
  // return "sndfklsdk";
  // return new AbandonedCart(['product' => Cart::find(42)]);
  return new SendGiftCard(['product' => Cart::find(48)]);
});



Route::get('/',[IndexController::class,'index'])->name('home')->middleware('setReferralInSession');


// Route::get('/seller-rfq', [RfqLisitngController::class, 'index'])->name('buyer-rfq');
// Route::get('/seller-rfq', function(){
//     return  "dfdsf";
// })->name('buyer-rfq');   
Route::get('mail-testing', [Controller::class, 'mailTesting']);

Route::get('dhl', DHL::class);

Route::get('/admin/login', function () {
  return view('user.index');
})->middleware('guest')->name('admin.home');

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth', 'CheckStatusAndLogout'])
  ->group(function () {
    Route::resources([
      'dashboard' => UserController::class,
    ]);
  }); 

// admin route files
require __DIR__ . '/auth.php';
require __DIR__ . '/extensions.php';
require __DIR__ . '/ecommerce.php';
require __DIR__ . '/supplier.php';
require __DIR__ . '/buyer.php';
require __DIR__ . '/ticket.php';
require __DIR__ . '/reports.php';
require __DIR__ . '/events.php';

// user like buyer seller routes.
 require __DIR__ . '/customer.php';
require __DIR__ . '/customer-buyer.php';

// vendor routes files
require __DIR__ . '/vendor.php';

// purchasync
require __DIR__ . '/marketplace/customer-seller.php';
require __DIR__ . '/marketplace/frontend.php'; 


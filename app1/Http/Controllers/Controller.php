<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use Illuminate\Support\Arr;
use App\Models\Buyer\Wallet;
use App\Traits\ApiResponser;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Coupon;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\Buyer\PackageBooking;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Ecommerce\ProductType;
use Illuminate\Support\Facades\Crypt;
use App\Actions\GetCategoriesOfProducts;
use Spatie\Newsletter\Facades\Newsletter;
use App\Models\Ecommerce\ProductTypeValue;
use GuzzleHttp\Exception\RequestException;
use App\Actions\GetColorAndSizesForFilters;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\Ecommerce\ProductMappedCategory;
use App\Actions\Cron\WalletReminderNotification;
use App\Actions\GetOccasionAvailabilityAndMaterial;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Repositories\Customer\CategoryProductsRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\FileUpload;
use App\Mail\Customer\RegistrationBuyerEmail;
use App\Models\TransactionHistory;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponser, WhatsappNotification,FileUpload;

  public function __construct(private CategoryProductsRepository $CategoryProductsRepository)
  {
  }

  public function mailTesting()
  {
    // return WalletReminderNotification::run();
    // $buyer = Buyer::find(2110);
    // Mail::to('manavsehgal77@gmail.com')->send(new \App\Mail\Customer\RegistrationEmail(['buyer' => Buyer::findOrFail(2110)]));
    // dd('hello');
    // return new \App\Mail\Customer\ExpertBooking(['booking' => PackageBooking::findOrFail(19)]);
    // return new \App\Mail\Customer\RegistrationBuyerEmail(['buyer' => Buyer::findOrFail(190)]);
    $buyer = Buyer::findOrFail(195);
    $purchaseHistory = TransactionHistory::findOrFail(60);
     Mail::to($buyer->email)->send(
    new \App\Mail\Customer\BuyerSubscriptionPurchaseEmail(['user' => $buyer,'purchaseHistory'=>$purchaseHistory])
);
return 1;
    // return new \App\Mail\Customer\NewsLetterEmail([
    //   'order' => Order::find(22),
    //   'status' => 6,
    //   'orderItems' => Order::find(10)->orderItems,
    //   'trackingUrl' => '',
    //   'amounts' => ['subTotal' => 1000, 'shipping' => 0, 'advanceAmount' => 0, 'walletDiscount' => 0, 'couponDiscount' => 0, 'referralDiscount' => 0, 'giftCardDiscount' => 0, 'grandTotal' => 1000],
    //   'cancelledBy' => 'Admin',
    // ]);

   

    $data = [    'order' => Order::find(22),
    //  return   $order = Order::find(22)->buyer->first_name;
      'status' => 6,
      'orderItems' => Order::find(10)->orderItems,
      'trackingUrl' => '',
      'giftTotal' => 0,
      'amounts' => ['subTotal' => 1000, 'shipping' => 0, 'advanceAmount' => 0, 'walletDiscount' => 0, 'couponDiscount' => 0, 'referralDiscount' => 0, 'giftCardDiscount' => 0, 'grandTotal' => 1000],
      'cancelledBy' => 'Admin',
    ];

      

return view('emails.customer.order-email', compact(
    'data'
));

// return view('emails.admin.order-confirmed', compact(
//     'data'
// ));


  //   $email = "imrahul050@gmail.com";
  // return Mail::to($email)->send(new \App\Mail\Admin\OrderConfirmed([
  //         'order' => Order::find(34),
  //     'status' => 6,
  //     'orderItems' => Order::find(34)->orderItems,
  //     'trackingUrl' => '',
  //     'amounts' => ['subTotal' => 1000, 'shipping' => 0, 'advanceAmount' => 0, 'walletDiscount' => 0, 'couponDiscount' => 0, 'referralDiscount' => 0, 'giftCardDiscount' => 0, 'grandTotal' => 1000],
  //     'cancelledBy' => 'Admin',
  //       ]));

    // return $this->orderConfirmationInternationalOrder(Order::find(19));
    // return new \App\Mail\Customer\UpgradedToSilverTier([
    //   'buyer' => $buyer,
    //   'membershipId' => str_split($buyer->membership_id, 4),
    //   'newTier' => 'Silver Tier',
    //   'newTierColor' => '#F2EFDE',
    // ]);
    // return new \App\Mail\Admin\ClubExclusiveInvitation(['buyer' => $buyer]);
    // try {
    //   $response = $this->app->make('dhl')->post('/shipments', [
    //     'json' => [
    //       'shipper' => [
    //         'name' => 'John Doe',
    //         'address' => [
    //           'streetLines' => ['123 Main St'],
    //           'city' => 'Anytown',
    //           'stateOrProvinceCode' => 'NY',
    //           'postalCode' => '12345',
    //           'countryCode' => 'US',
    //         ],
    //       ],
    //       'recipient' => [
    //         'name' => 'Jane Doe',
    //         'address' => [
    //           'streetLines' => ['456 Oak St'],
    //           'city' => 'Anycity',
    //           'stateOrProvinceCode' => 'CA',
    //           'postalCode' => '67890',
    //           'countryCode' => 'US',
    //         ],
    //       ],
    //       'packages' => [
    //         [
    //           'weight' => [
    //             'value' => '1',
    //             'unit' => 'LB',
    //           ],
    //         ],
    //       ],
    //     ],
    //   ]);

    //   dd($response->body());

    //   // Do something with the response data
    // } catch (RequestException $e) {
    //   dd($e, $e->getMessage());
    // }
    // $couponStartName = 'FEI15';
    // $couponsArray = [];
    // for ($i = 101; $i <= 200; $i++) {
    //   Coupon::create(['name' => $couponStartName . str_pad($i, 3, '0', STR_PAD_LEFT), 'code' => $couponStartName . str_pad($i, 3, '0', STR_PAD_LEFT), 'percent' => 15, 'date_from' => now()->format('Y-m-d'), 'date_till' => now()->addYears(3)->format('Y-m-d'), 'uses' => 1, 'all_products' => 1 ]);
    // }
    // dd($couponsArray);
  }

  public function test()
  {
    // Product::whereHas('mappedCategories', function ($q) {
    //   $q->where('category_id', '=', 5);
    // })
    //   ->update(['']);
  }
}

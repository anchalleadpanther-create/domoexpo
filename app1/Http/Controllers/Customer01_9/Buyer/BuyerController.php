<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Models\Buyer\Cart;
use App\Traits\FileUpload;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Models\Customer\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;
use App\Http\Requests\Buyer\ExpertRequest;
use App\Repositories\Buyer\BuyerRepository;
use App\Http\Requests\Buyer\BuyerRegistrationRequest;

class BuyerController extends Controller
{
  use FileUpload;

  public function __construct(private BuyerRepository $BuyerRepository)
  {
  }

  public function dashboard()
  {
    $orders = Cart::orderByDesc('id')
      ->where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 1]])
      ->get();

    $addresses = Address::where('user_id', '=', Auth::guard('buyer')->user()->id)->orderByDesc('id')->orderByDesc('id')->get();

    $wishlistProducts = ProductWishlist::where('user_id', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();

    $wishlistDesigners = DesignerWishlist::where('user_id', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();

    $allOrders = Cart::orderByDesc('id')
      ->where([
        ['buyer_id', Auth::guard('buyer')->user()->id]
      ])
      ->count();

    $awaitingShipmentOrders = Cart::orderByDesc('id')
      ->where([
        ['buyer_id', Auth::guard('buyer')->user()->id]
      ])
      ->whereIn('status', [0, 1])
      ->count();

    $deliveredOrders = Cart::orderByDesc('id')
      ->where([
        ['buyer_id', Auth::guard('buyer')->user()->id], ['status', '=', 3]
      ])
      ->count();

    $cancelledOrders = Cart::orderByDesc('id')
      ->where([
        ['buyer_id', Auth::guard('buyer')->user()->id], ['status', '=', 4]
      ])
      ->count();

    return view('customer.profile.dashboard', compact('orders', 'addresses', 'wishlistProducts', 'wishlistDesigners', 'allOrders', 'awaitingShipmentOrders', 'deliveredOrders', 'cancelledOrders'));
  }

  public function update(BuyerRegistrationRequest $request, int $id)
  {
    $this->BuyerRepository->update($request, $id);
    return back()->with('sweet-alert', 'Your details has been updated successfully.');
  }

  public function updateExpertDetails(ExpertRequest $request)
  {
    if ($request->hasfile('expert_photo'))
      $request->request->add(['photo' => $this->handleSingleFileUpload($request->expert_photo, 'uploads/buyer/')]);

    Buyer::findOrFail(Auth::guard('buyer')->user()->id)->update($request->validated() + ['photo' => $request->photo]);
    return back()->with('sweet-alert', 'Your details has been updated successfully.');
  }

  public function logout(Request $request)
  {
    Auth::guard('buyer')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('home');
  }
}

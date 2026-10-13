<?php

namespace App\Http\Controllers\Customer\Seller;

use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Supplier\SupplierRepository;
use App\Http\Requests\Supplier\SupplierUpdateProfileRequest;

class SellerController extends Controller
{
  public function __construct(SupplierRepository $SupplierRepository)
  {
    $this->SupplierRepository = $SupplierRepository;
  }

  public function dashboard()
  {
    return view('customer.seller.profile.dashboard');
  }

  public function profile()
  {
    $this->SupplierRepository->makeSupplierIfnotExist(Auth::guard('buyer')->user()->id);
    $profile = Supplier::where('buyer_id', Auth::guard('buyer')->user()->id)->first();
    return view('customer.sellers.profile', compact('profile'));
  }

  public function update(SupplierUpdateProfileRequest $request, int $id)
  {
    $this->SupplierRepository->update($request, $id);
    return back()->with('success', 'Seller details has been updated successfully.');
  }
}

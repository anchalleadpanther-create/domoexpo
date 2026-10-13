<?php

namespace App\Http\Controllers\Buyer;

use App\Traits\Wallet;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Models\Customer\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\Buyer\BuyerRequest;
use App\Repositories\Buyer\BuyerRepository;
use App\Http\Requests\Customer\AddressRequest;
use App\Models\TransactionHistory;

class BuyerController extends Controller
{
  use Wallet;

  public function __construct(private BuyerRepository $BuyerRepository)
  {
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  

  public function index(Request $request, string $type, int $buyerStatus)
  {
    $buyers = Buyer::orderBy('created_at', 'desc');

    if (isset($request->search))
      $buyers = $buyers->where('first_name', 'like', '%' . $request->search . '%')
        ->orWhere('last_name', 'like', '%' . $request->search . '%')
        ->orWhere('email', 'like', '%' . $request->search . '%')
        ->orWhere('phone', 'like', '%' . $request->search . '%');

    $buyers = $buyers->paginate(100);

    return view('buyer.buyers', compact('buyers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('buyer.create-buyer');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(BuyerRequest $request)
  {
    $membershipExpiryDate = date('Y-m-d', strtotime('+3 years'));
    $buyer = Buyer::create($request->except(['_token', 'address_one', 'address_two', 'post_code', 'country', 'state', 'city', 'address_type']) + ['wallet' => 1000, 'membership_expiry_date' => $membershipExpiryDate]);
    $this->addRegistrationBonusPoints($buyer);
    Address::create($request->only(['address_one', 'address_two', 'post_code', 'country', 'state', 'city', 'address_type']) + ['user_id' => $buyer->id, 'first_name' => $buyer->first_name, 'last_name' => $buyer->last_name, 'email' => $buyer->email, 'mobile' => $buyer->phone]);
    return redirect()->route('admin.buyers.index', ['new', 0])->with('success', 'Buyer has been successfully added.');
  }

  public function storeAddress(AddressRequest $request)
  {
    // dd($request->all());
    Address::create($request->validated() + ['user_id' => $request->user_id]);
    return redirect()->route('admin.buyers.index', ['new', 0])->with('success', 'Customer address hass been successfully added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Supplier\Buyer  $buyer
   * @return \Illuminate\Http\Response
   */
  public function show(Buyer $buyer)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Supplier\Buyer  $buyer
   * @return \Illuminate\Http\Response
   */
  public function edit(Buyer $buyer)
  {
    return view('buyer.edit-buyer', compact('buyer'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Supplier\Buyer  $buyer
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Buyer $buyer)
  {
    $request->validate(['password' => 'nullable|confirmed|min:6|max:50']);
    
    $data = $request->except('password');

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }
    $buyer->update($data);
    
    return redirect()->route('admin.buyers.index', ['new', 0])->with('success', 'Buyer has been updated successfully.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->BuyerRepository->toggleStatus($id, $status);
    return back()->with('success', 'Buyer status has been changed.');
  }
  
  
  
  public function toggleQuotationStatus(int $id, int $status)
  {
    //   dd($id, $status);
    $this->BuyerRepository->toggleQuotationStatus($id, $status);
    return back()->with('success', 'Quotation Status has been changed.');
  }

 

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Supplier\Buyer  $buyer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Buyer $user)
  {
    //
  }
  
  
  
  
public function activateFreeSubscriptionPlan(Request $request)
{
    try {
        $request->validate([
            'buyer_id' => 'required|exists:cpr_buyers,id',
            'duration'    => 'required|in:1 Month,3 Months,6 Months,1 Year',
        ]);

        $user = Buyer::findOrFail($request->buyer_id);

        // ✅ FIX: Always convert to Carbon first
        $expiryDate = $user->membership_expiry_date ? 
            \Carbon\Carbon::parse($user->membership_expiry_date) : null;
            
        $start = ($expiryDate && $expiryDate->gt(now())) ? $expiryDate : now();

        switch ($request->duration) {
            case '1 Month':
                $endDate = $start->copy()->addMonth();
                break;
            case '3 Months':
                $endDate = $start->copy()->addMonths(3);
                break;
            case '6 Months':
                $endDate = $start->copy()->addMonths(6);
                break;
            case '1 Year':
                $endDate = $start->copy()->addYear();
                break;
            default:
                $endDate = now();
        }

        TransactionHistory::create([
            'user_id'               => $user->id,
            'user_type'             => 'vendor',
            'transaction_for'       => 'Membership',
            'membership_start_date' => $start,
            'membership_expiry_date'=> $endDate,
            'amount'                => 0.00,
            'is_free'               => 1,
            'payment_status'        => 'success'
        ]);

        $user->update([
            'membership_start_date'  => $start,
            'membership_expiry_date' => $endDate,
        ]);

        return back()->with('success', 'Membership activated successfully!');

    } catch (\Throwable $e) {
        return back()->with('success', $e->getMessage());
    }
}
  
  
  
}

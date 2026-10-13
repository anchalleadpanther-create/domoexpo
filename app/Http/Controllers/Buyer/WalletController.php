<?php

namespace App\Http\Controllers\Buyer;

use App\Traits\Wallet;
use Illuminate\View\View;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class WalletController extends Controller
{
  use Wallet;

  public function index(int $customerId): View
  {
    $customer = Buyer::findOrFail($customerId);
    return view('buyer.manage-wallet', compact('customer'));
  }

  public function store(Request $request, int $buyerId): RedirectResponse
  {
    $request->validate([
      'transaction_type' => ['required', Rule::in('Debit', 'Credit')],
      'order_id' => ['nullable', 'exists:App\Models\Supplier\SupplierOrder,order_id_counter'],
      'remark' => ['nullable', 'string', 'max:200'],
    ]);

    $request->request->add(['amount' => $request->credit_amount ? (int)$request->credit_amount : (int)$request->debit_amount]);
   $this->updateWallet(Buyer::find($buyerId), $request);
    return back()->with('success', 'Wallet has been updated');
  }
}

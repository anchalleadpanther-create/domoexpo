<?php

namespace App\Actions\Admin\Orders;

use App\Models\Supplier\SupplierOrder;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class AddOrderComment
{
  use AsAction;

  /* 
   * Handles the change in the status  of the orders
   * and performs different actions 
   * according to the changing status.
  */
  public function handle(int $id): RedirectResponse
  {
    try {
      SupplierOrder::findOrFail($id)->update(request()->only('admin_comment'));
      return back()->with('success', 'Comment updated successfully');
    } catch (\Throwable $th) {
      dd($th);
    }
  }
}

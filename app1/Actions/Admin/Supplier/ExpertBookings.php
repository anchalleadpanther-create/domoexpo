<?php

namespace App\Actions\Admin\Supplier;

use Illuminate\View\View;
use App\Models\Buyer\PackageBooking;
use Lorisleiva\Actions\Concerns\AsAction;

class ExpertBookings
{
  use AsAction;

  public function handle(): View
  {
    $bookings = PackageBooking::latest()->paginate(100);
    return view('supplier.bookings', compact('bookings'));
  }
}

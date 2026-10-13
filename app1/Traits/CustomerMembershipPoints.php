<?php

namespace App\Traits;

use App\Models\Buyer\Buyer;

trait CustomerMembershipPoints
{
  /* 
    * @param int $points
    * @param int $buyerId
    * @return \App\Models\Buyer\Buyer
  */
  public static function incrementPoints(int $points, int $buyerId): Buyer
  {
    $buyer = Buyer::find($buyerId);
    $buyer->increment('membership_points', $points);
    return $buyer;
  }

  /* 
    * @param int $points
    * @param int $buyerId
    * @return \App\Models\Buyer\Buyer
  */
  public static function decrementPoints(int $points, int $buyerId): Buyer
  {
    $buyer = Buyer::find($buyerId);
    $buyer->decrement('membership_points', $points);
    return $buyer;
  }
}

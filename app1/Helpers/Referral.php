<?php

namespace App\Helpers;

class Referral
{
  private static float $referralAmountToBeAlloted = 1000.00;
  private static float $referralBonusForReferrer = 1000.00;
  private static float $referralMinimumOrderAmount = 10000.00;

  public static function getDetails(): object
  {
    return (object)[
      'referralAmountToBeAlloted' => self::$referralAmountToBeAlloted,
      'referralMinimumOrderAmount' => self::$referralMinimumOrderAmount,
      'referralBonusForReferrer' => self::$referralBonusForReferrer,
    ];
  }
}

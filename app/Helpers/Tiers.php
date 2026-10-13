<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Tiers
{
  private static float $pinkTierPercentageDiscountOnFirstPurchase = 10.00;
  private static float $pinkTierFreeShipping = 5000.00;
  private static float $pinkTierCODAvailableOnOrdersAbove = 0.00;
  private static float $pinkTierWalletBonus = 1000.00;
  private static int $pinkTierRequiredPoints = 0;

  private static float $ivoryTierPercentageDiscountOnFirstPurchase = 15.00;
  private static float $ivoryTierFreeShipping = 1500.00;
  private static float $ivoryTierCODAvailableOnOrdersAbove = 0.00;
  private static float $ivoryTierWalletBonus = 2500.00;
  private static int $ivoryTierRequiredPoints = 100000;

  private static float $silverTierPercentageDiscountOnFirstPurchase = 5.00;
  private static float $silverTierFreeShipping = 0.00;
  private static float $silverTierCODAvailableOnOrdersAbove = 0.00;
  private static float $silverTierWalletBonus = 5000.00;
  private static int $silverTierRequiredPoints = 200000;

  private static float $clubExclusiveTierPercentageDiscountOnFirstPurchase = 10.00;
  private static float $clubExclusiverTierFreeShipping = 0.00;
  private static float $clubExclusiverTierCODAvailableOnOrdersAbove = 0.00;
  private static float $clubExclusiverTierWalletBonus = 0.00;
  private static int $clubExclusiverTierRequiredPoints = 50000;

  public static function currentTier(string $tier = ''): object
  {
    Auth::guard('buyer')->check() && $tier === '' ? $tier = Auth::guard('buyer')->user()->membership_type : '';

    switch ($tier) {
      case 'Pink Tier':
        return (object)[
          'percentageDiscountOnFirstPurchase' => self::$pinkTierPercentageDiscountOnFirstPurchase,
          'freeShipping' => self::$pinkTierFreeShipping,
          'CODAvailableOnOrdersAbove' => self::$pinkTierCODAvailableOnOrdersAbove,
          'walletBonus' => self::$pinkTierWalletBonus,
          'requiredPoints' => self::$pinkTierRequiredPoints
        ];
        break;
      case 'Ivory Tier':
        return (object)[
          'percentageDiscountOnFirstPurchase' => self::$ivoryTierPercentageDiscountOnFirstPurchase,
          'freeShipping' => self::$ivoryTierFreeShipping,
          'CODAvailableOnOrdersAbove' => self::$ivoryTierCODAvailableOnOrdersAbove,
          'walletBonus' => self::$ivoryTierWalletBonus,
          'requiredPoints' => self::$ivoryTierRequiredPoints
        ];
        break;
      case 'Silver Tier':
        return (object)[
          'percentageDiscountOnFirstPurchase' => self::$silverTierPercentageDiscountOnFirstPurchase,
          'freeShipping' => self::$silverTierFreeShipping,
          'CODAvailableOnOrdersAbove' => self::$silverTierCODAvailableOnOrdersAbove,
          'walletBonus' => self::$silverTierWalletBonus,
          'requiredPoints' => self::$silverTierRequiredPoints
        ];
        break;
      case 'Club Exclusive Tier':
        return (object)[
          'percentageDiscountOnFirstPurchase' => self::$clubExclusiveTierPercentageDiscountOnFirstPurchase,
          'freeShipping' => self::$clubExclusiverTierFreeShipping,
          'CODAvailableOnOrdersAbove' => self::$clubExclusiverTierCODAvailableOnOrdersAbove,
          'walletBonus' => self::$clubExclusiverTierWalletBonus,
          'requiredPoints' => self::$clubExclusiverTierRequiredPoints
        ];
        break;
      default:
        return (object)[
          'percentageDiscountOnFirstPurchase' => self::$pinkTierPercentageDiscountOnFirstPurchase,
          'freeShipping' => self::$pinkTierFreeShipping,
          'CODAvailableOnOrdersAbove' => self::$pinkTierCODAvailableOnOrdersAbove,
          'walletBonus' => self::$pinkTierWalletBonus,
        ];
        break;
    }
  }
}

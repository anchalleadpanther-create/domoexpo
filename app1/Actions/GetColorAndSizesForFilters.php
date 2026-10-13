<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class GetColorAndSizesForFilters
{
  use AsAction;

  public function handle(array $productIds, array $typeIds, object $productTypes, array $productTypeValues): array
  {
    $colors = [];
    $sizes = [];
    foreach ($productTypes as $parentKey => $type) {
      foreach ($type->mappedProductTypeValues as $value) {
        if ($value->typeOneProducts() !== null && $parentKey === 0 && in_array($value->id, $productTypeValues)) {
          $colors[] = $value;
        }
        if ($value->typetwoProducts() !== null && $parentKey === 1 && in_array($value->id, $productTypeValues)) {
          $sizes[] = $value;
        }
      }
    }
    return compact('colors', 'sizes');
  }
}

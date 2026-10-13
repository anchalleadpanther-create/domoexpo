<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class GetOccasionAvailabilityAndMaterial
{
  use AsAction;

  public function handle(array $occasionNames, array $availabilityNames): array
  {
    $occasions = [];
    $availabilities = [];
    $materials = [];

    foreach (getDropdowns('Occasion')->dropdownValues as $dropdown) {
      if ($dropdown->occasionProductsCount > 0 && in_array($dropdown->dropdown_value, $occasionNames)) {
        $occasions[] = $dropdown;
      }
    }

    foreach (getDropdowns('By Availability')->dropdownValues as $dropdown) {
      if ($dropdown->availabilityProductsCount > 0 && in_array($dropdown->dropdown_value, $availabilityNames)) {
        $availabilities[] = $dropdown;
      }
    }

    return compact('occasions', 'availabilities', 'materials');
  }
}

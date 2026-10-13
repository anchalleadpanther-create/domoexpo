<?php

namespace App\Repositories\Extensions;

use App\Models\Extensions\Dropdown;

class SelectBoxRepository
{
  public function update($request, $id)
  {
    if ($request->type === 'sort-update') :
      foreach ($request->id as $key => $id) :
        Dropdown::find($id)->update(['sort' => $request->sortid[$key]]);
      endforeach;
      return 'Dropdown sort numbers has been updated successfully!';
    elseif ($request->type === 'normal-update') :
      Dropdown::find($id)->update($request->except('_method', '_token', 'type'));
      return 'Dropdown has been updated successfully!';
    endif;
  }
}

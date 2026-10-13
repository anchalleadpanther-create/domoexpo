<?php

namespace App\Repositories\Extensions;

use App\Models\Extensions\DropdownValue;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUpload;

class SelectBoxValuesRepository
{
    use FileUpload;

  public function store($request)
  {
    $dropdownValues = explode(',', $request->dropdown_values);
    foreach ($dropdownValues as $key => $value) :
      DropdownValue::create(['dropdown_value' => trim($value), 'dropdown_id' => $request->dropdown_id, 'displayflag' => $request->displayflag]);
    endforeach;
    
    return 'Dropdown saved successfully';
  }

  public function update($request, $id)
  {
      try{
        if ($request->type === 'sort-update') :
          foreach ($request->id as $key => $id) :
            DropdownValue::where('id', '=', $id)->update(['sortid' => $request->sortid[$key]]);
          endforeach;
          return 'Dropdown values sort numbers has been updated successfully!';
        elseif ($request->type === 'normal-update') :
            
            
            if ($request->hasfile('dropdown_icon')) :
                $request->request->add(['icon' => $this->handleSingleFileUpload($request->dropdown_icon, 'uploads/dropdown/')]);
              endif;
            
          DropdownValue::where('id', '=', $id)->update($request->except('_method', 'dropdown_icon','_token', 'type'));
          return 'Dropdown values has been updated successfully!';
        endif;
  } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }
}

<?php

namespace App\Repositories\Ecommerce;

use App\Repositories\BaseRepository;
use App\Models\Ecommerce\ProductTypeValue;

class ProductTypeValueRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      $typeValues = explode(",", $request->type_value);
      $data = [];
      foreach ($typeValues as $key => $value) {
        if (ProductTypeValue::where([['type_id', '=', (int)$request->type_id], ['type_value', '=', trim($value)]])->doesntExist() && $key === 0) {
          $data[] = [
            'type_id' => $request->type_id,
            'type_value' => trim($value),
            'type_color_code' => $request->type_color_code,
            'status' => $request->status,
          ];
        }
      }
      ProductTypeValue::insert($data);
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      ProductTypeValue::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function updateSort($request)
  {
    try {
      foreach ($request->id as $key => $id) :
        ProductTypeValue::find((int)$id)->update(['sort' => $request->sort[$key]]);
      endforeach;
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return ProductTypeValue::find($id)->update(['status' => $status]);
  }
}

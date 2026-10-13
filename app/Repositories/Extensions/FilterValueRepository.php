<?php

namespace App\Repositories\Extensions;

use App\Models\Extensions\FilterValue;
use App\Repositories\BaseRepository;

class FilterValueRepository extends BaseRepository
{
  public function store($request)
  {
    try {
    $filterValues = explode(",", $request->filter_value);
    $data = [];
    foreach ($filterValues as $key => $value) {
      $data[] = [
        'filter_id' => $request->filter_id,
        'filter_value' => $value,
        'status' => $request->status,
      ];
    }
    FilterValue::insert($data);
    } catch (\Throwable $th) {
      dd($th);
      return back()->withErrors($th)->withInput();
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      FilterValue::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      return back()->withError($th)->withInput();
    }

    return true;
  }

  public function updateSort($request)
  {
    try {
      foreach ($request->id as $key => $id) :
        FilterValue::find((int)$id)->update(['sort' => $request->sort[$id]]);
      endforeach;
    } catch (\Throwable $th) {
      return back()->withError($th)->withInput();
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    return FilterValue::find($id)->update(['status' => $status]);
  }
}

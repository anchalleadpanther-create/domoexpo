<?php

namespace App\Repositories\Ecommerce;

use App\Models\Ecommerce\Filter;
use App\Repositories\BaseRepository;

class FilterRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      Filter::insert($request->except('_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      Filter::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function updateSort($request)
  {
    try {
      foreach ($request->id as $key => $id) :
        Filter::find((int)$id)->update(['sort' => $request->sort[$id]]);
      endforeach;
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Filter::find($id)->update(['status' => $status]);
  }
}

<?php

namespace App\Repositories\Ecommerce;

use App\Repositories\BaseRepository;
use App\Models\Ecommerce\ProductType;

class ProductTypeRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      ProductType::insert($request->except('_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      ProductType::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function updateSort($request)
  {
    try {
      foreach ($request->id as $key => $id) :
        ProductType::find((int)$id)->update(['sort' => $request->sort[$key]]);
      endforeach;
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function toggleStatus($id, $status)
  {
    return ProductType::find($id)->update(['status' => $status]);
  }
}

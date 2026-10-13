<?php

namespace App\Repositories\Ecommerce;

use App\Models\Ecommerce\Shipping;
use App\Repositories\BaseRepository;

class ShippingRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      Shipping::insertGetId($request->except('_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      Shipping::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Shipping::find($id)->update(['status' => $status]);
  }
}

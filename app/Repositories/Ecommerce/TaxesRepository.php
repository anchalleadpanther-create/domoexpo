<?php

namespace App\Repositories\Ecommerce;

use App\Models\Ecommerce\Taxes;
use App\Repositories\BaseRepository;

class TaxesRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      $category_id = Taxes::insertGetId($request->except('_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      Taxes::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Taxes::find($id)->update(['status' => $status]);
  }
}

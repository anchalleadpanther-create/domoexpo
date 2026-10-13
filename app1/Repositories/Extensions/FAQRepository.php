<?php

namespace App\Repositories\Extensions;

use App\Models\Extensions\FAQ;
use App\Repositories\BaseRepository;

class FAQRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      FAQ::insert($request->except('_token'));
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      FAQ::find($id)->update($request->except('_method', '_token'));
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return FAQ::find($id)->update(['status' => $status]);
  }
}

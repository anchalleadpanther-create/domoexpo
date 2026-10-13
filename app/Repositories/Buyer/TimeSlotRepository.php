<?php

namespace App\Repositories\Buyer;

use Illuminate\Http\Request;
use App\Models\Buyer\TimeSlot;
use App\Repositories\BaseRepository;

class TimeSlotRepository extends BaseRepository
{
  public function store(Request $request, int $userId)
  {
    $data = [];
    foreach ($request->days as $day) {
      foreach ($request->times as $time) {
        if (TimeSlot::where([['day', '=', $day], ['time', '=', $time]])->doesntExist()) {
          $data[] = [
            'time' => $time,
            'day' => $day,
            'user_id' => $userId
          ];
        }
      }
    }
    // dd($data);
    TimeSlot::insert($data);
  }
}

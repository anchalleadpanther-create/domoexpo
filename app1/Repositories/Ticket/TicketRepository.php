<?php

namespace App\Repositories\Ticket;

use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketImage;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class TicketRepository extends BaseRepository
{
  public function store($request)
  {
    try {
      $request->request->add(['user_id' => Auth::user()->id]);

      $ticket = Ticket::create($request->except('_token', 'ticket_file'));
      $this->ticketImageUpload($request, $ticket->id);
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function update($request, $id)
  {
    try {
      $request->request->add(['user_id' => Auth::user()->id]);

      Ticket::find($id)->update($request->except('_token', '_method'));
      $this->ticketImageUpload($request, $id);
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }

  public function ticketImageUpload($request, int $ticketId)
  {

    if ($request->hasfile('ticket_file')) {
      TicketImage::where('ticket_id', '=', $ticketId)->delete();
      $images = $this->handleMultiFileUpload($request, 'ticket_file', 'uploads/ticket', 6);
      $imageData = [];
      foreach ($images as $image) {
        $imageData[] = [
          'ticket_id' => $ticketId,
          'image' => $image
        ];
      }
      TicketImage::insert($imageData);
    }
  }

}

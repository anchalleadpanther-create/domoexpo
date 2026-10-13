<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDelivered extends Mailable
{
  use Queueable, SerializesModels;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(public array $data)
  {
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->subject('Your FEI order has been delivered! ✨')->markdown('emails.admin.order-delivered');
  }
}

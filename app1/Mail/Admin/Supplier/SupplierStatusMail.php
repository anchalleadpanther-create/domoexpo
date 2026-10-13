<?php

namespace App\Mail\Admin\Supplier;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// /home/domoexpo/seller.domo.expo.cy/app/Mail/Admin/supplier/SupplierStatusMail.php
class SupplierStatusMail extends Mailable
{
  use Queueable, SerializesModels;

  public $data;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
    // dd($data);
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    //   /home/domoexpo/seller.domo.expo.cy/resources/views/emails/admin/supplier/supplier-status-mail.blade.php
    return $this->subject('Profile Status Change || DomoExpo')->markdown('emails.admin.supplier.supplier-status-mail');
  }
}

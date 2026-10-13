<?php

namespace App\Mail\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MembershipUpgradeMail extends Mailable
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
    return $this->subject('Membership Upgraded')->markdown('emails.customer.membership-upgrade-email');
  }
}

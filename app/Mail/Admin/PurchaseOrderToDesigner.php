<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrderToDesigner extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(public array $data)
  {
    //
  }

  /**
   * Get the message envelope.
   *
   * @return \Illuminate\Mail\Mailables\Envelope
   */
  public function envelope()
  {
    return new Envelope(
      subject: 'FEI Purchase Order'
    );
  }

  /**
   * Get the message content definition.
   *
   * @return \Illuminate\Mail\Mailables\Content
   */
  public function content()
  {
    return new Content(
      markdown: 'emails.admin.purchase-order'
    );
  }

  /**
   * Get the attachments for the message.
   *
   * @return array
   */
  public function attachments()
  {
    $attachments = [
      Attachment::fromPath(public_path('uploads/po') . '/' . $this->data['pdfName'])
        ->as('purchase-order.pdf')
        ->withMime('application/pdf')
    ];

    foreach ($this->data['products'] as $product) {
      if (isset($product['frontImage']))
        $attachments[] = Attachment::fromPath($product['frontImage']);
      if (isset($product['backImage']))
        $attachments[] = Attachment::fromPath($product['backImage']);
    }

    return $attachments;
  }
}

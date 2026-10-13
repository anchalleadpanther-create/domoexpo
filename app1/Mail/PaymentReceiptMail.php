<?php

namespace App\Mail;

use App\Models\TransactionHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $history;
    public $paymentData;
    public $user;

    public function __construct(TransactionHistory $history, ?array $paymentData = [])
    {
        $this->history = $history;
        $this->paymentData = $paymentData ?? [];
        $this->user = $history->user_type == 'buyer' ? $history->getBuyer : $history->getSeller;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Receipt - ' . (data_get($this->paymentData, 'orderNumber', 'Order #' . $this->history->id)),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-receipt',
            with: [
                'history' => $this->history,
                'paymentData' => $this->paymentData,
                'user' => $this->user,
            ]
        );
    }

    
    
    
    public function attachments(): array
    {
        return [
            \Illuminate\Mail\Mailables\Attachment::fromPath(
                asset('uploads/invoices/'.$this->history->invoice_pdf)
            )->as('invoice.pdf')
             ->withMime('application/pdf'),
        ];
    }

}

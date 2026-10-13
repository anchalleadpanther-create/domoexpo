<?php

namespace App\Actions\Customer;

use App\Models\Buyer\Order;
use App\Mail\Customer\OrderEmail;
use App\Repositories\Buyer\CartRepository;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class OrderEmailNotification
{
  use AsAction;

  public function __construct(private CartRepository $cartRepository)
  {
  }

  public function handle(Order $order, string $email, string $status): bool
  {
    $giftTotal = $this->cartRepository->getGiftTotal($order->orderItems);
    Mail::to($email)->send(new OrderEmail(['order' => $order, 'status' => $status, 'giftTotal' => $giftTotal,'orderItems'=>$order->orderItems]));
    return true;
  }
}

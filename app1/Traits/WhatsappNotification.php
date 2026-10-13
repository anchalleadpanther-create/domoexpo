<?php

namespace App\Traits;

use App\Models\Buyer\Order;
use Illuminate\Support\Facades\Http;

trait WhatsappNotification
{
  public static function newRegistration($buyer): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => '91' . $buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'fei_registration_laravel_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $buyer->fullName,
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function orderShipped(Order $order, string $trackingId): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_shipped_laravel',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->shipping_name,
                ],
                [
                  'type' => 'text',
                  'text' => $order->id
                ]
              ]
            ],
            [
              'type' => 'button',
              'subType' => 'url',
              'index' => 0,
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $trackingId,
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function orderCancelled(Order $order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_cancellation',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->shipping_name,
                ],
                [
                  'type' => 'text',
                  'text' => $order->id
                ],
                [
                  'type' => 'text',
                  'text' =>  $order->created_at->format('d M, Y h:i A')
                ]
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function newOrderNotification(Order $order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_confirmation',
          'language' => 'en',
          'components' => [
            [
              'type' => 'header',
              'parameters' => [
                [
                  'type' => 'media',
                  'media' => [
                    'type' => 'image',
                    'url' => 'https://fashioneditindia.com/allUsers/customer/images/logo-new.png'
                  ]
                ]
              ]
            ],
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->shipping_name,
                ],
                [
                  'type' => 'text',
                  'text' => $order->id
                ],
                [
                  'type' => 'text',
                  'text' =>  $order->currency . ' ' . number_format(($order->grand_total + $order->shipping_charge - ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount)) * @$order->orderCurrency->con_ratio, 2)
                ]
              ]
            ],
            [
              'type' => 'button',
              'subType' => 'url',
              'index' => 0,
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => 'buyer/order-detail/' . $order->orderItems[0]->supplier_order_id
                ]
              ]
            ]
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public function orderConfirmationPrepaidOrder($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_confirmation_prepaid_order_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName,
                ],
                [
                  'type' => 'text',
                  'text' => $order->id,
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public function orderConfirmationInternationalOrder($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_confirmation__for_international_orders_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName,
                ],
                [
                  'type' => 'text',
                  'text' => $order->id,
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public function receivedCODOrder($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_received_cod_updated_new',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName,
                ],
                [
                  'type' => 'text',
                  'text' => $order->id,
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public function CODSingleOrderConfirmation($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => $order->orderItemDetail->country->phonecode . $order->orderItemDetail->shipping_phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_confirmation_cod_order__step_2_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName
                ],
                [
                  'type' => 'text',
                  'text' => $order->orderItemDetail->currency . ' ' . number_format($order->orderItemDetail->advance_amount, 2)
                ],
                [
                  'type' => 'text',
                  'text' => $order->orderItemDetail->order_id_counter,
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function orderDispatched($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_dispatched_laravel_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName
                ],
                [
                  'type' => 'text',
                  'text' => $order->id
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function orderDelivered($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_delivered_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName
                ],
                [
                  'type' => 'text',
                  'text' => $order->id
                ]
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function orderCancelledByCustomerWhatsappNotification($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_cancelled_by_customer_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName
                ],
                [
                  'type' => 'text',
                  'text' => $order->order_id_counter
                ]
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function abandonedCartWhatsappNotification($buyer): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => $buyer->country !== null ? $buyer->country->phonecode : '91' . $buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'abandoned_cart__step_1__immediate_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $buyer->fullName
                ]
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function ivoryTierWhatsappNotification($buyer): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => $buyer->country !== null ? $buyer->country->phonecode : '91' . $buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'fei_loyalty_program__ivory_tier_laravel_new',
          'language' => 'en',
          'components' => []
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function silverTierWhatsappNotification($buyer): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => $buyer->country !== null ? $buyer->country->phonecode : '91' . $buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'fei_loyalty_program__silver_tier_laravel_new',
          'language' => 'en',
          'components' => []
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function clubExclusiveTierWhatsappNotification($buyer): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => $buyer->country !== null ? $buyer->country->phonecode : '91' . $buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'fei_loyalty_program__club_exclusive_laravel_new',
          'language' => 'en',
          'components' => []
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function orderCancelledByAdminWhatsappNotification($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'order_cancelled_due_to_lack_of_response_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName
                ],
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }

  public static function CustomOrderWhatsappNotification($order): bool
  {
    $response = Http::withHeaders([
      'Accept' => 'application/json',
    ])->post(config('myconfig.TELLEPHANT_V1_URL') . '/send-message', [
      'apikey' => config('myconfig.TELLEPHANT_API_KEY'),
      'to' => 91 . $order->buyer->phone,
      'channels' => [
        'whatsapp',
      ],
      'whatsapp' => [
        'contentType' => 'template',
        'template' => [
          'templateId' => 'custom_order_prepaid_laravel_new_updated',
          'language' => 'en',
          'components' => [
            [
              'type' => 'body',
              'parameters' => [
                [
                  'type' => 'text',
                  'text' => $order->buyer->fullName
                ],
                [
                  'type' => 'text',
                  'text' => $order->id
                ]
              ]
            ],
          ]
        ]
      ]
    ]);
    return $response->ok();
  }
}

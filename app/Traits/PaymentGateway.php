<?php



namespace App\Traits;



use App\Models\Buyer\Order;

use Srmklive\PayPal\Services\PayPal as PayPalClient;



trait PaymentGateway

{



  public static function paypal(Order $order)
  {

    $provider = new PayPalClient;

    $provider->setApiCredentials(config('paypal'));

    $paypalToken = $provider->getAccessToken();



    $response = $provider->createOrder([

      "intent" => "CAPTURE",

      "application_context" => [

        "return_url" => route('buyer.order-successful', $order->id),

        "cancel_url" => route('buyer.order-failed', $order->id),

      ],

      "purchase_units" => [

        0 => [

          "amount" => [

            "currency_code" => $order->currency_code,

            "value" => number_format($order->grand_total * $order->orderCurrency->con_ratio, 2, '.', ''),

          ]

        ]

      ]

    ]);



    if (isset($response['id']) && $response['id'] != null) {



      // redirect to approve href

      foreach ($response['links'] as $links) {

        if ($links['rel'] == 'approve') {

          return redirect()->away($links['href'])->send();

        }

      }



      // return back()->withErrors('Something went wrong.');

      dd($response);

    } else {

      // return back()->withErrors('Something went wrong.');

      dd($response);

    }

    return true;

  }


public static function ccAvenue(Order $order)
  {

    $provider = new PayPalClient;

    $provider->setApiCredentials(config('paypal'));

    $paypalToken = $provider->getAccessToken();



    $response = $provider->createOrder([

      "intent" => "CAPTURE",

      "application_context" => [

        "return_url" => route('buyer.order-successful', $order->id),

        "cancel_url" => route('buyer.order-failed', $order->id),

      ],

      "purchase_units" => [

        0 => [

          "amount" => [

            "currency_code" => $order->currency_code,

            "value" => number_format($order->grand_total * $order->orderCurrency->con_ratio, 2, '.', ''),

          ]

        ]

      ]

    ]);



    if (isset($response['id']) && $response['id'] != null) {



      // redirect to approve href

      foreach ($response['links'] as $links) {

        if ($links['rel'] == 'approve') {

          return redirect()->away($links['href'])->send();

        }

      }



      // return back()->withErrors('Something went wrong.');

      dd($response);

    } else {

      // return back()->withErrors('Something went wrong.');

      dd($response);

    }

    return true;

  }

}


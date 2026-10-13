<!doctype html>
<html lang="en">

<head>
  <!--Required Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="description">
  <!-- Title Of Site -->
  <title>Order Confirmed, Thank you for shopping with {{ config('app.name') }} ! </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

</head>

<body style="margin:0;padding:0">
  <div style="background:#eee;padding:0;margin:0">

    @include('emails.layouts.nav')

    <table align="center" width="800" border="0" cellspacing="0" cellpadding="0"
      style="padding-top:35px;font-family:'Poppins', sans-serif;background:#fff">
      <tbody>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">Hello
              {{ $data['order']->buyer->first_name }},<br>
              Thank you for choosing Little Tag !
            </span>
          </td>
        </tr>

        <tr>
          <td height="20"></td>
        </tr>

        <tr>
          <td>
            <span
              style="font-size:18px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;">
              @if ($data['order']->payment_method === 'Cash on Delivery')
                <b>ORDER RECEIVED</b>
              @else
                <b>ORDER PLACED</b>
              @endif
            </span>
          </td>
        </tr>
        <tr>
          <td style="padding:15px 50px 0">
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              @if ($data['order']->payment_method === 'Cash on Delivery')
                As all our products are made to order, we request you to make <br />
                a partial advance payment so we can go ahead & confirm your order.
              @else
                We have received your order & <br> will let you know once it is dispatched.
              @endif
              @if (in_array('CUSTOM', $data['order']->orderItems->pluck('size')->toArray()))
                <br />
                Due to this being a custom order, there maybe a price variation for sizes beyond XL.
              @endif
            </span>
          </td>
        </tr>
        <tr>
          <td style="padding-top:20px;text-align:center">
            <span style="font-size:14px;line-height:28px;color:#333333;border-bottom:1px solid #333">
              <b>Order Details </b> </span>
          </td>
        </tr>
        <tr>
          <td style="padding-top:20px">
            <span
              style="font-size:14px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
              Order No: {{ $data['order']->id }} </span>
          </td>
        </tr>

        <tr>

          <td style="padding-top:20px">
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="width:7%"></td>
                <td> 
                  <table style="width:100%;font-size:12px;color:#62778b;border:0" border="1" cellspacing="0"
                    cellpadding="0">
                    <tr>
                      <th style="font-weight: normal; padding: 3px 0;">Image</th>
                      <th style="font-weight: normal; padding: 3px 0;">Product Name</th>
                      <th style="font-weight: normal; padding: 3px 0;">Price</th>
                      <th style="font-weight: normal; padding: 3px 0;">QTY</th>
                      <th style="font-weight: normal; padding: 3px 0;">Subtotal</th>
                    </tr>
                    @foreach ($data['order']->orderItems as $order)
                      <tr>
                        <td align="center">
                          <img
                            src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                            style="width:70px" />
                        </td>
                        <td align="center">
                          <a href="#">{{ $order->name }}
                            @isset($order->custom_name)
                              <span class="mt-2"><i>Custom Name: {{ $order->custom_name }}</i></span>
                            @endisset
                          </a><br />
                          @if (isset($order->productTypeValueOne))
                            <span>Color: {{ $order->productTypeValueOne->type_value }}</span><br>
                            @if (isset($order->productTypeValueTwo))
                              <span>Size: {{ $order->productTypeValueTwo->type_value }}</span>
                            @endif
                          @endif
                        </td>
                        <td align="center"><span>{{ @$data['order']->orderCurrency->currency }}
                            {{ number_format($order->price_unit * @$data['order']->orderCurrency->con_ratio, 2) }}</span>
                        </td>
                        <td align="center"><span>{{ $order->quantity }}</span></td>
                        <td align="center"><span>{{ @$data['order']->orderCurrency->currency }}
                            {{ number_format($order->orderItemDetail->grand_total * @$data['order']->orderCurrency->con_ratio, 2) }}</span>
                        </td>
                      </tr>
                    @endforeach
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Subtotal:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;"><span>
                          {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->grand_total - $data['giftTotal'] * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span></td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Tax:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>{{ @$data['order']->orderCurrency->currency }} 0.00</span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Wallet Discount:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>-
                          {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->wallet * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Discount Via Coupon:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          - {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->coupon_amount * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Discount Via Referral:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          - {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->referral_amount * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Discount Via Gift Card:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          - {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->gift_card_amount, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Shipping:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format(@$data['order']->shipping_charge * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Gift:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format(@$data['giftTotal'] * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%"><b>Grand Total:</b></span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          <b>
                            {{ @$data['order']->orderCurrency->currency }}
                            {{ number_format(($data['order']->grand_total + $data['order']->shipping_charge - ($data['order']->wallet + $data['order']->coupon_amount + $data['order']->gift_card_amount + $data['order']->referral_amount)) * @$data['order']->orderCurrency->con_ratio, 2) }}
                          </b>
                        </span>
                      </td>
                    </tr>
                  </table>
                </td>
                <td style="width:7%"></td>
              </tr>
              <tr>
                <td colspan="3" style="height:20px"></td>
              </tr>
              <tr>
                <td style="width:7%"></td>
                <td>
                  <table style="width:100%;font-size:12px;color:#62778b;border:0" border="1" cellspacing="0"
                    cellpadding="0">
                    <tr style="background:#eee">
                      <th style="font-weight: normal; padding: 3px 0;">Shipping Address</th>
                      <th style="font-weight: normal; padding: 3px 0;">Billing Address</th>
                    </tr>
                    <tr>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        {{ @$data['order']->shipping_name }}<br />
                        {{ @$data['order']->shipping_address }}<br />
                        {{ @$data['order']->country->name }}
                        <br />
                        {{ @$data['order']->state->name }},
                        {{ @$data['order']->city->name }}
                        ({{ @$data['order']->shipping_pincode }}) <br />
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        {{ @$data['order']->shipping_name }}<br />
                        {{ @$data['order']->shipping_address }}<br />
                        {{ @$data['order']->country->name }}
                        <br />
                        {{ @$data['order']->state->name }},
                        {{ @$data['order']->city->name }}
                        ({{ @$data['order']->shipping_pincode }}) <br />
                      </td>

                    </tr>
                  </table>

                </td>
                <td style="width:7%"></td>
              </tr>
              <tr>
                <td colspan="3" style="height:20px"></td>
              </tr>
              <tr>
                <td style="width:7%"></td>
                <td>
                  <table style="width:100%;font-size:12px;color:#62778b;border:0" border="1" cellspacing="0"
                    cellpadding="0">
                    <tr style="background:#eee">
                      <th style="font-weight: normal; padding: 3px 0;">Shipping Method</th>
                      <th style="font-weight: normal; padding: 3px 0;">Payment Method</th>
                    </tr>
                    <tr>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        {{-- <span>Flat Rate - Fixeds <br> --}}
                        Delivery Date: N/A
                        </span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          {{ $data['order']->payment_method }}
                        </span>
                      </td>

                    </tr>
                  </table>

                </td>
                <td style="width:7%"></td>
              </tr>
            </table>
          </td>
        </tr>
        @if ($data['order']->payment_method === 'Cash on Delivery')
          <tr>
            <td style="padding-top:20px">
              <span
                style="font-size:14px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
                To make the partial advance payment, please click on the link below :
              </span>
            </td>
          </tr>
        @endif
        <tr>
          <td style="height:20px"></td>
        </tr>
        <tr>
          <td style="width:100%;text-align:center">
            @if ($data['order']->payment_method === 'Cash on Delivery')
              <a href="https://api.whatsapp.com/send?phone=+916026768005&text=Hello"
                style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:white;display:inline-block;text-align:center;width: auto;padding: 10px 15px;background-color:#e55c5c;text-decoration: none;">
                REACH OUT TO CUSTOMER CARE
              </a>
            @else
              <a href="{{ route('buyer.dashboard') }}"
                style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:white;display:inline-block;text-align:center;width: auto;padding: 10px 15px;background-color:#e55c5c;text-decoration: none;">
                TRACK YOUR ORDER HERE
              </a>
            @endif
          </td>
        </tr>

        <tr>
          <td style="padding-top:20px">
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              Get the first look at our fresh launches, irresistible discounts along with special<br> curations & tips
              from our in-house stylists as a part of the #LTCommunity.
            </span>
          </td>
        </tr>


        <tr>
          <td style="padding-top:20px">
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              T & C apply<sup>*</sup></span>
          </td>
        </tr>
        {{-- @include('emails.layouts.social-links') --}}
        <tr>
          <td style="height:20px"></td>
        </tr>
       {{-- @include('emails.layouts.footer') --}}
      </tbody>
    </table>

  </div>

</body>

</html>

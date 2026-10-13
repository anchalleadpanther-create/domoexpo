<!doctype html>

<html lang="en">



<head>

  <!--Required Meta Tags-->

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="description">

  <!-- Title Of Site -->

  <title>Thank you for your shopping with {{ config('app.name') }} !</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link

    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"

    rel="stylesheet">



</head>



<body style="margin:0;padding:0">



  <div style="background:#eee;padding:0">



    @include('emails.layouts.nav')



    <table align="center" width="800" border="0" cellspacing="0" cellpadding="0"

      style="padding-top:35px;font-family:'Poppins', sans-serif;background:#fff">

      <tbody>

        <tr>

          <td align="center" bgcolor="#ffffff">

            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">Hello

              {{ $data['order']->buyer->first_name }},<br>

              Thank you for choosing Little Tag & being a part of the #LTCommunity !

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

              <b>ORDER DELIVERED</b></span>

          </td>

        </tr>

        <tr>

          <td style="padding:15px 50px 0">

            <span

              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

              Your order no, {{ $data['order']->id }} has been delivered.<br />

              We hope you enjoyed shopping with us!

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

                    @foreach ($data['orderItems'] as $order)

                      <tr>

                        <td align="center">

                          <img

                            src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"

                            style="width:70px" />

                        </td>

                        <td align="center">

                          <a href="">{{ $order->name }}

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

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">

                        <span style="padding-left:5%">Subtotal:</span>

                      </td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          {{ @$data['order']->orderCurrency->currency }}

                          {{ number_format($data['amounts']['subTotal'], 2) }}

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">

                        <span style="padding-left:5%">Tax:</span>

                      </td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          {{ @$data['order']->orderCurrency->currency }}

                          0.00

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">

                        <span style="padding-left:5%">Wallet Discount:</span>

                      </td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          - {{ @$data['order']->orderCurrency->currency }}

                          {{ number_format($data['amounts']['walletDiscount'], 2) }}

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span

                          style="padding-left:5%">Discount Via Coupon:</span></td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          - {{ @$data['order']->orderCurrency->currency }}

                          {{ number_format($data['amounts']['couponDiscount'], 2) }}

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span

                          style="padding-left:5%">Discount Via Referral:</span></td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          - {{ @$data['order']->orderCurrency->currency }}

                          {{ number_format($data['amounts']['referralDiscount'], 2) }}

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span

                          style="padding-left:5%">Discount Via Gift Card:</span></td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          - {{ @$data['order']->orderCurrency->currency }}

                          {{ number_format($data['amounts']['giftCardDiscount'], 2) }}

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span

                          style="padding-left:5%">Shipping:</span></td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          - {{ @$data['order']->orderCurrency->currency }}

                          {{ number_format($data['amounts']['shipping'], 2) }}

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

                          {{ number_format(@$data['amounts']['giftTotal'] * @$data['order']->orderCurrency->con_ratio, 2) }}

                        </span>

                      </td>

                    </tr>

                    <tr style="background:#eee">

                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span

                          style="padding-left:5%"><b>Grand Total:</b></span></td>

                      <td align="center" style="font-weight: normal; padding: 3px 0;">

                        <span>

                          <b>

                            - {{ @$data['order']->orderCurrency->currency }}

                            {{ number_format($data['amounts']['grandTotal'], 2) }}

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

                      <th style="font-weight: normal; padding: 3px 0;width: 50%;">Shipping Address</th>

                      <th style="font-weight: normal; padding: 3px 0;width: 50%;">Billing Address</th>

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

                      <th style="font-weight: normal; padding: 3px 0;width: 50%;">Shipping Method</th>

                      <th style="font-weight: normal; padding: 3px 0;width: 50%;">Payment Method</th>

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



        <tr>

          <td style="height:20px"></td>

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


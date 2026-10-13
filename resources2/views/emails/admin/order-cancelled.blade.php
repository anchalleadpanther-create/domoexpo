<!doctype html>

<html lang="en">



<head>

  <!--Required Meta Tags-->

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="description">

  <!-- Title Of Site -->

  <title>Your {{ config('app.name') }} order has been cancelled </title>

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

              style="font-size:18px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;"><b>ORDER

                CANCELLED

              </b></span>

          </td>

        </tr>

        <tr>

          <td style="padding:15px 0">

            <span

              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

              This is regarding your order no: {{ $data['order']->id }}, placed on

              {{ $data['order']->created_at->format('d M, Y') }}

            </span>

          </td>

        </tr>

        @if ($data['cancelledBy'] === 'Admin')

          <tr>

            <td>

              <span

                style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

                As all our products are made to order - with love from us,<br />

                we request you to make a partial advance payment to process your order.<br />

                Our team has been trying to reach out to you regarding the same.

              </span>

            </td>

          </tr>

        @else

          <tr>

            <td style="padding-top:20px">

              <span

                style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

                As per your request, your order has been cancelled.

              </span>

            </td>

          </tr>

        @endif

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



            </table>

          </td>



        </tr>

        @if ($data['cancelledBy'] === 'Admin')

          <tr>

            <td style="padding-top:20px">

              <span

                style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

                As a member of the #LTCommunity, your shopping experience is important to us<br />

                & we would love to assist you with your shopping journey on LT.

              </span>

            </td>

          </tr>

        @else

          <tr>

            <td style="padding-top:20px">

              <span

                style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

                We are sorry to notice that you cancelled your order.<br />

                If you would like assistance on shopping similar products or want to share any feedback.<br />

                Please click on the link below :

              </span>

            </td>

          </tr>

        @endif

        <tr>

          <td style="height:20px"></td>

        </tr>

        <tr>

          <td style="width:100%;text-align:center">

            <a href="https://api.whatsapp.com/send?phone=+916359880688&text=Hello"

              style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:white;display:inline-block;text-align:center;width: auto;padding: 10px 15px;background-color:#e55c5c;text-decoration: none;">REACH

              OUT TO CUSTOMER SERVICE</a>

          </td>

        </tr>





        <tr>

          <td style="padding-top:20px">

            <span

              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

              Get the first look at our freshest collections, irresistible discounts along with special<br>

              curations & tips from our in-house stylists as a part of the #LTCommunity.



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


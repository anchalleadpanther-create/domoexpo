<!doctype html>

<html lang="en">



<head>

  <!--Required Meta Tags-->

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="description">

  <!-- Title Of Site -->

  <title>Your {{ config('app.name') }} cart is waiting you for you ! </title>

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

              {{ $data['product']->buyer->first_name }},<br>

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

              style="font-size:18px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;"><b>FORGOT

                SOMETHING?</b></span>

          </td>

        </tr>

        <tr>

          <td style="padding:15px 50px 0">

            <span

              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

              Here is what is waiting for you in your LT cart :

            </span>

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

                    <tr>

                      <td align="center">

                       {{-- <img

                          src="{{ isset($data['product']->product_image) ? asset('uploads/products') . '/' . $data['product']->product_image : asset('allUsers/icon-thumb.png') }}"

                          style="width:70px" />
                           --}} 

                      </td>

                      <td align="center">

                        <a href="javascript:;">{{ $data['product']->name }}</a><br>

                        @if (isset($data['product']->productTypeValueOne))

                          <span>Color: {{ $data['product']->productTypeValueOne->type_value }}</span><br>

                          @if (isset($data['product']->productTypeValueTwo))

                            <span>Size: {{ $data['product']->productTypeValueTwo->type_value }}</span>

                          @endif

                        @endif

                      </td>

                      <td align="center"><span>INR

                          {{ number_format($data['product']->price_unit, 2) }}</span>

                      </td>

                      <td align="center"><span>{{ $data['product']->quantity }}</span></td>

                      <td align="center"><span>INR

                          {{ number_format($data['product']->price_unit * $data['product']->quantity, 2) }}</span>

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

          <td style="padding-top:20px">

            <span

              style="font-size:14px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">

              To complete your purchase, click on the link below :

            </span>

          </td>

        </tr>

        <tr>

          <td style="height:20px"></td>

        </tr>

        <tr>

          <td style="width:100%;text-align:center">

            <a href="{{ route('buyer.cart') }}"

              style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:white;display:inline-block;text-align:center;width: auto;padding: 10px 15px;background-color:#e55c5c;text-decoration: none;width: 260px;">GO

              TO CART</a>

          </td>

        </tr>

        <tr>

          <td style="padding-top:20px">

            <span

              style="font-size:14px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">

              For any further assistance

            </span>

          </td>

        </tr>

        <tr>

          <td style="height:20px"></td>

        </tr>

        <tr>

          <td style="width:100%;text-align:center">

            <a href="https://api.whatsapp.com/send?phone=+916026768005&text=Hello"

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


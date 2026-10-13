<!doctype html>

<html lang="en">



<head>

  <!--Required Meta Tags-->

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="description">

  <!-- Title Of Site -->

  <title>LT STORE CREDIT REWARDS, Thank you for shopping with {{ config('app.name') }} ! </title>

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

            <span style="font-size:14px;line-height:21px;color:#333333">Hello

              {{ $data['customerName'] }},<br>

              Thank you for choosing Little Tag & being a part of the #LTCommunity !

            </span>

            <br />

            <p style="text-align:center;font-size:14px;line-height:21px;color:#333333;margin-top: 15px;">

              Thank you for shopping with us.

            </p>

          </td>

        </tr>

        <tr>

          <td>

            <span

              style="font-size:18px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;"><b>

                ENJOY YOUR LT STORE CREDIT REWARDS!</b> </span>

          </td>

        </tr>

        <tr>

          <td style="padding:10px 50px 0">

            <span

              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center;">

              You have earned points worth INR {{ number_format($data['rewardPoints'], 2) }} from your order no.

              {{ $data['orderId'] }}

              <br />

              placed on {{ $data['orderDate'] }}

              <br />

              <br />

              These points have been credited into your LT account & are a part of your LT wallet.

              <br />

              <br />

              Click on the link below to view your LT account & wallet balance.

            </span>

          </td>

        </tr>

        <tr>

          <td style="height:20px"></td>

        </tr>

        <tr>

          <td style="width:100%;text-align:center">

            <a href="{{ route('buyer.dashboard') }}"

              style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:white;display:inline-block;text-align:center;width: auto;padding: 10px 15px;background-color:#e55c5c;text-decoration: none;">

              GO TO YOUR LT ACCOUNT

            </a>

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

     {{--  @include('emails.layouts.social-links') --}}   

        <tr>

          <td style="height:20px"></td>

        </tr>

        {{-- @include('emails.layouts.footer') --}}

      </tbody>

    </table>



  </div>



</body>



</html>


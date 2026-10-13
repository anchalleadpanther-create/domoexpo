<!doctype html>

<html lang="en">



<head>

  <!--Required Meta Tags-->

  <meta charset="utf-8">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="description">

  <!-- Title Of Site -->

  <title>The {{ config('app.name') }} Club | Welcome to the Ivory Tier ! </title>

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

              {{ $data['buyer']->first_name }},<br>Greetings

              from Little Tag!</span>

          </td>

        </tr>

        <tr>

          <td align="center" bgcolor="#ffffff" style="padding-top:20px">

            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">We are grateful to have you

              as a part of our #LTCommunity.<br>

              As a member of the loyalty program, you are now qualified for the



            </span>

          </td>

        </tr>

        <tr>

          <td style="padding-top:20px">

            <span

              style="font-size:20px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;"><b>IVORY

                TIER CARD</b> </span>

          </td>

        </tr>

        <tr>

          <td align="center" style="padding:20px 160px">

            <div href=""

              style="border:0;text-decoration:none;position:relative; background: url({{ asset('allUsers/customer/images/IvoryTier-img.png') }});

    display: inline-block;

    background-size: cover;

    background-repeat: no-repeat;

    background-position: left;width:100%">



              <div style="margin: auto;display: inline-block;padding: 40px 20px;width: 96%;">

                <h2

                  style="color:#5d5e5e;font-weight:normal;margin-top:100px;letter-spacing: 1px;margin-bottom: 0;text-align: center;font-size: 25px;">

                  {{ $data['buyer']->fullName }}

                </h2>

                <h4 style="color:#5d5e5e;font-weight:bold;margin:0 0 40px 0;letter-spacing: 2px;">0609-2022-2300-0001

                </h4>

                <div style=" width:30%; float: left;">

                  <h5 style="color:#5d5e5e;font-weight:bold;margin:0 0 5px 0;letter-spacing: 1px; font-size: 12px;">

                    MEMBER

                    SINCE</h5>

                  <h6 style="color:#5d5e5e;font-weight:bold;margin:0;letter-spacing: 1px; font-size: 15px;">

                    {{ $data['buyer']->created_at->format("M'y") }}

                  </h6>

                </div>

                <div style=" width: 30%; float: right;">

                  <h5 style="color:#5d5e5e;font-weight:bold;margin:0 0 5px 0;letter-spacing: 1px; font-size: 12px;">

                    VALID

                    TILL</h5>

                  <h6 style="color:#5d5e5e;font-weight:bold;margin:0;letter-spacing: 1px;font-size: 15px;">

                    {{ $data['buyer']->membership_expiry_date->format("M'y") }}

                  </h6>

                </div>



              </div>

            </div>

          </td>

        </tr>

        <tr>

          <td style="padding-bottom:20px">

            <span

              style="font-size:16px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center"><b>Know

                more about the Ivory Tier </b></span>

          </td>

        </tr>

        <tr>

          <td>



            <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"

              style="font-family:'Poppins', sans-serif; padding:0 100px">

              <tbody>

                <tr>

                  <td valign="top" style="width:3%">&#x2022;

                  </td>

                  <td align="left" bgcolor="#ffffff">

                    <p

                      style="font-size:14px;line-height:21px;color:#333333;font-weight:normal;list-style: none; margin:0">

                      This is the 2nd tier of our loyalty program, automatically achieved by

                      shopping on LT for a value worth INR.

                      {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->requiredPoints, 2) }}/-

                    </p>

                  </td>

                </tr>

                <tr>

                  <td colspan="2" style="height:10px"></td>

                </tr>

                <tr>

                  <td valign="top" style="width:3%">&#x2022;

                  </td>

                  <td align="left" bgcolor="#ffffff">

                    <p

                      style="font-size:14px;line-height:21px;color:#333333;font-weight:normal;list-style: none; margin:0">

                      To maintain the ivory tier membership, a member needs to maintain an annual purchase of INR.

                      {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->requiredPoints, 2) }}/-</p>

                  </td>

                </tr>

              </tbody>

            </table>

          </td>

        </tr>



        <tr>

          <td style="height:20px"></td>

        </tr>

        <tr>

          <td style="padding-bottom:20px">

            <span

              style="font-size:16px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center"><b>Benefits

                :</b> </span>

          </td>

        </tr>



        <tr>

          <td>



            <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"

              style="font-family:'Poppins', sans-serif; padding:0 100px">

              <tbody>

                <tr>

                  <td valign="top" style="width:3%">&#x2022;

                  </td>

                  <td align="left" bgcolor="#ffffff">

                    <p

                      style="font-size:14px;line-height:21px;color:#333333;font-weight:normal;list-style: none; margin:0">

                      Enjoy a discount of

                      {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->percentageDiscountOnFirstPurchase, 0) }}%

                      on your first purchase as an Ivory tier card holder.</p>

                  </td>

                </tr>

                <tr>

                  <td colspan="2" style="height:3px"></td>

                </tr>

                <tr>

                  <td valign="top" style="width:3%">&#x2022;

                  </td>

                  <td align="left" bgcolor="#ffffff">

                    <p

                      style="font-size:14px;line-height:21px;color:#333333;font-weight:normal;list-style: none; margin:0">

                      Free shipping in India for any purchase over INR.

                      {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->freeShipping, 2) }}/-</p>

                  </td>

                </tr>

                <tr>

                  <td colspan="2" style="height:3px"></td>

                </tr>

                <tr>

                  <td valign="top" style="width:3%">&#x2022;

                  </td>

                  <td align="left" bgcolor="#ffffff">

                    <p

                      style="font-size:14px;line-height:21px;color:#333333;font-weight:normal;list-style: none; margin:0">

                      Cash on delivery available on all purchases within India.</p>

                  </td>

                </tr>



                <tr>

                  <td colspan="2" style="height:3px"></td>

                </tr>

                <tr>

                  <td valign="top" style="width:3%">&#x2022;

                  </td>

                  <td align="left" bgcolor="#ffffff">

                    <p

                      style="font-size:14px;line-height:21px;color:#333333;font-weight:normal;list-style: none; margin:0">

                      A bonus of points worth Rs.

                      {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->walletBonus, 2) }}/- will be

                      added

                      to your LT wallet.

                      which is redeemable immediately</p>

                  </td>

                </tr>

              </tbody>

            </table>

          </td>

        </tr>

        <tr>

          <td style="height:40px"></td>

        </tr>

        <tr>

          <td>

            <span

              style="font-size:14px;line-height:21px;color:#e589a2;display:inline-block;width:100%;text-align:center"><b

                style="font-family: 'Playfair Display', serif;font-size:18px">The LT Club</b><br>A universe of

              infinite possibilities </span>

          </td>

        </tr>



        <tr>

          <td style="padding-top:20px">

            <span

              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">

              Elevate your shopping experience with our loyalty program.<br>

              Get ready to buy more, carn more & redeem more!



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


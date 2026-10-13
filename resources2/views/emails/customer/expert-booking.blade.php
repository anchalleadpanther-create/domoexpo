<!doctype html>
<html lang="en">

<head>
  <!--Required Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="description">
  <!-- Title Of Site -->
  <title>{{ config('app.name') }} | Purchase Order</title>
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
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">
              Hello {{ $data['booking']->name }},
              <br />
              Thank you for choosing Little tag !
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:18px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;"><b>
                YOUR CONSULTATION HAS BEEN BOOKED
              </b></span>
          </td>
        </tr>
        <tr>
          <td height="15"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              with our personal stylist & colour analyst - {{ $data['booking']->expert->fullName }}. <br />
              Your session for {{ $data['booking']->package->name }} in confirmed for
              {{ $data['booking']->date->format('d M, Y') }} at {{ $data['booking']->time->format('H:i A') }}
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              Booking details :
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
                      <th style="font-weight: normal; padding: 3px 0;">Consultation Service</th>
                      <th style="font-weight: normal; padding: 3px 0;">Price</th>
                      <th style="font-weight: normal; padding: 3px 0;">Subtotal</th>
                    </tr>
                    <tr>
                      <td align="center"><span>{{ $data['booking']->package->name }}</span></td>
                      <td align="center"><span>{{ number_format($data['booking']->payment, 2) }}</span></td>
                      <td align="center"><span>{{ number_format($data['booking']->payment, 2) }}</span></td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="2" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Subtotal:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;"><span>
                          {{ number_format($data['booking']->payment, 2) }}
                        </span></td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="2" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%"><b>Grand Total:</b></span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          <b>
                            {{ number_format($data['booking']->payment, 2) }}
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
            </table>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              Note : <br />
              to get the most accurate analysis during your session, please share a <br />
              photograph of yourself as a reply to this email before the consultation.
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              Photo Guidelines : <br />
              - Please send a close up picture of your face in natural light. <br />
              - No spectacles <br />
              - No Make up <br />
              - Hair to be tied back <br />
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              The light should fall on your face as per the reference image below.
            </span>
          </td>
        </tr>
        <tr>
          <td height="10"></td>
        </tr>
        <tr>
          <td>
            <div
              style="display:flex;justify-content: center;-webkit-justify-content: center;align-items: center;-webkit-align-items: center;">
              <img src="{{ asset('allUsers/left.jpeg') }}" width="220px" style="margin-right: 10px;" />
              <img src="{{ asset('allUsers/right.jpeg') }}" width="220px" />
            </div>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td>
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              Elevate your shopping experience with our loyalty program. <br />
              Get ready to buy more, earn more & redeem more as a member of the <br />
              #LTCommunity!
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        @include('emails.layouts.social-links')
        <tr>
          <td style="height:20px"></td>
        </tr>
        @include('emails.layouts.footer')
      </tbody>
    </table>

  </div>
</body>

</html>

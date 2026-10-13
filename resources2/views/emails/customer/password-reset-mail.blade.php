<!doctype html>
<html lang="en">

<head>
  <!--Required Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="description">
  <!-- Title Of Site -->
  <title>Reset your Little Tag password </title>
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
              {{ $data['buyer']->first_name }},<br>
              Thank you for choosing LIttle Tag !
            </span>
          </td>
        </tr>

        <tr>
          <td height="20"></td>
        </tr>

        <!-- <tr>
          <td>
            <span
              style="font-size:18px;line-height:18px;color:#e589a2;display:inline-block;width:100%;text-align:center;font-family: 'Playfair Display', serif;"><b>FORGOT
                YOUR PASSWORD?</b> </span>
          </td>
        </tr> -->
        <tr>
          <td style="padding-top:20px">
            <span
              style="font-size:14px;line-height:15px;color:#333333;display:inline-block;width:100%;text-align:center">
              Click on the link below to reset your password & log into your Little Tag account.
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td style="width:100%;text-align:center">
            <a href="{{ route('buyer.password.reset', ['token' => $data['token'], 'email' => $data['email']]) }}"
              style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:white;display:inline-block;text-align:center;width: auto;padding: 10px 15px;background-color:#e55c5c;text-decoration: none;">RESET
              YOUR PASSWORD</a>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" style="padding:20px 50px">
            <a href="" style="border:0;text-decoration:none" target="_blank" data-saferedirecturl="">
            {{--
               <img src="{{ asset('allUsers/customer/images/newsletter-img.jpg') }}" style="display:block;width:100%;"
                alt="">
              --}} 
            </a>
          </td>
        </tr>


        <tr>
          <td style="padding-top:10px">
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              Get the first look at our freshest collections, irresistible discounts along with special<br>
              curations & tips from our in-house stylists as a part of the #LTCommunity.
            </span>
          </td>
        </tr>


        <tr>
          <td style="padding-top:10px">
            <span
              style="font-size:14px;line-height:21px;color:#333333;display:inline-block;width:100%;text-align:center">
              T & C apply<sup>*</sup></span>
          </td>
        </tr>
       {{--   @include('emails.layouts.social-links') --}}

        <tr>
          <td style="height:20px"></td>
        </tr>
        {{-- @include('emails.layouts.footer') --}}
      </tbody>
    </table>

  </div>
</body>

</html>

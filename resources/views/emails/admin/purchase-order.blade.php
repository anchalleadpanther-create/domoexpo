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
              Please find attached the
              <b>Little Tag</b> online purchase order <b>{{ $data['poPrefix'] . $data['poId'] }}</b>
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">
              Expected delivery time of the outfit / accessory is <b>{{ $data['vendorDeliveryDate'] }}</b> to Fashion
              Edit India. <br /> For any
              queries
              please write back on support@littletag.com
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal"><b>NOTE:</b></span>
          </td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">
              Kindly attach a hard copy of the invoice - signed & stamped, along with the order. <br /> We need a hard
              copy of
              invoices as per the GST guidelines, in order to process your <br /> payment earliest. Without invoice copy
              we
              will not be able to process your payment.
            </span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">Also, Please update our
              address for shipments;</span>
          </td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal">
              <b>A-402, 4th Floor, TIME SQUARE ARCADE II,
                RAMDASS ROAD,
                BODAKEDEV,
                Ahmedabad, Gujarat - 380 059<br /> GSTIN: -24AAOCA6072D1ZS</b>
            </span>
          </td>
        </tr>

        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#f9cad7">
            @foreach ($data['products'] as $product)
              @isset($product['sizeChart'])
                {!! htmlspecialchars_decode($product['sizeChart']) !!}
              @endisset
            @endforeach
          </td>
        </tr>

        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <span style="font-size:14px;line-height:21px;color:#333333;font-weight:normal"><b>Please confirm if you have
                received PO</b></span>
          </td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff">
            <a href="{{ route('purchase-order-status', [1, $data['pdfName']]) }}"
              style="background-color: #007B3D;color:white;border:0;padding:8px;width:150px;margin-right: 12px;text-decoration:none;">Confirm</a>
            <a href="{{ route('purchase-order-status', [2, $data['pdfName']]) }}"
              style="background-color: #960002;color:white;border:0;padding:8px;width:150px;margin-left: 12px;text-decoration:none;">Reject</a>
          </td>
        </tr>

        <tr>
          <td height="10"></td>
        </tr>
        <tr>
          <td style="padding-top:20px">
            <span
              style="font-size:14px;line-height:15px;color:#333333;display:inline-block;width:100%;text-align:center;font-weight: 500;">
              Warm Regards,<br />{{ config('app.name') }}
            </span>
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

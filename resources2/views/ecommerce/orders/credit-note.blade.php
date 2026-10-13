<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Credit Note</title>

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ public_path('allUsers/favicon.png') }}">
  <style>
    @page {
      size: 21cm 29.7cm;
      margin: 0;
    }

    body {
      padding: .1in;
      border: 5px solid #737373;
    }

    @font-face {
      font-family: 'arial';
      font-style: normal;
      font-weight: normal;
      src: url({{ storage_path('/fonts/arial.ttf') }}) format('truetype');
    }
  </style>
</head>

<body style="font-size:10px;font-family:arial;">
  <div style="border:1px solid #737373;padding:1px;">
    <table style="width:100%;margin:auto;background:#eceff4;color: #222;" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" style="height:20px"> &nbsp;</td>
      </tr>
      <tr>
        <td style="width:3%">&nbsp;</td>
        <td>
          <p style="margin-bottom:0px;margin-top:0px; text-align:left">GSTIN: 24AAOCA6072D1ZS</p>
          <p style="margin-bottom:0px;margin-top:0px; text-align:left">PAN: AAOCA6072D</p>
          <p style="margin-bottom:0px;margin-top:0px; text-align:left">CIN NO: U18100RJ1999PTC015666</p>
          <p style="margin-bottom:0px;margin-top:0px; text-align:left">customercare@fashioneditindia.com</p>
          <p style="margin-bottom:0px;margin-top:0px; text-align:left">tfe.accounts@fashioneditindia.com</p>
        </td>
        <td style="text-align:center">
          <h4 style="font-weight: normal;color:#222;margin-top:0px; margin-bottom:0px;text-align:left"><b>FASHION EDIT
              INDIA</b>
          </h4>
          <h4 style="font-weight: normal;color:#222;margin-top:0px; margin-bottom:0px;text-align:left"><b>ARC CRAFT
              EXPORTS PRIVATE
              LIMITED</b></h4>
          <p style="margin-top:0px; margin-bottom:0px;text-align:left">A-402, 4th Floor, TIME SQUARE ARCADE II, RAMDASS
            ROAD, BODAKEDEV, Ahmedabad, Gujarat - 380 059.</p>
          <p style="margin-top:0px; margin-bottom:0px;text-align:left">https://fashioneditindia.com</p>
        </td>
        <td style="text-align:center">
          <p style="margin-top:0;margin-bottom:0px;float: left;width: 100%;">
            <span style="float:right">ORIGINAL<br><img src="{{ public_path('allUsers/user/images/tfe-logo.png') }}"
                style="width:50px"></span>
          </p>
          <p style="margin-top:60px; margin-bottom:0px;">Support : +91 6359880688</p>
        </td>
        <td style="width:3%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" style="height:20px">&nbsp;</td>
      </tr>
    </table>
  </div>
  <br />
  <table style="width:100%;border:1px solid #737373;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:center;">
        <h4 style="padding: 5px 0; margin-top: 15px;color:#222;"> <b>CREDIT NOTE</b>
        </h4>
      </td>
    </tr>
  </table>
  <br />
  <table style="width:100%;border:1px solid #737373;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:left;width:16%;">
        <table style="width:100%;padding:5px;" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Credit Note No:</p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">
                {{ creditNotePrefix() . '/CN' . $creditNoteId }}</p>
            </td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Credit Note Date:</p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">{{ $creditNoteDate }} </p>
            </td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">State: </p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;">Gujrat</p>
            </td>
          </tr>

        </table>
      </td>

      <td style="text-align:left;width: 16%;border-left: 1px solid #434343;padding-left: 2%;">
        <table style="width:100%; " cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Order No:</p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">FEI-{{ $orderId }}</p>
            </td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Order Date: </p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">{{ $orderDate }} </p>
            </td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Code:</p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;">{{ $code }}</p>
            </td>
          </tr>
        </table>
      </td>

      <td style="text-align:left;width: 20%;border-left: 1px solid #434343;padding-left: 2%;">
        <table style="width:100%; " cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Airway /Shipping Bill No</p>
            </td>
            <td style="margin-bottom:2px;margin-top:0px;">{{ $airwayShippingBillNo }}</td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Airway /Shipping Bill Date </p>
            </td>
            <td style="margin-bottom:2px;margin-top:0px;">{{ $airwayShippingBillDate }}</td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Dispatch Doc No.</p>
            </td>
            <td style="margin-bottom:2px;margin-top:0px;">{{ $dispatchDocNo }}</td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Dispatched through </p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;">{{ $dispatchedThrough }}</p>
            </td>
          </tr>
        </table>
      </td>

      <td style="text-align:left;width: 20%;border-left: 1px solid #434343;padding-left: 2%;">
        <table style="width:100%; " cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Transport Mode: -</p>
            </td>
            <td style="margin-bottom:2px;margin-top:0px;">{{ $transportMode }}</td>
          </tr>
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Date of Supply: </p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;">{{ $dateOfSupply }}</p>
            </td>
          </tr>
          {{-- <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Place of Supply: </p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;">{{ $placeOfSupply }}</p>
            </td>
          </tr> --}}
          <tr>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">GST Payable on Reverse Charge :</p>
            </td>
            <td>
              <p style="margin-bottom:2px;margin-top:0px;">{{ $GstPayableOnReverseCharge }}</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>

  </table>
  <table style="width:100%; " cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:center;width:45%">
        <h4
          style="border-top: 1px solid #434343;border-bottom: 1px solid #434343;padding: 10px 0;color:#222;margin-bottom:0">
          <b>BILL TO PARTY</b>
        </h4>
      </td>
      <td style="text-align:center;width:55%">
        <h4
          style="border-top: 1px solid #434343;border-bottom: 1px solid #434343;padding: 10px 0; color:#222;border-left: 1px solid #434343;margin-bottom:0">
          <b>SHIP TO PARTY / DELIVERY ADDRESS</b>
        </h4>
      </td>
    </tr>

    <tr>
      <td style="text-align:center">

        <table style="width:100%;" cellpadding="0" cellspacing="0">
          <tr>
            <td style="text-align:left;width:48%">
              <table style="width:100%;" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Name: </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingName'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Address:</p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingAddress'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Phone No: </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingPhone'] }}</p>
                  </td>
                </tr>

                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">GSTIN: - </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingGst'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">State: </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingState'] }}</p>
                  </td>
                </tr>

              </table>
            </td>

            <td style="text-align:left;width: 48%;border-left: 1px solid #434343;padding-left: 2%;">
              <table style="width:100%;margin-top:-15px;" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Email: </p>
                  </td>
                  <td colspan="2">
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingEmail'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">City:</p>
                  </td>
                  <td colspan="2">
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingCity'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Code: </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingCode'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold"> Country: </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingCountry'] }}</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>


      </td>
      <td style="text-align:center">

        <table style="width:100%;margin-top:0px" cellpadding="0" cellspacing="0">
          <tr>
            <td style="text-align:left;border-left: 1px solid #434343;padding-left: 2%;">
              <table style="width:100%; " cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Name: </p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingName'] }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Address:</p>
                  </td>
                  <td>
                    <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingAddress'] }}</p>
                  </td>
                </tr>


                <tr>
                  <td colspan="2">
                    <table style="width:100%; " cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Phone No: </p>
                        </td>
                        <td colspan="2">
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingPhone'] }}</p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Mail id:</p>
                        </td>
                        <td colspan="2">
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingEmail'] }}</p>
                        </td>

                      </tr>
                      <tr>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">GSTIN: - </p>
                        </td>
                        <td colspan="2">
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingGst'] }}</p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">City:</p>
                        </td>
                        <td colspan="2">
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingCity'] }}</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">State: </p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingState'] }}</p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Code:</p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingCode'] }}</p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;font-weight:bold">Country:</p>
                        </td>
                        <td>
                          <p style="margin-bottom:2px;margin-top:0px;">{{ $shippingInfo['shippingCountry'] }}
                          </p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>


          </tr>
        </table>

      </td>
    </tr>



  </table>


  <table style="width:100%;color: #222;margin-top:40px;border:1px;border-color:#eee;" cellpadding="0" cellspacing="0"
    border="1">
    <tbody>

      <tr>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Sr.No </th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Description Of Goods</th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Item - SKU</th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Size</th>
        <th style="text-align:left;font-weight: normal;color: #222;background:#eceff4;padding: 2px;font-weight:bold">
          QTY</th>
        <th style="text-align:left;font-weight: normal;color: #222;background:#eceff4;padding: 2px;font-weight:bold">
          Unit of Measurement</th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Rate Per item <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Discount Value <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Taxable Value <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          HSN</th>
        <th style="text-align:left;font-weight: normal;color: #222;background:#eceff4;padding: 2px;font-weight:bold">
          GST(%)</th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          @if (!$sameState)
            IGST <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span>
          @endif
        </th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          @if ($sameState)
            CGST <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span>
          @endif
        </th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          @if ($sameState)
            SGST <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span>
          @endif
        </th>
        <th style="text-align:left;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          TOTAL <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></th>
      </tr>
      @foreach ($products as $key => $product)
        <tr>
          <td style="text-align:left;font-weight: normal;padding: 2px;">{{ ++$key }}</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">{{ $product->name }} -
            {{ $product->color }}
          </td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">{{ $product->sku }}</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">{{ $product->size }}</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">{{ $product->quantity }}</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;color: #222;">Nos</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($product->price_unit + $product->coupon_amount, 2) }}
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($product->coupon_amount, 2) }}
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($product->gstAmountWithoutQuantity * $product->quantity, 2) }}
          </td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">{{ $product->hsn_code }}</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">{{ $product->gst }}%</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;color: #222;">
            @if (!$sameState)
              {{ number_format($product->price_unit * $product->quantity - $product->gstAmount, 2) }}
            @endif
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            @if ($sameState)
              {{ number_format(($product->price_unit * $product->quantity - $product->gstAmount) / 2, 2) }}
            @endif
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            @if ($sameState)
              {{ number_format(($product->price_unit * $product->quantity - $product->gstAmount) / 2, 2) }}
            @endif
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($product->price_unit * $product->quantity, 2) }}</td>
        </tr>
      @endforeach
      @if ($amount['shippingChargesWithGst'] > 0.0)
        <tr>
          <td style="text-align:right;font-weight: normal;padding: 2px;">{{ count($products) + 1 }}</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">{{ 'Shipping Charges' }}</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;"></td>
          <td style="text-align:left;font-weight: normal;padding: 2px;"></td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">1</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;color: #222;"></td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($amount['shippingChargesWithGst'], 2) }}
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            0.00
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($amount['shippingChargesWithGst'] - $amount['shippingChargesGst'], 2) }}
          </td>
          <td style="text-align:left;font-weight: normal;padding: 2px;"></td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">18%</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;color: #222;">
            @if (!$sameState)
              {{ number_format($amount['shippingChargesGst'], 2) }}
            @endif
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            @if ($sameState)
              {{ number_format($amount['shippingChargesGst'] / 2, 2) }}
            @endif
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            @if ($sameState)
              {{ number_format($amount['shippingChargesGst'] / 2, 2) }}
            @endif
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($amount['shippingChargesWithGst'], 2) }}</td>
        </tr>
      @endif

      <tr>
        <td style="text-align:center;font-weight: normal;padding: 2px;" colspan="3"><b>TOTAL</b></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          {{ number_format($amount['shippingChargesWithGst'] > 0.0 ? $amount['totalProductQuantities'] + 1 : $amount['totalProductQuantities']) }}
        </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          {{ number_format($amount['totalPriceOfProducts'] + $amount['shippingChargesWithGst'], 2) }}
        </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          {{ number_format($amount['grandTotalWithoutTax'] + ($amount['shippingChargesWithGst'] - $amount['shippingChargesGst']), 2) }}
        </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          @if (!$sameState)
            {{ number_format($amount['sumOfTax'] + $amount['shippingChargesGst'], 2) }}
          @endif
        </td>
        <td style="text-align:right;font-weight: normal;padding: 2px;">
          @if ($sameState)
            {{ number_format($amount['sumOfTax'] + $amount['shippingChargesGst'] / 2, 2) }}
          @endif
        </td>
        <td style="text-align:right;font-weight: normal;padding: 2px;">
          @if ($sameState)
            {{ number_format($amount['sumOfTax'] + $amount['shippingChargesGst'] / 2, 2) }}
          @endif
        </td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          {{ number_format($amount['grandTotalWithTax'], 2) }}
        </td>
      </tr>

      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5"><b>Payment Mode : Cash on
            Delivery (COD)</b></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="3">Total Amount before Tax <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span>
        </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;">
          {{ number_format($amount['grandTotalWithoutTax'], 2) }}</td>
      </tr>

      <tr>
        <td style="text-align:right;font-weight: normal;padding: 2px;" colspan="5"><b>Total Invoice Amount in
            Words: {{ $amount['grandTotalWithTaxInWords'] }}</b></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="3">Total Tax Amount <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;">
          {{ number_format($amount['sumOfTax'] + $amount['shippingChargesGst'], 2) }}
        </td>
      </tr>
      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">TAXABLE AMT <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">GST %</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">GST AMT <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span> </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">TOTAL AMT <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="3">Discount %</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">Discount <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
        <td style="text-align:right;font-weight: normal;padding: 2px;">
          {{ number_format($amount['totalCouponAmount'], 2) }}</td>
      </tr>
      @foreach ($taxAmounts as $taxAmount)
        <tr>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($taxAmount['sellingPriceWithoutTax'], 2) }}
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ $taxAmount['gst'] }}%
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($taxAmount['taxAmount'], 2) }}
          </td>
          <td style="text-align:right;font-weight: normal;padding: 2px;">
            {{ number_format($taxAmount['sellingPrice'], 2) }}</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
          @if ($loop->first)
            <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="3">Shipping Amount <span
                style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
            <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
            <td style="text-align:right;font-weight: normal;padding: 2px;">
              {{ number_format($amount['shippingChargesWithoutGst'], 2) }}</td>
          @else
            <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="3">&nbsp;</td>
            <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
            <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
          @endif
        </tr>
      @endforeach

      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold" colspan="3">TOTAL <span
            style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span>
        </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          {{ number_format($amount['grandTotalWithTax'], 2) }}</td>
      </tr>
      @if ($amount['totalWalletAmount'] > 0.0)
        <tr>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold" colspan="3">Wallet
            Amount <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
            {{ number_format($amount['totalWalletAmount'], 2) }}
          </td>
        </tr>
      @endif
      @if ($amount['totalGiftCardAmount'] > 0.0)
        <tr>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold" colspan="3">Gift-Card
            Amount <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
            {{ number_format($amount['totalGiftCardAmount'], 2) }}
          </td>
        </tr>
      @endif
      @if ($amount['totalReferralAmount'] > 0.0)
        <tr>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold" colspan="3">Referral
            Amount <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
            {{ number_format($amount['totalReferralAmount'], 2) }}
          </td>
        </tr>
      @endif
      @if ($amount['totalAdvanceAmount'] > 0.0)
        <tr>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
          <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold" colspan="3">Advance
            Amount <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span></td>
          <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
          <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
            {{ number_format($amount['totalAdvanceAmount'], 2) }}
          </td>
        </tr>
      @endif
      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5"><b>Net Amount Receivable in
            Word: {{ $amount['amountReceivableInWords'] }}</b></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;font-weight:bold" colspan="3">Net Amount
          Receivable <span style="font-family: DejaVu Sans; sans-serif;font-weight:lighter">(&#8377;)</span> </td>
        <td style="text-align:left;font-weight: normal;padding: 2px;">&nbsp;</td>
        <td style="text-align:right;font-weight: normal;padding: 2px;font-weight:bold">
          {{ number_format($amount['amountReceivable'], 2) }}
        </td>
      </tr>

      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5">&nbsp;</td>
        <td style="text-align:left;font-weight: normal;padding: 2px;" colspan="5"><b></b> </td>

      </tr>

    </tbody>
  </table>
  <p style="text-align:right"><b>For, ARC CRAFT EXPORTS PRIVATE LIMITED</b></p>

  <table style="width:100%; margin-top:15px" cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 0px 0; margin-top: 0;"> E. & O.E</p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 0px 0; margin-top: 0;"> Terms and Conditions</p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 0px 0; margin-top: 0;"> Subject to AHMEDABAD Jurisdiction Only.</p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left">
        <p style="padding: 0px 0; margin-top: 0;"> We declare that this invoice shows the actual price of the
          goods or services described and that all particulars are true and correct.</p>
      </td>
      <td style="text-align:left">
        <p style="padding: 0px 0; margin-top: 0;"> Authorised Signatory</p>
      </td>
    </tr>

    <tr>
      <td style="text-align:center" colspan="2">
        <p style="padding: 0px 0; margin-top: 0;"> This is a computer generated invoice and does not require a
          signature</p>
      </td>
    </tr>
  </table>
</body>

</html>

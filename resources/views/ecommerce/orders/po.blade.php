<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PO</title>

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

<body style="background:#fff;font-size:10px;font-family:arial!important;">
  <table style="width:100%; margin:auto;background:#eceff4;color: #7b7979;border:1px solid #737373;" cellpadding="0"
    cellspacing="0">
    <tr>
      <td colspan="5" style="height:20px"> &nbsp;</td>
    </tr>
    <tr>
      <td style="width:3%">&nbsp;</td>
      <td>
        <p style="margin-bottom:2px;margin-top:0px;">
          <img src="{{ public_path('allUsers/customer/images/logo-new.png') }}" style="width:120px;height:55px;" />
        </p>
        <h3 style="font-weight: normal;color:#222;margin-top:25px;margin-bottom:2px;"><b>GSTN :
            24AAOCA6072D1ZS</b></h3>
      </td>
      <td style="text-align:center">
        <h2 style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;"><b>FASHION EDIT INDIA</b>
        </h2>
        <p style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;">(UNIT - ARC CRAFT EXPORTS
          PRIVATE LIMITED)</p>
        <p style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;">A-402, 4th Floor, TIME SQUARE ARCADE
          II,</p>
        <p style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;">RAMDASS ROAD, BODAKEDEV, Ahmedabad, Gujarat - 380 059.</p>
        <p style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;">Email - <a
            href="mailto:tfe.accounts@fashioneditindia.com" class="__cf_email__">tfe.accounts@fashioneditindia.com</a>
        </p>
        <h3 style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;"><b>CIN NO.
            U18100RJ1999PTC015666</b></h3>
      </td>
      <td style="text-align:center">
        <p style="font-weight: normal;color:#222;margin-top:70px;margin-bottom:0px;">Phone : 6359880688</p>
        <h3 style="font-weight: normal;color:#222;margin-top:0px;margin-bottom:2px;"><b>Pan No. AAOCA6072D</b>
        </h3>
      </td>
      <td style="width:3%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" style="height:20px">&nbsp;</td>
    </tr>
  </table>
  <br />
  <table style="width:100%;border:1px solid #737373;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:center">
        <h3 style="{{-- border-bottom: 1px solid #ddd; --}}padding: 8px 0; margin-top: 10px;color:#222;">
          <b>PURCHASE ORDER</b>
        </h3>
      </td>
    </tr>
  </table>
  <br />
  <table style="width:100%;border:1px solid #737373;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:center;padding-left:5px;padding-bottom:10px;">
        <table style="width:100%; " cellpadding="0" cellspacing="0">
          <tr>
            <td style="text-align:left;width:60%">
              <table style="width:100%; " cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">D_Code </p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">792906</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">Name</p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->biz_name }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">Store Name </p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->biz_name }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">Address </p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->biz_company_address }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">City</p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->city?->name }} </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">State</p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->state?->name }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">GSTIN/ UIN No.</p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->biz_reg_gst }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">Contact No </p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $supplier->ar_phone }}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;font-weight:bold;color: #222222;">Email Id </p>
                  </td>
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">
                      <a href="mailto:{{ $supplier->biz_email }}" class="__cf_email__">
                        {{ $supplier->biz_email }}
                      </a>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
            <td style="text-align:center!important;border-left: 1px solid #737373;padding-left: 2%;">
              <table style="width:100%; " cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr style="text-align:center!important;">
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">Purchase Order No. </p>
                  </td>
                </tr>
                <tr style="text-align:center!important;">
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;color: #222222;"><b>{{ $poPrefix . $poId }}</b></p>
                  </td>
                </tr>
                <tr style="text-align:center!important;">
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">Purchase Order Date</p>
                  </td>
                </tr>
                <tr style="text-align:center!important;">
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">{{ $acceptedAt }}</p>
                  </td>
                </tr>
                <tr style="text-align:center!important;">
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;">Payment Terms</p>
                  </td>
                </tr>
                <tr style="text-align:center!important;">
                  <td>
                    <p style="margin-bottom:0px;margin-top:0px;color: #222222;"><b>As Per Contract Terms </b></p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table style="width:100%;color: #222;margin-top:20px;border:1px;border-color:#eee;" cellpadding="0" cellspacing="0"
    border="1">
    <tbody>
      <tr>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold">Order No.</td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold">Order Date
        </td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold">Type of Order
        </td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold" colspan="3">
          Delivery Date at FEI W/h</td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold" colspan="1">
          Markdown %</td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold" colspan="2">
          Additional Discount %</td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;font-weight:bold" colspan="3">MRP
          to customer </td>
      </tr>
      @foreach ($orders as $order)
        <tr>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            FEI-{{ $order->order_id_counter }}</td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $purchaseDate }}</td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $order->cartItem?->product?->availability }}</td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;" colspan="3">
            {{ $order->cartItem?->product?->vendor_delivery_date }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;" colspan="1">
            {{ $supplierCommissionPercentage }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;" colspan="2">&nbsp;</td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;" colspan="3">
            {{ number_format($products[$order->cartItem?->product_id]['totalPrice'], 2) }}
          </td>
        </tr>
      @endforeach
      <tr>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Product Description (Vendor SKU) </th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          FEI-SKU</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Type of Order</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Image</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Image 1</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          HSN</th>
        <th style="text-align:center;font-weight: normal;color: #222;background:#eceff4;padding: 2px;font-weight:bold">
          Quantity</th>
        <th style="text-align:center;font-weight: normal;color: #222;background:#eceff4;padding: 2px;font-weight:bold">
          Rate</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Amount</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          GST Rate</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          GST</th>
        <th
          style="text-align:center;font-weight: normal;color: #222;background: #eceff4;padding: 2px;font-weight:bold">
          Total Amount </th>
      </tr>
      @foreach ($orderedProducts as $product)
        <tr>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $product->name }} - {{ $product->color }} - {{ $product->size }}
            <br />
            <span style="font-size:10px;">{{ $products[$product->product_id]['adminComment'] }}</span>
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $product->sku }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $product?->product?->availability }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            @isset($products[$product->product_id]['frontImage'])
              <img src="{{ $products[$product->product_id]['frontImage'] }}" style="width:50px;height:70px" />
            @endisset
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            @isset($products[$product->product_id]['backImage'])
              <img src="{{ $products[$product->product_id]['backImage'] }}" style="width:50px;height:70px" />
            @endisset
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $product->hsn_code }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ $product->quantity }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($products[$product->product_id]['priceWithoutCommissionAndTax'], 2) }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($products[$product->product_id]['priceWithoutCommissionAndTax'], 2) }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($products[$product->product_id]['gst'], 2) }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($products[$product->product_id]['gstAmount'], 2) }}
          </td>
          <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
            {{ number_format($products[$product->product_id]['priceWithoutCommission'], 2) }}
          </td>
        </tr>
      @endforeach
      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;color: #222;" colspan="8"><b>Total</b>
        </td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
          <b>{{ number_format($grandTotalWithoutTax, 2) }}</b>
        </td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">&nbsp;</td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
          <b>{{ number_format($totalOfTax, 2) }}</b>
        </td>
        <td style="text-align:center;font-weight: normal;padding: 2px;color: #222;">
          <b>{{ number_format($grandTotal, 2) }}</b>
        </td>
      </tr>
      <tr>
        <td style="text-align:left;font-weight: normal;padding: 2px;color: #222;" colspan="3"><b>Amount in
            Words:</b></td>
        <td style="text-align:left;font-weight: normal;padding: 2px;color: #222;" colspan="9">
          <b>{{ $grandTotalInWords }}</b>
        </td>
      </tr>
    </tbody>
  </table>
  <table style="width:100%;margin-top:30px;background:#fff;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin: 0; color:#222"><b>Delivery Address -FEI Warehouse,</b> </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin: 0; color:#222"><b>FASHION EDIT INDIA,ARC CRAFT EXPORTS PRIVATE
            LIMITED</b> </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin: 0; color:#222"><b>A-402, 4th Floor, TIME SQUARE ARCADE II, 
            RAMDASS ROAD, <br/>BODAKEDEV,<br/> Ahmedabad, Gujarat - 380 059.</b> </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 0; margin-top:20px;color:#222"><b> Special Remarks:-Please
            Ensure to send the Original Tax Invoice as per the PO along with Goods and Mail the<br> Soft copy of
            Tax Invoice at email ID- <a href="mailto:tfe.accounts@fashioneditindia.com"
              class="__cf_email__">tfe.accounts@fashioneditindia.com</a>
          </b></p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 0; margin-top:20px;color:#222">
          <b>This order is subject to terms & conditions Mentioned herein.</b>
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          1) In case the merchandise as mentioned in the Order referred to above cannot be made as per the
          specifications for whatever reason, the same must be communicated to us in writing within 2 (two)
          working days from the receipt of the Order. Any intimation or cancellation beyond 2 (two) working days
          as well as the Order delays beyond the specified delivery date shall attract a penalty of 10% of the
          order value. The said penalty amount shall be recovered through a Debit Note raised in your/your
          company's account.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          2) Please supply the material as specified in this Order.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          3) Please quote PO & Shopify Order No . in all your correspondence, invoice or challan etc.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          4) Goods Must be dispatch along with Original Tax Invoice as per Address for the delivery.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          5) Leave extra margin.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          6) Please do finishing for entire piece.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          7) The outfit has to be made identical as original in terms of colour, fabric, style and embroidery.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          8) Any cost incurred till the place of delivery including octroi should be vendors responsibility.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          9) The prices governing this order shall for all purposes remain firm unless otherwise-agreed to
          specifically in writing and shall be as per the terms of the order and delivery at Fashion Edit
          godown or any place in the order.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          10) Delivery time is the essence of this contract and must be strictly adhered to. Fashion Edit
          reserves the right to cancel the order if delivery timelines mentioned in the PO are not Met.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          11) The Customer price mentioned on the PO is the final MRP to the customer and the payment amount due
          to you as per the PO Amount as per contract net of FEI Margins.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          12) The final payment to you will be done as per the margin/mark down and Terms & Conditions agreed
          beforehand between the Designer and Fashion Edit Private Limited.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          13) The product should be accompanied with an invoice or challan. Pieces received without invoice or
          challan do not get processed which leads to delay in payment, so, kindly send an invoice or challan
          along with order pieces.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          14) Payment will be made as per agreed terms by the 10th of next month from date of final Delivery to
          the customer and subject to Proper tax Invoice.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:0px;color:#222">
          15) Subject to Ahmedabad Jurisdiction.
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:20px;color:#222"><b>
            Registered Office - ARC Craft Exports Private Limited - B-1, SHASTRI CIRCLE, OPP. PAUL'S SCHOOL,,
            JODHPUR, Rajasthan, India, 342005 , <br>
            Corporate Office No 4, THE THAR DRY PORT, NEAR MUNI KRIPA ASHRAM, SANAND, Ahmedabad, Gujarat, 382110
          </b>
        </p>
      </td>
    </tr>
    <tr>
      <td style="text-align:left" colspan="2">
        <p style="padding: 2px 0; margin-bottom: 5px; margin-top:10px;color:#222"><b>**THIS IS SYSTEM GENERATED
            PURCHASE ORDER,DOES NOT REQUIRE SIGNATURE AND STAMP</b></p>
      </td>
    </tr>
  </table>
</body>

</html>

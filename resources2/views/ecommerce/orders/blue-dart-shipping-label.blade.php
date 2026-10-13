<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Shipping Label</title>
      <style>
         body {
         margin:auto;
         width:660px;
         padding:20px;
         border:1px solid black;
         position:relative;
         top:20px;
         }
         .logo {
         position:relative;
         left:110px;
         }
         .barcode {
         position:relative;
         left:80px;
         }
      </style>
      <script language="Javascript1.2">
         <!--
         function printpage() {
         window.print();
         }
         //-->
      </script>
   </head>
   <body>
      <table width="100%">
         <tbody>
            <tr>
               <td style="border:1px solid black;position: relative;left: 3px;width:50%;">
                  <img class="logo" src="{{asset('allUsers/logo.png')}}" width="150px">
               </td>
               <td style="border:1px solid black;padding-left:10px;width:50%;">
                  <p>
                     <small><span style="padding-right:10px;">INVOICE DATE </span>: {{$purchaseDate}} </small> <br>
                     <small> <span style="padding-right:53px;">C/CODE </span> : DEL/304743 </small> <br>
                     <small> <span style="padding-right:54px;"> GST NO </span> : 07ANMPB2836N1ZQ </small> <br>
                     <small> <span style="padding-right:25px;"> INVOICE NO </span>: {{$orders[0]->invoice_id}} </small> <br>
                     <small><span style="padding-right:46px;"> COD/PRE </span> : 
                        @if($orderDetail->payment_method == 'Cash on Delivery' || $orderDetail->payment_method == 'COD')
                            COD
                        @else
                            PRE
                        @endif
                    
                    </small> <br>
                  </p>
               </td>
            </tr>
            <tr>
               <td>
                  <h3> DELIVER TO :</h3>
               </td>
            </tr>
         </tbody>
      </table>
      <table width="100%">
         <tbody>
            <tr>
               <td style="border:1px solid black;padding-left:10px;">
                  <p>
                     {{ $orderDetail->shipping_name }} <br>
                     {{ $orderDetail->shipping_address }} <br>
                     {{ $orderDetail->city->name }},{{ $orderDetail->state->name }},{{ $orderDetail->country->name }},  {{$orderDetail->shipping_pincode}}<br>
                     PHONE NO :- {{$orderDetail->shipping_phone}}
                  </p>
               </td>
            </tr>
         </tbody>
      </table>
      <table width="100%" style="margin-top:20px;">
         <tbody>
            <tr>
               <td style="border:1px solid black;position: relative;left: 3px;width:50%;padding-top:15px;">
                  <!-- <img class="barcode" src="{{asset('allUsers/logo.png')}}" width="150px"><br> -->
                {{--  <img class="barcode" src="data:image/png;base64,{{ DNS1D::getBarcodePNG('25587741', 'C39' ) }}" width="150px"><br>--}}

                  
                  <p style="text-align:center;">{{$orders[0]->blue_dart_awb_no}}</p>
               </td>
               <td style="border:1px solid black;padding-left:10px;width:50%;text-align:center;">
                  <span style="font-weight:bold;font-size:25px;">VIJ/PMA</span><br>
                  <small>ORDER NO - {{$orderDetail->invoice_id}}</small>
               </td>
            </tr>
         </tbody>
      </table>
      <table>
         <tbody>
            <tr>
               <td>
                <h3>
                    @if($orderDetail->payment_method == 'Cash on Delivery' || $orderDetail->payment_method == 'COD')
                        Cash On Delivery (COD) -  COLLECT AMOUNT RS: {{$orderDetail->grand_total}}
                    @else
                        PREPAID - DO NOT COLLECT ANY AMOUNT RS: 0
                    @endif
                </h3>
               </td>
            </tr>
         </tbody>
      </table>
      <table width="100%" style="border:1px solid black;border-collapse:collapse;text-align:center;">
         <tbody>
            <tr style="border:1px solid black;">
               <th style="border:1px solid black;"> SN.</th>
               <th style="border:1px solid black;"> Goods description</th>
               <th style="border:1px solid black;"> Dimension<br>(cm)<br>(L*B*H)</th>
               <th style="border:1px solid black;"> Wt.(KG)</th>
               <th style="border:1px solid black;"> Qty.</th>
               <th style="border:1px solid black;"> Amount (Rs)</th>
            </tr>

            @foreach($orderedProducts as $key =>  $product)
                <tr>
                <td style="border:1px solid black;height:70px;"> {{($key + 1)}} </td>
                <td style="border:1px solid black;"> {{$product->name}}</td>
                <td style="border:1px solid black;"> {{$product->length}}x{{$product->breadth}}x{{$product->height}} </td>  
                <td style="border:1px solid black;"> {{$product->weight}} </td>
                <td style="border:1px solid black;"> {{$product->quantity}} </td>
                <td style="border:1px solid black;"> {{ $product->quantity*$product->price_unit }} </td>
                </tr>
            @endforeach
           
         </tbody>
      </table>
      <p style="text-align:center;font-size:15px;font-weight:bold;">If Undelivered Please RTO on Below Address:-</p>
      <p style="text-align:center;font-size:15px;">Sparsh India Couture,<br>
         Plot No. 84, Patparganj Industrial Area<br>
         NEW DELHI, 110092, Ph:- 8447722222, E-mail :- care@littletags.com
      </p>
   </body>
</html>
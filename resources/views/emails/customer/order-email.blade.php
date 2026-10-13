@extends('emails.admin.layout.app')
@section('email_content')
<table align="center" width="800" border="0" cellspacing="0" cellpadding="0"
   style="padding-top:0px;font-family:'Poppins', sans-serif;background:#fff">
   <tbody>
      <tr>
         <td align="center" bgcolor="#ffffff" colspan="2">
            <img src="{{asset('allUsers/emailer-img.png')}}" style="width:100%">
         </td>
      </tr>
      <tr>
         <td align="center" bgcolor="#ffffff" colspan="2">
            <span style="font-size:18px;line-height:21px;color:#333333;font-weight:normal">Hello <b> {{ $data['order']->buyer->first_name }}</b>
            </span>
         </td>
      </tr>
      <tr>
         <td height="20" colspan="2"></td>
      </tr>
      
      
           <tr>
               <td colspan="2">
                  <table style="width:100%; text-align:center; background:#03a785; " border="0" cellspacing="0" cellpadding="0">
                     <tr>
                     <td height="20" colspan="2"></td>
                     </tr>
                     <tr>
                     <td style="width:3%"></td>
                     <td>
                  <b style="font-size:22px;line-height:28px; color:#fff;">Sit Back And Relax. Your Order Is 
                  @if ($data['order']->payment_method === 'Cash on Delivery')
                     <b>Order Recived</b>
                  @else
                     <b>Order Placed</b>
                  @endif</b><br>

                  @if ($data['order']->payment_method === 'Cash on Delivery')
                     <b style=" color:#fff;">As all our products are made to order, we request you to make <br />
                     a partial advance payment so we can go ahead & confirm your order.</b>
                  @else
                     <b style=" color:#fff;"> We have received your order & <br> will let you know once it is dispatched.</b>
                  @endif
                  @if (in_array('CUSTOM', $data['order']->orderItems->pluck('size')->toArray()))
                     <br />
                     <b style=" color:#fff;"> Due to this being a custom order, there maybe a price variation for sizes beyond XL.</b>
                  @endif
               <br>
               <p style="height:10px">&nbsp;</p>
                  <a href="{{url('/')}}/buyer/dashboard" style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:black;display:inline-block;text-align:center;width: auto;padding: 5px 15px;background-color:#fff;text-decoration: none;">
                  <b> VIEW ORDER DETAILS</b>
                  </a>
                  {{-- <a href="#" style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:black;display:inline-block;text-align:center;width: auto;padding: 5px 15px;background-color:#fff;text-decoration: none;">
                  <b>PAY ONLINE</b> --}}
                  </a>			
               </td> 
               <td style="width:3%"></td>
            </tr>
            <tr>
               <td height="20" colspan="2"></td>
               </tr>
                </table>
                </td>
            </tr>
                
         <tr>
            <td colspan="2">
               <table style="width:100%; text-align:center; " border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td height="20" colspan="2"></td>
                     </tr>
                     <tr>
                     <td style="width:3%"></td>
                     <td>  
                     <!-- <h3 style="font-size:22px;line-height:28px;color:#000; width:100%;text-align:center;background:#fff;">Delivery by <span style=" color:#03a785">Sun, 18th Feb</span></h3> -->
                     </td>
                     <td style="width:3%"></td>
                     </tr>
                     <tr>
                     <td height="20" colspan="2"></td>
                  </tr>
               </table>
            </td>
         </tr>
                
                
                 <tr>
         <td colspan="2">
            <table style="width:100%; text-align:center; background:#e2f2f1; " border="0" cellspacing="0" cellpadding="0">
               <tr>
               <td height="20" colspan="2"></td>
               </tr>
                <tr>
               <td style="width:3%"></td>
               <td>
           <b style="font-size:22px;line-height:28px;color:#03a785">Please Share Your Experience</b><br>
            Based on your purchase experience on the littletag app/website,<br> how likely are you to recommend littletag to your friends and family?<br><br>
            <img src="{{asset('allUsers/confirmation-stepImg.png')}}" style="width:500px">			
         </td> 
               <td style="width:3%"></td>
                </tr>
               <tr>
               <td height="20" colspan="2"></td>
               </tr>
                </table>
                </td>
                </tr>
                
      
      <tr>
         <td colspan="2">
            <table style="width:100%;" border="0" cellspacing="0" cellpadding="0" >
               <tr>
                  <td style="width:7%"></td>
                  <td style="padding-top:20px;text-align:left" >
                     <span style="font-size:17px;line-height:28px;color:#333333;">
                     <b>Quick Details </b> </span>
                  </td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td style="padding-top:10px;padding-bottom:20px" >
                     <span
                        style="font-size:13px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:left">
                     Your Order ID:<br>
                     <b style="font-size:15px;">{{ $data['order']->id }} </b>
                     </span>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
             <td colspan="2">
            <table style="width:100%;color:#000" border="0" cellspacing="0" cellpadding="0">
                         
               @foreach ($data['orderItems'] as $order)
                <tr>
                  <td style="width:7%"></td>
                    <td align="left" bgcolor="#ffffff" style="width:100px;padding-right:20px">
                     <img
                        src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                        style="width:100%" />			
                  </td>
                  <td align="left" bgcolor="#ffffff" style="font-size:13px">
                     @if (isset($order->productTypeValueOne))
                     <b style="font-size:14px">{{ $order->productTypeValueOne->type_value }}</b><br>
                     @endif
                     {{ $order->name }}<br>
                     @if (isset($order->productTypeValueTwo))
                     Size: <b>{{ $order->productTypeValueTwo->type_value }}</b>  |
                     @endif
                     Qty: <b>{{ $order->quantity }}</b><br>
                     {{ @$data['order']->orderCurrency->currency }}
                     {{ number_format($order->orderItemDetail->grand_total * @$data['order']->orderCurrency->con_ratio, 2) }}<br>
                     {{-- Saved <b style="color:#03a785">₹1260.00</b> --}}
                  </td>
               </tr>
               @endforeach
               {{-- <tr>
                  <td style="width:7%"></td>
                  <td colspan="2">
                     <p style="font-size:12px;margin-top:0;margin-bottom:30px">Sold by: MADHAV IMPEX INDIA</p>
                  </td>
               </tr> --}}
            </table>
         </td>
      </tr>
      
      <tr>
         <td style="padding-top:20px" colspan="2">
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td style="width:7%"></td>
                  <td style="text-align:left;padding-bottom:10px" >
                     <span style="font-size:17px;line-height:28px;color:#333333;">
                     <b>Price Breakup </b> </span>
                  </td>
                  <td style="width:7%"></td>
               </tr>


               <tr>
                  <td style="width:7%"></td>
                  <td>
                     <table style="width:100%;font-size:13px;color:#333;border:0" border="1" cellspacing="0" cellpadding="0">
                      <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                        <span style="padding-left:5%">Subtotal:</span>
                      </td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->grand_total - $data['giftTotal'] * @$data['order']->orderCurrency->con_ratio, 2) }}
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
                          {{ number_format($data['order']->wallet * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>

                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Discount Via Coupon:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          -  {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->coupon_amount * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Discount Via Referral:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          - {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->referral_amount * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Discount Via Gift Card:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          -  {{ @$data['order']->orderCurrency->currency }}
                          {{ number_format($data['order']->gift_card_amount, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%">Shipping:</span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          -{{ @$data['order']->orderCurrency->currency }}
                          {{ number_format(@$data['order']->shipping_charge * @$data['order']->orderCurrency->con_ratio, 2) }}
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
                          {{ number_format(@$data['giftTotal'] * @$data['order']->orderCurrency->con_ratio, 2) }}
                        </span>
                      </td>
                    </tr>
                    <tr style="background:#eee">
                      <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                          style="padding-left:5%"><b>Grand Total:</b></span></td>
                      <td align="center" style="font-weight: normal; padding: 3px 0;">
                        <span>
                          <b>
                              {{ @$data['order']->orderCurrency->currency }}
                            {{ number_format(($data['order']->grand_total + $data['order']->shipping_charge - ($data['order']->wallet + $data['order']->coupon_amount + $data['order']->gift_card_amount + $data['order']->referral_amount)) * @$data['order']->orderCurrency->con_ratio, 2) }}
                          
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
               <tr>
                  <td style="width:7%"></td>
                  <td>
                     <table style="width:100%;font-size:12px;color:#62778b;border:0" border="0" cellspacing="0"
                        cellpadding="0">
                        <tr>
                           <td align="left" style="font-weight: normal; padding:15px;background:#eee;width:120px">
                              <b style="font-size:16px;color:#000">Delivering to</b><br>


                                        {{ @$data['order']->shipping_name }}<br />
                                        {{ @$data['order']->shipping_address }}<br />
                                        {{ @$data['order']->country->name }}
                                        <br />
                                        {{ @$data['order']->state->name }},
                                        {{ @$data['order']->city->name }}
                                        ({{ @$data['order']->shipping_pincode }}) <br />
                              


                           </td>
                           <td style="width:5px"></td>
                           <td align="center" style="font-weight: normal; padding:0px;width:150px" >
                              <img src="{{asset('allUsers/emailer-img2.png')}}" style="width:100%" >
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td style="width:7%"></td>
               </tr>
               <tr>
                  <td colspan="3" style="height:20px"></td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td>
                     <table style="width:100%;font-size:12px;color:#62778b;border:0" border="0" cellspacing="0"
                        cellpadding="0">
                        <tr>
                           <td align="left" style="font-weight: normal; padding:15px;background:#eee;width:150px">
                              <b style="font-size:16px;color:#000">What's next?</b><br>
                              We will send you a confirmation once your order is prepped and ready to ship.
                           </td>
                           <td style="width:5px"></td>
                           <td align="left" style="font-weight: normal; padding:15px ;width:150px;background:#eee;" >
                              <b style="font-size:16px;color:#000">Need help?</b><br>
                              For queries, or any assistance <a href="">Contact Us</a>
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td style="width:7%"></td>
               </tr>
               <tr>
                  <td colspan="3" style="height:50px"></td>
               </tr>
            </table>
         </td>
      </tr>
   </tbody>
</table>
{{-- 
<table align="center" width="800" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;font-family:'Poppins', sans-serif;background:#fff">
   <tbody>
      <tr>
         <td align="center" bgcolor="#ffffff" colspan="2">
            <img src="{{asset('/allUsers/emailer-img4.png')}}" style="width:100%">
         </td>
      </tr>
      <tr>
         <td align="center" bgcolor="#ffffff" colspan="2">
            <span style="font-size:18px;line-height:21px;color:#333333;font-weight:normal">Hello <b>Rahul,</b>
            </span>
         </td>
      </tr>
      <tr>
         <td height="20" colspan="2"></td>
      </tr>
      <tr>
         <td colspan="2">
            <span
               style="font-size:13px;color:#fff;display:inline-block;width:100%;text-align:center;background:#03a785;padding-top:20px;padding-bottom:30px;font-family: Poppins', sans-serif;">
            <b style="font-size:22px;line-height:28px;">Sit Back And Relax. Your Order Is Confirmed</b><br>
            We know you can't wait to get your hands on it, so we've begun prepping for it right away.<br>
            For safer and contactless experience, you can pay online till the items are out for delivery.<br><br>
            <a href="#" style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:black;display:inline-block;text-align:center;width: auto;padding: 5px 15px;background-color:#fff;text-decoration: none;">
            <b> VIEW ORDER DETAILS</b>
            </a>
            <a href="#" style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:black;display:inline-block;text-align:center;width: auto;padding: 5px 15px;background-color:#fff;text-decoration: none;">
            <b>PAY ONLINE</b>
            </a>			 
            </span>			
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <h3 style="font-size:22px;line-height:28px;color:#000;display:inline-block;width:100%;text-align:center;background:#fff;padding-top:20px;padding-bottom:20px;font-family: Poppins', sans-serif;">Delivery by <span style="background:#fff;color:#03a785">Sun, 18th Feb</span></h3>
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <span
               style="font-size:13px;color:#000;display:inline-block;width:100%;text-align:center;background:#e2f2f1;padding-top:20px;padding-bottom:20px;font-family: Poppins', sans-serif;">
            <b style="font-size:22px;line-height:28px;color:#03a785">Please Share Your Experience</b><br>
            Based on your purchase experience on the littletag app/website,<br> how likely are you to recommend littletag to your friends and family?<br><br>
            <img src="{{asset('/allUsers/confirmation-stepImg.png')}}" style="width:500px">	 			 
            </span>			
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td style="width:7%"></td>
                  <td style="padding-top:20px;text-align:left" >
                     <span style="font-size:17px;line-height:28px;color:#333333;">
                     <b>Quick Details </b> </span>
                  </td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td style="padding-top:10px;padding-bottom:20px" >
                     <span
                        style="font-size:13px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:left">
                     Your Order ID:<br>
                     <b style="font-size:15px;">1259553-7424425-1831103</b>
                     </span>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td style="width:7%"></td>
                  <td align="left" bgcolor="#ffffff" style="width:100px;padding-right:20px">
                     <img src="https://littletags.webkype.co/uploads/products/r006-c.jpg" style="width:100%">			
                  </td>
                  <td align="left" bgcolor="#ffffff" style="font-size:13px">
                     <b style="font-size:14px">TINY COLOUR</b><br>
                     Green Kurta Set<br>
                     Size: <b>S</b> | Qty: <b>1</b><br>
                     ₹739.00<br>
                     Saved <b style="color:#03a785">₹1260.00</b>
                  </td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td colspan="2">
                     <p style="font-size:12px;margin-top:0;margin-bottom:30px">Sold by: MADHAV IMPEX INDIA</p>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td colspan="2">
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td style="width:7%"></td>
                  <td align="left" bgcolor="#ffffff" style="width:100px;padding-right:20px">
                     <img src="https://littletags.webkype.co/uploads/products/r006-c.jpg" style="width:100%">			
                  </td>
                  <td align="left" bgcolor="#ffffff" style="font-size:13px">
                     <b style="font-size:14px">TINY COLOUR</b><br>
                     Green Kurta Set<br>
                     Size: <b>S</b> | Qty: <b>1</b><br>
                     ₹739.00<br>
                     Saved <b style="color:#03a785">₹1260.00</b>
                  </td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td colspan="2">
                     <p style="font-size:12px;margin-top:0;margin-bottom:30px">Sold by: MADHAV IMPEX INDIA</p>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
         <td style="padding-top:20px" colspan="2">
            <table style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td style="width:7%"></td>
                  <td style="text-align:left;padding-bottom:10px" >
                     <span style="font-size:17px;line-height:28px;color:#333333;">
                     <b>Price Breakup </b> </span>
                  </td>
                  <td style="width:7%"></td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td>
                     <table style="width:100%;font-size:13px;color:#333;border:0" border="1" cellspacing="0" cellpadding="0">
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                              style="padding-left:5%">Subtotal:</span></td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;"><span>
                              INR 17,998.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%">Tax:</span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>INR 0.00</span>&nbsp;&nbsp;&nbsp;&nbsp;
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%">Wallet Discount:</span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>- INR 0.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;"><span
                              style="padding-left:5%">Discount Via Coupon:</span></td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>
                              - INR 0.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%">Discount Via Referral:</span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>
                              - INR 0.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%">Discount Via Gift Card:</span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>
                              - INR 0.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%">Shipping:</span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>
                              INR 0.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%">Gift:</span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>
                              INR 0.00 &nbsp;&nbsp;&nbsp;&nbsp;
                              </span>
                           </td>
                        </tr>
                        <tr style="background:#eee">
                           <td align="left" colspan="4" style="font-weight: normal; padding: 3px 0;">
                              <span style="padding-left:5%"><b>Grand Total:</b></span>
                           </td>
                           <td align="right" style="font-weight: normal; padding: 3px 0;">
                              <span>
                              <b> INR 17,998.00 </b>&nbsp;&nbsp;&nbsp;&nbsp;
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
               <tr>
                  <td style="width:7%"></td>
                  <td>
                     <table style="width:100%;font-size:12px;color:#62778b;border:0" border="0" cellspacing="0"
                        cellpadding="0">
                        <tr>
                           <td align="left" style="font-weight: normal; padding:15px;background:#eee;width:120px">
                              <b style="font-size:16px;color:#000">Delivering to</b><br>
                              Priyanka Kaushik<br>
                              Noida, India<br>
                              Noida, Uttar Pradesh (201301)
                           </td>
                           <td style="width:5px"></td>
                           <td align="center" style="font-weight: normal; padding:0px;width:150px" >
                              <img src="{{asset('/allUsers/emailer-img2.png')}}" style="width:100%" >
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td style="width:7%"></td>
               </tr>
               <tr>
                  <td colspan="3" style="height:20px"></td>
               </tr>
               <tr>
                  <td style="width:7%"></td>
                  <td>
                     <table style="width:100%;font-size:12px;color:#62778b;border:0" border="0" cellspacing="0"
                        cellpadding="0">
                        <tr>
                           <td align="left" style="font-weight: normal; padding:15px;background:#eee;width:150px">
                              <b style="font-size:16px;color:#000">What's next?</b><br>
                              We will send you a confirmation once your order is prepped and ready to ship.
                           </td>
                           <td style="width:5px"></td>
                           <td align="left" style="font-weight: normal; padding:15px ;width:150px;background:#eee;" >
                              <b style="font-size:16px;color:#000">Need help?</b><br>
                              For queries, or any assistance <a href="">Contact Us</a>
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td style="width:7%"></td>
               </tr>
               <tr>
                  <td colspan="3" style="height:50px"></td>
               </tr>
            </table>
         </td>
      </tr>
   </tbody>
</table>
--}}
@endsection
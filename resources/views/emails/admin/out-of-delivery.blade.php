@extends('emails.admin.layout.app')
@section('email_content')
<table align="center" width="800" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;font-family:'Poppins', sans-serif; background:#fff">
    <tbody>
        <tr>
            <td align="center" bgcolor="#ffffff" colspan="2">
                <img src="{{asset('allUsers/emailer-img3.png')}}" style="width:100%">
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
                <span style="font-size:13px;color:#fff;display:inline-block;width:100%;text-align:center; background:#03a785;padding-top:20px;padding-bottom:30px; font-family: Poppins', sans-serif; ">
                    <b style="font-size:22px;line-height:28px; margin-bottom:10px">Your Order Item Is Arriving Today</b><br>
                    Our style delivery agent (07669300033) is on his way to deliver your order today.<br>
                    For safer and contactless experience, you can pay online till the items are out for delivery.<br><br>
                    <a href="#" style="font-size: 12px;font-weight: 400;letter-spacing: 2px;color:black;display:inline-block;text-align:left;width: auto;padding: 5px 15px;background-color:#fff;text-decoration: none;">
                        <b>CALL DELIVERY AGENT</b>
                    </a>
                </span>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <table style="width:100%;padding-top:30px" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width:7%"></td>
                        <td>
                            <table style="width:100%;background:#f5f5f5" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td colspan="4" style="height:20px"></td>
                                </tr>
                                <tr>
                                    <td style="width:50px"></td>
                                    <td style="font-size:18px; text-align:center;width:280px"><span style="font-size:13px;color:#a29b9b">Total Payable</span><br>
                                        <b>₹799.00</b>
                                    </td>
                                    <td style="font-size:18px; text-align:center;border-left: 1px solid #ddd;"><span style="font-size:13px;color:#a29b9b">Payment Mode</span><br>
                                        <img src="pay-on-delivery.png" style="width:150px">
                                    </td>
                                    <td style="width:50px"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="height:20px">
                                    {{-- {{ @$data['order']->payment_method }} --}}
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
            <td colspan="2">
                <table style="width:100%" border="0" cellspacing="0" cellpadding="0">

                    <tr>
                        <td style="width:7%"></td>
                        <td style="padding-top:20px;text-align:left">
                            <span style="font-size:17px;line-height:28px;color:#333333;">
                                <b>Package Details </b> </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:7%"></td>
                        <td style="padding-top:10px;padding-bottom:20px">
                            <span style="font-size:13px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:left">
                                Your Tracking ID:<br>
                                <b style="font-size:15px;">{{ $data['order']->id }}</b>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width:100%" border="0" cellspacing="0" cellpadding="0">

                    @foreach ($data['orderItems'] as $order)
                        <tr>
                        <td style="width:7%"></td>
                            <td align="left" bgcolor="#ffffff" style="width:100px;padding-right:20px">
                                <img
                                    src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                                    style="width:100%" />			
                            </td>
                            <td align="left" bgcolor="#ffffff" style="font-size:14px">
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
                        <td>
                            <table style="width:100%;font-size:12px;color:#62778b;border:0" border="0" cellspacing="0" cellpadding="0">

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
                                    <td align="center" style="font-weight: normal; padding:0px;width:150px">
                                        <img src="{{asset('allUsers/emailer-img2.png')}}" style="width:100%">
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
                            <table style="width:100%;font-size:12px;color:#62778b;border:0" border="0" cellspacing="0" cellpadding="0">

                                <tr>

                                    <td align="left" style="font-weight: normal; padding:15px;background:#eee;width:150px">
                                        <b style="font-size:16px;color:#000">What's next?</b><br>
                                        We will send you a confirmation once your order is prepped and ready to ship.
                                    </td>
                                    <td style="width:5px"></td>
                                    <td align="left" style="font-weight: normal; padding:15px ;width:150px;background:#eee;">
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
@endsection
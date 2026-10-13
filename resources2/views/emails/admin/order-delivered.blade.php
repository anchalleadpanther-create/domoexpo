@extends('emails.admin.layout.app')
@section('email_content')
<table align="center" width="800px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;font-family:'Poppins', sans-serif;background:#fff">
    <tbody>

        <tr>
            <td style="width:150px"></td>
            <td>
                <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;font-family:'Poppins', sans-serif;background:#fff">
                    <tbody>
                        <tr>
                            <td align="center" bgcolor="#ffffff" colspan="2">
                                <br><br>
                                <span style="font-size:25px;color:#333333;font-weight:normal;">Tell Us How We Did
                                </span>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" bgcolor="#ffffff" colspan="2">
                                <span style="font-size:14px;color:#333333;font-weight:normal;">
                                    Order #{{ $data['order']->id }}
                                </span><br>
                                <img src="{{asset('allUsers/line-img.png')}}">
                            </td>
                        </tr>
                        <tr>
                            <td height="20" colspan="2"></td>
                        </tr>
                        <tr>
                            <td align="left" bgcolor="#ffffff" colspan="2">
                                <span style="font-size:16px;color:#333333;font-weight:normal;">
                                    Hi,<br>
                                    Please take a minute to rate your experience with the following product
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td height="20" colspan="2"></td>
                        </tr>

                        <tr>
                            <td align="left" bgcolor="#ffffff" colspan="2">
                                <b style="font-size:16px;color:#333333;">
                                    YOUR ORDER </b>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" colspan="2"></td>
                        </tr>
                        <tr>
                            {{-- <td align="left" bgcolor="#ffffff" style="width:100px;padding-right:20px">
                                <img src="https://littletags.webkype.co/uploads/products/r006-c.jpg" style="width:100%">
                            </td>
                            <td align="left" bgcolor="#ffffff" style="font-size:14px">
                                <b style="font-size:16px">TINY COLOUR</b><br>
                                Green Kurta Set<br>
                                Size: S
                            </td>
                        </tr> --}}

                        @foreach ($data['orderItems'] as $order)
                        <tr>
                            <td align="left" bgcolor="#ffffff" style="width:100px;padding-right:20px">
                                <img
                                    src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                                    style="width:100%" />			
                            </td>
                            <td align="left" bgcolor="#ffffff" style="font-size:14px">
                                @if (isset($order->productTypeValueOne))
                                <b style="font-size:14px">{{ $order->productTypeValueOne->type_value }}</b><br>
                                @endif
                                Green Kurta Set<br>
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

                        <tr>
                            <td height="40px" colspan="2"></td>
                        </tr>

                        <tr>
                            <td align="left" bgcolor="#ffffff" colspan="2">
                                <b style="font-size:16px;color:#333333;">
                                    PLEASE SHARE YOUR FEEDBACK WITH US </b><br>
                                Based on your experience with the product above, how likely
                                are you to recommend Littletag to a friend or colleague?
                            </td>
                        </tr>
                        <tr>
                            <td height="40px" colspan="2"></td>
                        </tr>
                        <tr>
                            <td align="left" bgcolor="#ffffff" colspan="2">
                                <img src="{{asset('allUsers/delivered-stepImg.png')}}" style="width:100%">
                            </td>
                        </tr>
                        <tr>
                            <td height="40px" colspan="2"></td>
                        </tr>
                    </tbody>
                </table>

            </td>
            <td style="width:150px"></td>

        </tr>
    </tbody>
</table>
@endsection
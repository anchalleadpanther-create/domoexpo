<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">

<div style="background:#eee;padding:0">

  <table align="center" width="700" border="0" cellspacing="0" cellpadding="0" style="background:#fff">
    <tbody>
      <tr>
        <td style="padding:30px" align="center" nowrap="" bgcolor="#ffffff">
          <a href="http://tfe.webkype.net/">
            <img alt="LT" border="0" width="100" src="http://tfe.webkype.net/assets/images/logo.png">
          </a>
        </td>
      </tr>

      <tr>
        <td align="center">
          <table width="670">
            <tbody>
              <tr>
                <td style="border-top:2px solid #1a1a1a" align="center" nowrap="" bgcolor="#ffffff"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td nowrap="" align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">JUST IN</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Designers </a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Womenswear</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Menswear</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Kidswear</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Wedding </a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href=""
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Collections </a>
                </td>

              </tr>
            </tbody>
          </table>
        </td>
      </tr>

    </tbody>
  </table>
  <table align="center" width="700" border="0" cellspacing="0" cellpadding="0"
    style="padding-top:35px;font-family:'Poppins', sans-serif;background:#fff">
    <tbody>
      <tr>
        <td align="center" bgcolor="#ffffff">
          <span style="font-size:23px;line-height:18px;color:#333333;font-weight:normal">Thank you for your
            purchase!</span>
        </td>
      </tr>

      <tr>
        <td height="20"></td>
      </tr>

      <tr>
        <td>
          <span
            style="font-size:16px;line-height:28px;color:#e589a2;display:inline-block;width:100%;text-align:center">{{ $data['status'] }}</span>
        </td>
      </tr>
      @isset($data['trackingUrl'])
        <tr>
          <td style="padding:35px 0px 35px 0px" align="center">
            <a href="{{ $data['trackingUrl'] }}"
              style="display:inline-block;height:35px;line-height:36px;width:250px;font-size:13px;background-color:#754b63;color:#fff;font-family:'Poppins', sans-serif;text-decoration:none;letter-spacing:2px"
              target="_blank" data-saferedirecturl="">Track order</a>
          </td>
        </tr>
      @endisset
      <tr>
        <td style="padding:15px 50px 0">
          <span
            style="font-size:16px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center;">Hi
            there,
            Welcome to The Fashion Edit India. We'll keep you updated on all our fresh launches, unmissable discounts,
            weekly blogs and style updates!</span>
        </td>
      </tr>

      <tr>


        <td>

          <table border="0" cellspacing="0" cellpadding="0"
            style="padding-top:35px;width:100%;font-family:'Poppins', sans-serif;background:#fff">
            <tbody>
              <tr>
                <td style="width:50px"></td>
                <td>
                  <table border="1" cellspacing="0" cellpadding="0"
                    style="width:100%;font-family:'Poppins', sans-serif;background:#fff;border:0; border-color:#ddd;font-size:13px;text-align:center">
                    <thead>
                      <tr>
                        <th style="font-weight:normal">Image</th>
                        <th style="font-weight:normal">Product Name</th>
                        <th style="font-weight:normal">Price</th>
                        <th style="font-weight:normal">Qty</th>
                        <th style="font-weight:normal">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data['orderItems'] as $order)
                        <tr>
                          <td style="padding: 10px 0;"><a href="#"><img
                                src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                                alt="{{ $order->name }}" title="{{ $order->name }}" width="80"></a></td>
                          <td>
                            <a href="javascript:;" style="color:#222">
                              {{ $order->name }}<br />
                              @isset($order->custom_name)
                                <span class="mt-2"><i>Custom Name: {{ $order->custom_name }}</i></span>
                              @endisset
                            </a>
                            <div>
                              @if (isset($order->productTypeValueOne))
                                Color: {{ $order->productTypeValueOne->type_value }}<br>
                                @if (isset($order->productTypeValueTwo))
                                  Size: {{ $order->productTypeValueTwo->type_value }}<br>
                                @endif
                              @endif
                            </div>
                          </td>
                          <td>{{ @$data['order']->orderCurrency->currency }}
                            {{ number_format($order->price_unit * @$data['order']->orderCurrency->con_ratio, 2) }}
                          </td>
                          <td>{{ $order->quantity }}</td>
                          <td>{{ @$data['order']->orderCurrency->currency }}
                            {{ number_format($order->orderItemDetail->grand_total * @$data['order']->orderCurrency->con_ratio, 2) }}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </td>
                <td style="width:50px"></td>

              </tr>

              <tr>
                <td style="width:50px"></td>
                <td>
                  <table border="1" cellspacing="0" cellpadding="0"
                    style="padding-top:30px;width:100%;font-family:'Poppins', sans-serif;background:#fff;border:0; border-color:#ddd;font-size:13px;text-align:center">
                    <thead>
                      <tr>
                        <th style="font-weight:normal;padding:5px 0;background:#eee;width:50%">Shipping Address</th>
                        <th style="font-weight:normal;padding:5px 0;background:#eee;width:50%">Billing Address</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="padding:5px 0">
                          {{ @$data['order']->shipping_name }}<br />
                          {{ @$data['order']->shipping_address }}<br />
                          {{ @$data['order']->country->name }}
                          <br />
                          {{ @$data['order']->state->name }},
                          {{ @$data['order']->city->name }}
                          ({{ @$data['order']->shipping_pincode }}) <br />
                        </td>
                        <td style="padding:5px 0">
                          {{ @$data['order']->shipping_name }}<br />
                          {{ @$data['order']->shipping_address }}<br />
                          {{ @$data['order']->country->name }}
                          <br />
                          {{ @$data['order']->state->name }},
                          {{ @$data['order']->city->name }}
                          ({{ @$data['order']->shipping_pincode }}) <br />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td style="width:50px"></td>

              </tr>

              <tr>
                <td style="width:50px"></td>
                <td>
                  <table border="1" cellspacing="0" cellpadding="0"
                    style="padding-top:30px;width:100%;font-family:'Poppins', sans-serif;background:#fff;border:0; border-color:#ddd;font-size:13px;text-align:center">
                    <thead>
                      <tr>
                        <th style="font-weight:normal;padding:5px 0;background:#eee;width:50%">Shipping Method</th>
                        <th style="font-weight:normal;padding:5px 0;background:#eee;width:50%">Payment Method</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="padding:5px 0">Flat Rate - Fixeds<br>Delivery Date: N/A</td>
                        <td style="padding:5px 0">{{ $data['order']->payment_method }}</td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td style="width:50px"></td>

              </tr>
            </tbody>
          </table>

        </td>
      </tr>
    </tbody>
  </table>

  <table align="center" width="700" border="0" cellspacing="0" cellpadding="0"
    style="padding-top:30px;background-color:#ffffff;font-family:'Poppins', sans-serif;">
    <tbody>
      <tr>
        <td style="padding:35px 0px 35px 0px" align="center">
          <a href="{{ route('home') }}"
            style="display:inline-block;height:35px;line-height:36px;width:250px;font-size:13px;background-color:#754b63;color:#fff;font-family:'Poppins', sans-serif;text-decoration:none;letter-spacing:2px"
            target="_blank" data-saferedirecturl="">Go To Account</a>
        </td>
      </tr>

      <tr>
        <td>
          <span
            style="font-size:19px;display:inline-block;line-height:26px;color:#333333;width:100%;text-align:center;font-family:'Poppins', sans-serif">Thank
            you,</span>
        </td>
      </tr>
      <tr>
        <td>
          <span
            style="font-size:19px;display:inline-block;line-height:26px;color:#333333;width:100%;text-align:center;font-family:'Poppins', sans-serif">The
            Fashion Edit India</span>
        </td>
      </tr>
      <tr>
        <td align="center" style="padding:30px">
          <span style="font:normal 16px 'Poppins', sans-serif;color:#444444;">FOLLOW US FOR FASHION &amp; DESIGN
            UPDATES &amp; SHARE YOURS WITH US AT</span>
        </td>
      </tr>
     {{-- <tr>
        <td align="center">
          <a href="https://www.facebook.com/fashioneditindia"> <img border="0" alt=""
              src="https://fashioneditindia.com/allUsers/customer/images/fb-icon.jpg" style="width:30px"></a>
          <a href="https://instagram.com/fashioneditindia?igshid=NDRkN2NkYzU="> <img border="0" alt=""
              src="https://fashioneditindia.com/allUsers/customer/images/insta-icon.jpg" style="width:30px"></a>
          <a href="https://pin.it/4ehklaH"> <img border="0" alt=""
              src="https://fashioneditindia.com/allUsers/customer/images/pin-icon.jpg" style="width:30px"></a>
        </td>
      </tr> --}}

      <tr>
        <td align="center" style="text-align:right;font-size:10px;color:#000000;padding:5px 10px">*T &amp; C Apply
        </td>
      </tr>

    {{--  <tr>
        <td align="center">

          <div
            style="font-family:'Poppins', sans-serif;color:#fff;background:#272727;font-weight:400;display:block;padding-top:15px;padding-bottom:15px">
            <h2
              style="font-size:12px;letter-spacing:.7px;font-weight:400;font-family: 'Poppins', sans-serif;color:#ffffff;text-align:center;">
              Together, we can make a difference in the lives of women by supporting & empowering them.
            </h2>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <table align="center" width="700" border="0" cellspacing="0" cellpadding="0"
            style="background-color:#272727;font-family:'Poppins', sans-serif;color:#fff">
            <tbody>
              <tr>
                <td style="width:40px"></td>
                <td>
                  <h5 style="margin-bottom:0;font-weight: 500;letter-spacing: .5;">INFORMATIONS</h5>
                  <ul style="padding:0;margin-top:5px">
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Buyer Login</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Buyer Signup</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Forgot password</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Change Password</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Buyer Dashboard</a>
                    </li>
                  </ul>
                </td>
                <td>
                  <h5 style="margin-bottom:0;font-weight: 500;letter-spacing: .5;">INFORMATIONS</h5>
                  <ul style="padding:0;margin-top:5px">
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        About us</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Contact us</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        FAQ</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Blogs All</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Blog Details</a>
                    </li>
                  </ul>
                </td>
                <td>
                  <h5 style="margin-bottom:0;font-weight: 500;letter-spacing: .5;">INFORMATIONS</h5>
                  <ul style="padding:0;margin-top:5px">
                    <li style="list-style: none;margin;left:0">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Coming Soon Page</a>
                    </li>
                    <li style="list-style: none;margin;left:0">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Statis Page</a>
                    </li>
                    <li style="list-style: none;margin;left:0">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Brand Listing</a>
                    </li>
                    <li style="list-style: none;margin;left:0">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">
                        Empty Page</a>
                    </li>
                    <li style="list-style: none;margin;left:0">
                      <a href="" style="font-size: 12px;color: #fff; text-decoration: none;">&nbsp;
                      </a>
                    </li>
                  </ul>
                </td>

              </tr>--}}
            </tbody>
          </table>





        </td>
      </tr>
    </tbody>
  </table>
</div>

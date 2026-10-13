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
          <a href="{{ route('home') }}">
            <img alt="FEI" border="0" width="150"
              src="{{ asset('allUsers/customer/images/logo-new.png') }}">
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
                  <a href="https://fashioneditindia.com/products/search?type=new-this-month"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">New In</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/page/designers"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Designers </a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/weddings"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Wedding</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Collections</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/women"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Women</a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/men"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Men </a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/kids"
                    style="text-decoration:none;font:normal 11px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Kids </a>
                </td>
                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/jewellery"
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Jewellery </a>
                </td>

                <td align="center" style="white-space:nowrap;padding:10px 5px" nowrap="">
                  <a href="https://fashioneditindia.com/beauty"
                    style="text-decoration:none;font:normal 12px/20px 'Poppins', sans-serif;color:#000000;text-transform: uppercase;"
                    target="_blank" data-saferedirecturl="">Beauty </a>
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
          <span style="font-size:13px;line-height:18px;color:#333333;font-weight:normal">Membership Upgraded!</span>
        </td>
      </tr>

      <tr>
        <td height="20"></td>
      </tr>

      <tr>
        <td>
          <span
            style="font-size:12px;line-height:28px;color:black;display:inline-block;width:100%;text-align:center;font-weight:600;">
            Hello {{ $data['first_name'] }},
          </span>
        </td>
      </tr>
      <tr>
        <td style="padding:13px 50px 0">
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
            <b>Thank you for choosing Fashion Edit India & being a part of the #FEICommunity !</b> <br />
            We take this opportunity to welcome you to our growing community.
            You can now get the first look at our latest launches, irresistible discounts
            along with special curations from our in-house stylists.
          </span>
        </td>
      </tr>
      <tr>
        <td style="padding-top:20px">
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
            Congratulations, Your membership has been upgraded to <b>FEI {{ $data['newTier'] }} Card.</b> <br />
          </span>
        </td>
      </tr>
      <tr>
        <td style="padding-top:20px">
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center;padding-bottom:7px">
            Membership Number
          </span>
        </td>
      </tr>
      <tr>
        <td style="width:100%;text-align:center">
          <span
            style="font-size:12px;font-weight:bold;letter-spacing:5px;color:#333333;display:inline-block;text-align:center;width:320px;height:34px;background-color:{{ $data['newTierColor'] }};line-height:2.8">
            {{ $data['membershipId'][0] }}-{{ $data['membershipId'][1] }}-{{ $data['membershipId'][2] }}-{{ $data['membershipId'][3] }}</span>
        </td>
      </tr>

      {{-- <tr>
        <td style="padding-top:20px">
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
            Your password is:123456
          </span>
        </td>
      </tr> --}}
      <tr>
        <td>
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
            To reset the password,
            <a href="javascript:;" style="color:#333333" target="_blank" data-saferedirecturl="">click here.</a>
          </span>
        </td>
      </tr>
      <tr>
        <td style="padding-bottom:30px">
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
            To know more about the benefits of our loyalty program, <a href="javascript:;" style="color:#333333"
              target="_blank" data-saferedirecturl="">click here.</a>
          </span>
        </td>
      </tr>
      <tr>
        <td align="center" style="padding:0 50px">
          <a href="" style="border:0;text-decoration:none" target="_blank" data-saferedirecturl=""><img
              src="{{ asset('allUsers/customer/images/tfe-email-img.jpg') }}" style="display:block;width:100%;"
              alt=""></a>
        </td>
      </tr>

      <tr>
        <td>
          <span
            style="font-size:12px;line-height:28px;color:#333333;display:inline-block;width:100%;text-align:center">
            Happy Shopping !!
          </span>
        </td>
      </tr>

    </tbody>
  </table>

  <table align="center" width="700" border="0" cellspacing="0" cellpadding="0"
    style="background-color:#ffffff;font-family:'Poppins', sans-serif;">
    <tbody>
      <tr>
        <td style="padding:35px 0px 0px 0px" align="center">
          <a href="{{ route('home') }}"
            style="display:inline-block;height:35px;line-height:36px;width:150px;font-size:12px;background-color:#e55c5c;color:#fff;font-family:'Poppins', sans-serif;text-decoration:none;letter-spacing:2px"
            target="_blank" data-saferedirecturl="">SHOP NOW</a>
        </td>
      </tr>


      <tr>
        <td align="center" style="padding:30px">
          <span style="font:normal 12px 'Poppins', sans-serif;color:#444444;">
            Follow us for all things fashion & join our online community.
          </span>
        </td>
      </tr>
      <tr>
        <td align="center">
          <a href="https://www.facebook.com/fashioneditindia"> <img border="0" alt=""
              src="{{ asset('allUsers/customer/images/fb-icon.png') }}" style="width:30px"></a>
          <a href="https://instagram.com/fashioneditindia?igshid=NDRkN2NkYzU="> <img border="0" alt=""
              src="{{ asset('allUsers/customer/images/twitter.png') }}" style="width:30px"></a>
          <a href="https://www.instagram.com/fashioneditindia"> <img border="0" alt=""
              src="{{ asset('allUsers/customer/images/insta-icon.png') }}" style="width:30px"></a>
        </td>
      </tr>

      <tr>
        <td align="center" style="text-align:right;font-size:10px;color:#000000;padding:5px 10px">*T &amp; C Apply
        </td>
      </tr>

      <tr>
        <td align="center">

          <div
            style="font-family:'Poppins', sans-serif;color:#fff;background:#272727;font-weight:400;display:block;padding-top:15px;padding-bottom:15px">
            <h2
              style="font-size:12px;letter-spacing:.7px;font-weight:400;font-family: 'Poppins', sans-serif;color:#ffffff;text-align: center;">
              Together, we can make a difference in the lives of women by supporting & empowering them.</h2>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <table align="center" width="700" border="0" cellspacing="0" cellpadding="0"
            style="background-color:#272727;font-family:'Poppins', sans-serif;color:#fff;font-size: 11px;">
            <tbody>
              <tr>
                <td style="width:40px"></td>
                <td>
                  <h5 style="margin-bottom:0;font-weight: 500;letter-spacing: .5;">ABOUT US</h5>
                  <ul style="padding:0;margin-top:5px">
                    <li style="list-style: none;">
                      <a href="https://fashioneditindia.com/pages/about-us"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        About FEI</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="https://fashioneditindia.com/faq"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        FAQ</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="https://fashioneditindia.com/page/designers"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        Designers</a>
                    </li>
                  </ul>
                </td>
                <td>
                  <h5 style="margin-bottom:0;font-weight: 500;letter-spacing: .5;">POLICIES</h5>
                  <ul style="padding:0;margin-top:5px">
                    <li style="list-style: none;">
                      <a href="https://fashioneditindia.com/program/loyalty"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        Loyalty Program</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="https://fashioneditindia.com/pages/shipping-delivery"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        Shipping Policy</a>
                    </li>
                    <li style="list-style: none;">
                      <a href="https://fashioneditindia.com/pages/refund-policy"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        Refund Policy</a>
                    </li>

                  </ul>
                </td>
                <td>
                  <h5 style="margin-bottom:0;font-weight: 500;letter-spacing: .5;">CUSTOMER HELP</h5>
                  <ul style="padding:0;margin-top:5px">
                    <li style="list-style: none;margin;left:0">
                      <a href="https://fashioneditindia.com/pages/privacy-policy"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        Privacy Policy</a>
                    </li>
                    <li style="list-style: none;margin;left:0">
                      <a href="https://fashioneditindia.com/pages/terms-conditions"
                        style="font-size: 11px;color: #fff; text-decoration: none;">
                        Terms & Conditions</a>
                    </li>
                  </ul>
                </td>

              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

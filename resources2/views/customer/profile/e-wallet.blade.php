 <div id="myeWallet" class="tab-pane fade">
   <h3>My e-Wallet </h3>
   <p>From your e-wallet section, you can easily check &amp; view your wallet history.</p>
   <div class="row user-profile mt-4">
     <div class="col-12 col-lg-8">
       <div class="profile-img">
         <div class="img"><img src="{{ asset('allUsers/woman-png.png') }}" alt="profile" width="65" /></div>
         <div class="detail ms-3">
           <h5 class="mb-1">{{ Auth::guard('buyer')->user()->fullName }}</h5>
           <p>Active since: <strong>{{ Auth::guard('buyer')->user()->created_at->format('d M, Y') }}</strong></p>
         </div>
         <div class="lbl ">THE {{ Auth::guard('buyer')->user()->membership_type }}</div>
       </div>
     </div>
     <div class="col-12 col-lg-4">
       <div class="profile-img" style=" background:#f9cad7;text-align: right;  width: 100%; display: inline-block;">
         <div class="detail ms-3">
           <h5 class="mb-1">E-Wallet Balance</h5>
           <p><strong>{{ Auth::guard('buyer')->user()->wallet }}</strong></p>
           <p>(Points)</p>
         </div>
       </div>
     </div>

   </div>
   <div class="table-responsive order-table mt-4">
     <table class="table  table-hover align-middle text-center mb-0">
       <thead class="alt-font">
         <tr>
           <th>Image</th>
           <th style="text-align:left">Transaction</th>
           <th style="text-align:left">Remark</th>
           <th>Type</th>
           <th>Amount</th>
           {{-- <th>Balance</th> --}}

         </tr>
       </thead>
       <tbody>
         @foreach (Auth::guard('buyer')->user()->walletHistory as $history)
           <tr>
             <td>
               <img src="{{ asset('allUsers/customer/images/logo.png') }}" style="width:50px">
             </td>
             <td style="text-align:left">
               <p> {{ $history->title }}</p>
               <p>{{ $history->created_at->format('d M, Y : h:i A') }} </p>
               @if (isset($history->order_id))
                 <p>Order No: {{ $history->order_id }}</p>
               @endif
             </td>
             <td style="text-align:left">
               <p>{{ $history->remarks }}</p>
             </td>

             <td class="text-danger">{{ $history->type }}</td>
             <td>
               @if ($history->type == 'CREDIT')
                 <span class="text-success">{{ getCurrentCurrency()->currency }} +
                   {{ $history->amount * getCurrentCurrency()->con_ratio }}</span>
               @else
                 <span class="text-danger">{{ getCurrentCurrency()->currency }} -
                   {{ $history->amount * getCurrentCurrency()->con_ratio }}</span>
               @endif
             </td>
             {{-- <td>{{ getCurrentCurrency()->currency }} {{ $history->balance * getCurrentCurrency()->con_ratio }}</td> --}}
           </tr>
         @endforeach
         {{-- <tr>
           <td>
             <img src="assets/images/products/product-1-1.jpg" style="width:50px">
           </td>
           <td style="text-align:left">
             <p> First Purchase</p>
             <p>17 July 2022 : 10: 30 AM </p>
             <p>Order No: <a href="" style=" color: #6060ff;">OD00001</a></p>

           </td>
           <td style="text-align:left">

             <p>10% Cashback</p>
           </td>

           <td class="text-success">CREDIT</td>
           <td>+15000 </td>
           <td>25000</td>
         </tr>
         <tr>
           <td>
             <img src="assets/images/products/product-1-1.jpg" style="width:50px">
           </td>
           <td style="text-align:left">
             <p> Signup With FEI</p>
             <p> 12 July 2022 : 10: 30 AM </p>

           </td>
           <td style="text-align:left">

             <p> Registration Credits </p>
           </td>
           <td class="text-success">CREDIT</td>
           <td>+1000</td>
           <td>1000</td>
         </tr> --}}
       </tbody>
     </table>
   </div>
 </div>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Receipt</title>

    <style>
        @page {
            size: A4;
            margin: 12px;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.3;
            color: #333;
            padding: 0;
            font-size: 12px;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
            border: 1px solid #ddd;
            page-break-inside: avoid;
        }

        .header {
            background: #000;
            color: #fff;
            padding: 12px;
            text-align: center;
        }

        .header img {
            width: 80px;
            height: 80px;
            margin-bottom: 5px;
        }

        .header h2 {
            margin: 5px 0 0;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .content {
            padding: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            page-break-inside: avoid;
        }

        th, td {
            padding: 8px 10px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 12px;
        }

        th {
            background: #f5f5f5;
            font-weight: bold;
            width: 150px;
        }

        .amount {
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }

        .status {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
        }

        .status-success {
            background: #d4edda;
            color: #155724;
        }

        .status-warning {
            background: #fff3cd;
            color: #856404;
        }

        .company-box {
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            background: #f9f9f9;
            border-radius: 4px;
            font-size: 11px;
            page-break-inside: avoid;
        }

        .company-box p {
            margin: 3px 0;
        }

        .footer {
            padding: 10px;
            text-align: center;
            background: #f9f9f9;
            font-size: 11px;
            color: #666;
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <img src="{{asset('allUsers/Digital-Expo-ltd-v1.png')}}" alt="Logo">
        <h2>CASH INVOICE</h2>
    </div>

    <div class="content">
        <table>
            <tr>
                <th>Invoice Number</th>
                <td>INV{{ 1000 + $history->id ?? 'N/A' }}</td>
            </tr>

            <tr>
                <th>Name</th>
                <td>
                    @if($history->user_type === 'buyer')
                        {{ $history->getBuyer->first_name ?? '' }}
                        {{ $history->getBuyer->last_name ?? '' }}
                        (Buyer)
                    @else
                        {{ $history->getSeller->biz_name ?? '' }} (Seller)
                    @endif
                </td>
            </tr>

            <tr>
                <th>Email</th>
                <td>
                    @if($history->user_type === 'buyer')
                        {{ $history->getBuyer->email ?? 'N/A' }}
                    @else
                        {{ $history->getSeller->biz_email ?? 'N/A' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th>Transaction</th>
                <td>
                    {{ $history->transaction_for === 'Membership'
                            ? 'Subscription Membership (domo.expo.cy)'
                            : ($history->transaction_for == 'Add Supplier Category'
                                ? 'Extra Supplier Category ' . '('.($history->category->category_name ?? '').')'
                                : '')
                        }}
                </td>
            </tr>
            
           
             
            <tr>
                <th> Amount</th>
                <td><span class="amount">EURO {{ $history->amount ?? '0' }}</span></td>
            </tr>
          
           
            <tr>
                <th>Coupon {{ $history->coupon_code ?? '' }}</th>
                <td>
               {{ $history->coupon_type == 'Discount'  ? $history->coupon_amt   : (!empty($history->coupon_code)  ? $history->coupon_value . ' Months Addon'  : 'NA') }} </td>
            </tr>
            
             <tr>
                <th>VAT ({{ $history->vat_value ?? '' }}{{$history->vat_type == 'Percentage' ? '%' : ''}}) </th>
                <td>
                    {{  $history->vat_amt ?? 0.00 }} 
                </td>
            </tr>
            

            <tr>
                <th>Final Amount</th>
                <td><span class="amount">EURO {{ ($history->amount + $history->vat_amt) - ($history->coupon_amt ?? 0) ?? '0' }}</span></td>
            </tr>
            
          
            

            <tr>
                <th>Date</th>
                <td>{{ $history->created_at?->format('d-m-Y') ?? 'N/A' }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <span class="status {{ $history->payment_status === 'success' ? 'status-success' : 'status-warning' }}">
                        {{ ucfirst($history->payment_status ?? 'Pending') }}
                    </span>
                </td>
            </tr>
        </table>

        <div class="company-box">
            <p><strong>Digital Expo Ltd.</strong></p>
            <p><strong>Address:</strong> Ψηλορείτου 15Α-17Γ και, Σουδας 16Β-18Γ, Λεμεσός 3048</p>
            <p><strong>Telephone:</strong> +357 25336613</p>
            <p><strong>Email:</strong> i@expo.cy</p>
            <p><strong>Company Reg. No:</strong> ΗΕ 472674</p>
            <p><strong>Vat number:</strong> 60160016C</p>
        </div>
    </div>

    <div class="footer">
        Generated: {{ now()->format('d M Y, H:i') }}
    </div>

</div>
</body>
</html>

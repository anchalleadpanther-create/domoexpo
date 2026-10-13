<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Update - DomoExpo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            font-size: 12px;
            color: #888888;
        }
        .status-approved {
            color: green;
            font-weight: bold;
        }
        .status-disapproved {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <!-- Header -->
        <div class="header">
            <img src="{{ url('/') }}/allUsers/frontend/img/logo-photo.png" alt="DomoExpo Logo">
        </div>

        <!-- Content -->
        <div class="content">
            <h1>Account Status Update</h1>

            <p>Hi <strong>{{ $data['supplier']->biz_name }}</strong>,</p>

            <p>
                Your seller account status has been updated to:
                @if($data['supplier']->status == 1 &&  $data['supplier']->supplier_status == 1)
                    <span class="status-approved">Approved</span>
                @else()
                    <span class="status-disapproved">Disapproved</span>
                @endif
            </p>

            @if($data['supplier']->status === 1 &&  $data['supplier']->supplier_status == 1)
                <p>Congratulations! Your seller account has been approved. You now have full access to all seller features on DomoExpo.</p>
                <p>You can log in and start managing your products and business.</p>
            @else
                <p>Unfortunately, your seller account has been disapproved at this moment.</p>
                <p>Reason : {{$data['supplier']->supplier_status_reason ?? '' }}</p>
                <p>Comment : {{$data['supplier']->supplier_status_comment ?? ''}}</p>
            @endif

            <p>
                <strong>Go to Login Page:</strong> 
                <a href="{{ url('/') }}/seller/seller-login" target="_blank">Click here</a>
            </p>

            <p>If you need further assistance, feel free to contact our support team at <strong>info@domo.expo.cy</strong>.</p>

            <p>Regards,<br>DomoExpo Team</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} DomoExpo. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

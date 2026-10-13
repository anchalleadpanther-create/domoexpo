<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Activated - DomoExpo</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{url('/')}}/allUsers/frontend/img/logo-photo.png" alt="DomoExpo Logo" height="200">
        </div>

        <div class="content">
            <h1>Your Subscription is Now Active!</h1>

            <p>Hi <strong>{{ $data['user']->first_name ?? '' }} {{ $data['user']->last_name ?? '' }}</strong>,</p>

            <p>Thank you for purchasing a subscription on <strong>DomoExpo</strong>. Your plan has been successfully activated, and you now have full access to all premium features on our platform.</p>

            <h3>Your Subscription Details:</h3>
            <ul>
                <li><strong>Order Number:</strong> {{ $data['purchaseHistory']->orderNumber ?? '' }}</li>
                <li><strong>Plan Name:</strong> Platform Fee</li>
                <li><strong>Start Date:</strong> {{ $data['purchaseHistory']->membership_start_date ?? '' }}</li>
                <li><strong>End Date:</strong> {{ $data['purchaseHistory']->membership_expiry_date ?? '' }}</li>
                <li><strong>Amount Paid:</strong> Euro {{ $data['purchaseHistory']->amount ?? '' }} </li>
            </ul>

            <p>You can now log in and start exploring all the advanced tools and features available for your account.</p>

            <p><strong>Go to your Dashboard:</strong>  
                <a href="{{ url('/') }}/buyer/login" target="_blank">Click Here</a>
            </p>

            <p>If you need any help or have questions about your subscription, feel free to reach out to us at <strong>info@domo.expo.cy</strong>.</p>

            <p>Thank you for choosing DomoExpo. We are excited to support your business growth with our premium tools.</p>

            <p>Best regards,<br>DomoExpo Team</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} DomoExpo. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Purchasync</title>
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
            <img src="{{url('/')}}/allUsers/frontend/img/logo-photo.png" alt="purchasync Logo" height="200">
        </div>
        <div class="content">
            <h1>Welcome to DomoExpo!</h1>
            <p>Hi <strong>{{ $data['buyer']->first_name ?? '' }} {{ $data['buyer']->last_name ?? '' }}</strong>,</p>
            <p>Thank you for signing up as a <strong>{{$data['buyer']->account_type ?? 'buyer'}}</strong> on our platform. We are excited to have you join our community. Here are your signup details:</p>
            <ul>
                <li><strong>Name:</strong> {{ $data['buyer']->first_name }} {{ $data['buyer']->last_name }}</li>
                <li><strong>Email:</strong> {{ $data['buyer']->email }}</li>
                <li><strong>Signup Date:</strong> {{ $data['buyer']->created_at->format('M d, Y') }}</li>
                <li><strong>Go to Login page :</strong> <a href="{{ url('/') }}/buyer/login" target="_blank"> click here</a></li>
            </ul>
            <p>If you have any questions or need assistance, feel free to contact our support team at info@domo.expo.cy</p>
            <p>We look forward to helping you grow your business!</p>
            <p>Best regards,</p>
            <p>DomoExpo Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} DomoExpo. All rights reserved.</p>
            <p>DomoExpo</p>
        </div>
    </div>
</body>
</html>

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
            <img src="https://purchasync.com/allUsers/frontend/img/logo-photo.png" alt="purchasync Logo">
        </div>
        <div class="content">
            <h1>Reset Your Password</h1>
            <p>Hi {{ $data['seller']->biz_name }},</p>
            <p>Click on the link below to reset your password </p>
            <ul>
                <li><strong>Reset Your Password:</strong> <a href="{{ route('seller.password.reset', ['token' => $data['token'], 'email' => $data['email']]) }}" target="_blank"> click here</a></li>
            </ul>
            <p>If you have any questions or need assistance, feel free to contact our support team at support@purchasync.com.</p>
            <p>We look forward to helping you grow your business!</p>
            <p>Best regards,</p>
            <p>Purchasync Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Purchasync. All rights reserved.</p>
            <p>Purchasync</p>
        </div>
    </div>
</body>
</html>

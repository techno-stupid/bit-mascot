<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            margin-top: 20px;
            color: #666;
        }
        .otp-code {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>OTP Verification</h1>
    <p>To authenticate please use the following One Time Password(OTP): <b style="font-size: 14px;color: #007bff">{{ $user->otp }}</b></p>

    <p>Don't share this OTP with anyone.We hope to see you again soon.</p>
    <p>Regards,<p>
    <p>Team {{ config('app.name') }}</p>


    <div class="footer">
        <p>If you didn't request this OTP, you can ignore this email.</p>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Password (OTP)</title>
</head>
<body>
    <p>Dear User,</p>

    <p>Your One-Time Password (OTP) is: <strong>{{ $otp['otpCode'] }}</strong></p>
    <p>Your One-Time Password (OTP) expired on: <strong>{{ $otp['otpExpire'] }}</strong></p>

    <p>Please use this OTP to verify your identity.</p>

    <p>Thank you,<br>
    Admin</p>
</body>
</html>
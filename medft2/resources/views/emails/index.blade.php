<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your View</title>
</head>
<body>
    <p>This is your view content.</p>

    {{-- Use the @php directive to execute PHP code --}}
    @php
        // Call the generateOTP method
        $emailAddress = 'user@example.com';
        $otpGenerator = new \App\OTPGenerator();
        $generatedOTP = $otpGenerator->generateOTP($emailAddress);

        // Now you can use $generatedOTP in your view
        echo "<p>Generated OTP: $generatedOTP</p>";
    @endphp
</body>
</html>
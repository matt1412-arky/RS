<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>OTP Email</title>
</head>

<body>
    <div>
        {{-- <h2>Kode OTP Anda</h2> --}}
        <p>Berikut adalah kode OTP Anda:</p>
        <h1>{{ $otp }}</h1>
        <p>Kode ini berlaku selama 10 menit.</p>
    </div>
</body>

</html>

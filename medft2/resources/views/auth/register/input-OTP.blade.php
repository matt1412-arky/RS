<div class="card card-plain d-flex justify-content-center">
    <div class="card-header pb-0 text-center">
        <h4 class="font-weight-bolder">Verifikasi Email</h4>
        <button type="button" class="btn btn-link fs-4 position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <p class="mb-0">Masukkan kode OTP yang telah dikirimkan ke email Anda</p>
    </div>
    <div class="card-body">
        <form role="form">
            <div class="mb-3">
                <input type="text" class="form-control form-control-lg" placeholder="Masukkan kode OTP"
                    aria-label="OTP" name="OTP">
                <label id="otpError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="text-center" id="showTimer">
                <p class="mb-0">Kirim ulang kode OTP dalam
                <p id="timer"></p>
                </p>
            </div>
            <div class="text-center" id="resendOTP" style="display: none;">
                <p class="mb-0">
                    <a href="#" onclick="resendOTP()">
                        <i id="refreshIcon" class="fas fa-sync-alt"></i> Kirim ulang kode OTP
                    </a>
                </p>
            </div>
            <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                onclick="openModalForgetPasswordNewPassword()">Konfirmasi OTP</button>
        </form>
    </div>
</div>

<style>
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #refreshIcon {
        animation: spin 1s linear infinite;
    }
</style>

<script>
    function startTimer(duration, display) {
        let timer = duration,
            minutes, seconds;

        let intervalId = setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
                clearInterval(intervalId);
                document.getElementById("showTimer").style.display = "none";
                document.getElementById("resendOTP").style.display = "block";
            }
        }, 1000);
    }

    let countdownTime = 20; // Countdown untuk menit ke-3
    let display = document.getElementById("timer");
    startTimer(countdownTime, display);

    function resendOTP() {
        // Lakukan pengiriman ulang OTP di sini
        localStorage.getItem('userEmail');
        // console.log(localStorage.getItem('userEmail'));

        // Mengirim ulang OTP
        $.ajax({
            url: 'http://127.0.0.1:8000/api/resend-otp ', // Ganti dengan URL endpoint untuk mengirim OTP
            type: 'POST',
            data: {
                email: localStorage.getItem('userEmail'),

            },
            success: function(resendOTP) {
                // Tindakan lanjutan jika diperlukan setelah mengirim OTP
                console.log(resendOTP);
                // Simpan tempOTP dan otpExpiration ke localStorage setelah berhasil mengirim OTP
                localStorage.setItem('tempOTP', resendOTP.otp.tempOTP);
                localStorage.setItem('otpExpiration', resendOTP.otp.otpExpiration);

                console.log(localStorage.getItem('tempOTP'));
                console.log(resendOTP.otp.otpExpiration);
                // Mengatur ulang timer
                countdownTime = 20;
                startTimer(countdownTime, display);

                document.getElementById("resendOTP").style.display = "none";
                document.getElementById("showTimer").style.display = "block";

                $('#otpError').text('');
            },
            error: function(error) {
                // Handle error jika ada kesalahan saat mengirim OTP
                console.error('Kesalahan:', error.responseJSON.message);
            }
        });

        // Menghentikan animasi putar setelah selesai pengiriman ulang OTP
        document.getElementById('refreshIcon').style.animation = 'none';
        setTimeout(function() {
            document.getElementById('refreshIcon').style.animation = 'spin 1s linear infinite';
        }, 1000); // Mulai animasi putar kembali setelah 1 detik
    }
</script>

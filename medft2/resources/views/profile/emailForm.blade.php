<div id="editProfileForm">
    @csrf
    <div class="container-fluid px-3">
        <input name="user_id" id="user_id" hidden>
        <div class="row mt-2">
            <h4>Masukkan Email Baru</h4>
        </div>
        <div class="row mt-1">
        <input id="email" type="email" name="email" value="{{$user->email}}"  class="form-control" required>
            <label style="color:red" id="editEmailFormErrorMessage"></label>
        </div>
        <div class="row mt-4">
            <div class="col text-end">
                <button class="btn btn-secondary w-75" type="button" data-bs-toggle="modal">Batal</button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-75" type="button" onclick="sendOTP()">Ubah</button>
            </div>
        </div>
    </div>
</div>

<div id="editEmailFormOTP" hidden>
    <h4 class="font-weight-bolder">Verifikasi Email</h4>
    <p class="mb-0">Masukkan kode OTP yang telah dikirimkan ke email Anda</p>
    <div class="card-body">
            <div class="mb-3">
                <input type="text" class="form-control form-control-lg" placeholder="Masukkan kode OTP"
                    aria-label="OTP" id="inputOTP">
                <label id="emailOTPError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="text-center">
                <div id="timerContainer">
                    <p class="mb-0">Kirim ulang kode OTP dalam
                    <p id="timer"></p>
                    </p>
                </div>
                <button id="endButton" class="btn btn-lg btn-secondary btn-lg w-100 mt-4 mb-0" onclick="endTimer()">Kirim Ulang OTP</button>
                <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                    onclick="confirmEmail()">Konfirmasi
                    OTP</button>
                <label id="locked" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
    </div>
</div>
<p id="sendingEmailMessage" hidden>Mengirim Email</p>

<script>
        function sendOTP(){
            let email = $('#email').val()
            localStorage.setItem('editEmail', email)
            $.ajax({
                url: '/api/profil/edit/check/'+email,
                type: 'post',
                dataType: 'json',
                async:true,
                success:function(response){
                    if(!response.userExist){
                        $('#editProfileForm').attr('hidden', true)
                        $('#sendingEmailMessage').removeAttr('hidden')
                        $.ajax({
                            url: '/api/profil/edit/confirm/'+email,
                            type: 'post',
                            dataType: 'json',
                            async:true,
                            success: function (response) {
                                $('#sendingEmailMessage').attr('hidden',true)
                                localStorage.setItem('emailOTP', response.otpCode)
                                localStorage.setItem('emailOTPExpire', response.otpExpire)
                                console.log(localStorage.getItem('emailOTP'))
                                console.log(localStorage.getItem('emailOTPExpire'))
                                $('#editEmailFormOTP').removeAttr('hidden')
                                let countdownTime = 10; // Countdown untuk menit ke-3
                                let display = document.getElementById("timer");
                                let button = document.getElementById('endButton');

                                endButton.style.display = "none";

                                startTimer(countdownTime, display, button);
                            },
                            error: function (xhr, status, error) {
                                console.error(error)
                            }
                        });
                    } else {
                        $('#editEmailFormErrorMessage').html('*Email sudah terdaftar')
                    }
                },
                error: function(e){
                    console.log(e);
                }
            })
        }
        // Fungsi untuk mengatur timer mundur
        function startTimer(duration, display, button) {
            $('#timerContainer').attr('hidden', false)
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
                    clearInterval(intervalId); // Menghentikan countdown setelah waktu tertentu
                    button.style.display = "block";
                    $('#timerContainer').attr('hidden', true)
                }
            }, 1000);
        }

        function endTimer() {
            $('#sendingEmailMessage').removeAttr('hidden')
            $('#editEmailFormOTP').attr('hidden',true)
            sendOTP();
        }

        function confirmEmail(){
            let id = localStorage.getItem('user_id')
            let OTPCode = localStorage.getItem('emailOTP')
            let emailEdit = localStorage.getItem('editEmail')
            let OTPExpire = new Date(localStorage.getItem('emailOTPExpire'))
            let currentTime = new Date()
            let userOTP = $('#inputOTP').val()

            if(OTPCode != userOTP){
                return $('#emailOTPError').html('Kode OTP Salah')
            }
            
            OTPExpireRes = false;
            if(currentTime > OTPExpire){
                OTPExpireRes = true;
                return $('#emailOTPError').html('Kode OTP Kadaluarsa')
            }

            const editEmail = {
                user_id : id,
                email : emailEdit,
                token : localStorage.getItem('emailOTP'),
                tokenExpired : localStorage.getItem('emailOTPExpire'),
                OTPExpire : OTPExpireRes
            }

            $.ajax({
                url:'/api/profil/edit/email/'+id,
                method:'put',
                dataType: 'json',
                data:editEmail,
                success:function(response){
                    Swal.fire({
                        title: "Email Diubah",
                        icon: "success"
                    }).then(() => {
                        logoutConfirmation();
                    })
                }
            })
        }
</script>
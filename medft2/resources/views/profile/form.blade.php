<div id="editProfileForm" hidden>
    <input hidden id="user_id">
    <div class="row mb-1">
        <label for="name" class="fs-6 px-4">Nama Lengkap</label>
    </div>
    <div class="row px-3 mb-4">
        <input id="name" name="name" value="{{$user->biodata->fullname}}"  class="form-control" required>
        <label class="text-danger" id="nameErrorMessage"></label>
    </div>
    <div class="row mb-1">
        <label for="dob" class="fs-6 px-4">Tanggal Lahir (Bulan / Tanggal / Tahun)</label>
    </div>
    <div class="row px-3 mb-4">
        @if($user->customer)
            <input id="dob" type="date" name="dob" value="{{$user->customer->dob}}"  class="form-control" required>
        @else
            <input id="dob" type="date" name="dob" class="form-control" required>
        @endif
        <label class="text-danger" id="dobErrorMessage"></label>
    </div>
    <div class="row mb-1">
        <label for="mobile_phone" class="fs-6 px-4">Nomor Handphone</label>
    </div>
    <div class="row px-3 mb-4">
        <div class="input-group p-0">
            <label class="input-group-text m-0" for="mobile_phone">+62</label>
            <input id="mobile_phone" type="number" maxlength="15" name="mobile_phone" value="{{$user->biodata->mobile_phone}}"  class="form-control" required>
        </div>
        <label class="text-danger" id="phoneErrorMessage"></label>
    </div>
    <div class="row justify-content-end px-3">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" style="width: fit-content;">Batal</button>
        <button id="btnSubmit" class="btn btn-primary mx-1" style="width: fit-content;" onclick="editBiodata()">Ubah Data</button>
        <label id="test"></label>
    </div>
</div>
<!-- User Creds -->
    <div id="editEmailForm" hidden>
        <div class="row mb-1">
            <label for="email" class="fs-6 px-4">Email Baru</label>
        </div>
        <div class="row px-3 mb-4">
            <input id="email" type="email" name="email" value="{{$user->user_email}}"  class="form-control" required>
            <label style="color:red" id="editEmailFormErrorMessage"></label>
        </div>
        <div class="row justify-content-end px-3">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" style="width: fit-content;">Batal</button>
                <button id="btnSubmitEmail" onclick="sendOTP()" class="btn btn-primary mx-1" style="width: fit-content;">Ubah Email</button>
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

    <div id="editPasswordForm" hidden>
        <div class="row mb-1">
            <label for="currentPassword" class="fs-6 px-4">Password anda saat ini</label>
        </div>
        <div class="row px-3 mb-4">
            <input id="currentPassword" type="password" name="password" class="form-control" required>
        </div>
        <div class="row mb-1">
            <label for="retypeCurrentPassword" class="fs-6 px-4">Masukkan Ulang Password</label>
        </div>
        <div class="row px-3 mb-4">
            <input id="retypeCurrentPassword" type="password" name="password" class="form-control" required>
            <label id="currentPasswordErrorMessage" class="text-danger" style="font-size: 12px; font-style: italic"></label>
        </div>
        <div class="row justify-content-end px-3">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" style="width: fit-content;">Batal</button>
            <button id="btnSubmitPassword" onclick="checkPass()" class="btn btn-primary mx-1" type="submit" style="width: fit-content;">Ubah Password</button>
        </div>
    </div>

    <div id="editNewPasswordForm" hidden>
        <div class="row mb-1">
            <label for="newPassword" class="fs-6 px-4">Password baru</label>
        </div>
        <div class="row px-3 mb-4">
            <input id="newPassword" type="password" name="password" class="form-control" required>
        </div>
        <div class="row mb-1">
            <label for="newPasswordRetype" class="fs-6 px-4">Masukkan ulang password</label>
        </div>
        <div class="row px-3 mb-4">
            <input id="newPasswordRetype" type="password" name="password" class="form-control" required>
            <label id="newPasswordErrorMessage" class="text-danger" style="font-size: 12px; font-style: italic" hidden></label>
        </div>
        <div class="row justify-content-end px-3">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" style="width: fit-content;">Batal</button>
            <button id="btnSubmitPassword" onclick="changePass()" class="btn btn-primary mx-1" type="submit" style="width: fit-content;">Ubah Password</button>
        </div>
    </div>
<!-- end -->

<script>
    //edit email
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
                        $('#editEmailForm').attr('hidden', true)
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
            if(currentTime > OTPExpire){
                return $('#emailOTPError').html('Kode OTP Kadaluarsa')
            }

            const editEmail = {
                user_id : id,
                email : emailEdit
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

    //edit pass
        function checkPass(){
            let id = localStorage.getItem('user_id')
            let password = $('#currentPassword').val()
            let password2 = $('#retypeCurrentPassword').val()
            if(password != password2){
                return $('#currentPasswordErrorMessage').html('*Masukkan ulang password')
            }
            const currentPass = {
                password : password
            }
            $.ajax({
                url:'/api/profil/edit/checkpass/'+id,
                method:'post',
                data:currentPass,
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if(response.passwordSame){
                        $('#editPasswordForm').attr('hidden', true)
                        $('#editNewPasswordForm').removeAttr('hidden')
                    } else{
                        return $('#currentPasswordErrorMessage').html('*Password berbeda dengan akun')
                    }
                }, error: function(e){
                    console.log(e);
                }
            })
        }

        function changePass(){
            $('#newPasswordErrorMessage').removeAttr('hidden')
            let id = localStorage.getItem('user_id')
            let password = $('#newPassword').val()
            let password2 = $('#newPasswordRetype').val()

            switch(true){
                case password.length < 8: return $('#newPasswordErrorMessage').html('*Panjang password kurang dari 8 karakter'); break;
                case !/[a-z]/.test(password): return $('#newPasswordErrorMessage').html('*Password harus memiliki huruf kecil'); break;
                case !/[A-Z]/.test(password): return $('#newPasswordErrorMessage').html('*Password harus memiliki huruf kapital'); break;
                case !/[0-9]/.test(password): return $('#newPasswordErrorMessage').html('*Password harus memiliki angka'); break;
                case !/[!@#\$%\^&\*()_+]/.test(password): return $('#newPasswordErrorMessage').html('*Password harus memiliki simbol'); break;
            }   

            if(password != password2){
                return $('#newPasswordErrorMessage').html('*Masukkan ulang password')
            }

            const editPass = {
                    user_id : id,
                    password : password
                }
            $.ajax({
                url:'/api/profil/edit/pass/'+id,
                method:'post',
                data:editPass,
                success:function(response){
                    console.log(editPass);
                    Swal.fire({
                        title: "Password Diubah",
                        icon: "success",
                    }).then(() => {
                        logoutConfirmation();
                    })
                }
            })
        }
    // edit biodata
        var maxDate = new Date()
        maxDate.setDate(currentDate.getDate() + 1);
        dob.max = maxDate.toLocaleDateString('fr-ca');

        $('#user_id').val(localStorage.getItem('user_id'))

        function editBiodata(){
            $('#nameErrorMessage').html('')
            $('#dobErrorMessage').html('')
            let name = $('#name').val()
            let id = localStorage.getItem('user_id')
            let dob = $('#dob').val()
            let mobile_phone = $('#mobile_phone').val()
            
            let currentTime = new Date()
            currentTime.setDate(currentTime.getDate() + 1);
            let dobDate = new Date(dob);
            dobDate.setDate(dobDate.getDate() + 1);

            $.ajax({
                url:'/api/profil/check/'+mobile_phone+'/'+id,
                method:'post',
                success:function(response){
                    console.log(response);
                    if(response.dataExists){
                        return $('#phoneErrorMessage').html('*Nomor HP sudah terdaftar');
                    } 
                }
            })

            switch(true){
                case name === null: return $('#nameErrorMessage').html('*Nama harus diisi'); break;
                case name.trim() === "": return $('#nameErrorMessage').html('*Nama harus diisi'); break;
                case dobDate >= currentTime: return $('#dobErrorMessage').html('*Tanggal belum tersedia'); break;
            }
            const data = {
                name:name,
                dob:dob,
                mobile_phone:mobile_phone,
                user_id:id
            }
            console.log(data);
            $.ajax({
                url:'/api/profil/edit/'+id,
                method:'post',
                data:data,
                dataType:'json',
                success: function(){
                    Swal.fire({
                        title: "Data Diubah",
                        icon: "success"
                    }).then(() => {
                        location.reload(1)
                    })
                }
            })
            // location.reload(1)
        }
</script>


<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>Med.Id | @yield('title') @stack('page-title')</title>
    @include('layout.template.style-css')
    @include('layout.template.style-js')
    <style>
        .child-menu {
            padding-left: 20px;
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn btn-link fs-4 m-0" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav sidenav-toggler-line g-sidenav-pinned bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <div class="navbar-brand m-0" href="">
                <span class="ms-1 font-weight-bold">Sidebar Menu</span>
            </div>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="container-fluid">
            <div class="collapse navbar-collapse  w-100" id="sidenav-collapse-main">
                <ul class="navbar-nav" id="sidebarMenu">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" href="./pages/dashboard.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/tables.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/billing.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Billing</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/virtual-reality.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Virtual Reality</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/rtl.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">RTL</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/profile.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/sign-in.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Sign In</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/sign-up.html">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-collection text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Sign Up</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('layout/navigation/navigation')
        <!-- End Navbar -->

        <!-- Main Content -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        @include('layout/footer/footer')
        <!-- End Footer -->
    </main>

    <script>
        console.log(localStorage.getItem('role_id'));
        console.log(localStorage.getItem('user_id'));
        if (localStorage.getItem('role_id') && localStorage.getItem('user_id')) {
            // publicMenu()
            $('#userSection').removeAttr('hidden');
            $('#sidebar').removeAttr('hidden');
            $('#loginSection').attr('hidden', true);
            $('#name').html(localStorage.getItem('user_fullname'));
        } else {
            publicMenu()
            $('#userSection').attr('hidden', true);
            $('#loginSection').removeAttr('hidden');
            $('#sidebar').attr('hidden', true);
        }

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        function openLoginModal() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/login',
                type: 'GET',
                contentType: 'html',
                success: function(login) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(login);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        // Start function forget password
        function openModalForgetPasswordEmailVerif() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/emailverif',
                type: 'GET',
                contentType: 'html',
                success: function(emailverif) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(emailverif);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function openModalForgetPasswordOtp() {
            const emailInput = $('input[name="email"]');
            const emailError = $('#emailError');

            emailInput.on('input', function() {
                const emailValue = $(this).val();
                emailError.text('');

                if (!emailValue) {
                    emailError.text('*Email harus diisi');
                    return;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailValue)) {
                    emailError.text('*Format email tidak valid');
                    return;
                }
            });

            const emailValue = emailInput.val();
            if (!emailValue) {
                emailError.text('*Email harus diisi');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailValue)) {
                emailError.text('*Format email tidak valid');
                return;
            }

            localStorage.setItem('userEmail', emailValue);

            $.ajax({
                url: 'http://127.0.0.1:8000/api/forget-password/send-otp',
                type: 'POST',
                data: {
                    email: emailValue
                },
                success: function(sendOTP) {
                    localStorage.setItem('tempOTP', sendOTP.otp.tempOTP);
                    localStorage.setItem('otpExpiration', sendOTP.otp.otpExpiration);

                    console.log(localStorage.getItem('tempOTP'));
                    console.log(sendOTP.otp.otpExpiration);

                    // Tindakan lanjutan jika diperlukan setelah mengirim OTP
                    openModalForgetPasswordOtpView();
                },
                error: function(error) {
                    console.error('Kesalahan:', error.responseJSON.message);
                    if (error.responseJSON.message === 'Email tidak terdaftar.') {
                        // Tampilkan pesan jika email tidak terdaftar
                        emailError.text('*Email tidak terdaftar');
                    } else if (error.responseJSON.message ===
                        'Akun anda terkunci.') {
                        // Tampilkan pesan jika akun terkunci
                        emailError.text('*Akun anda terkunci..');
                    }
                }
            });
        }

        function openModalForgetPasswordOtpView() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/inputotp',
                type: 'GET',
                contentType: 'html',
                success: function(inputotp) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(inputotp);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function openModalForgetPasswordNewPassword() {
            const otpInput = document.querySelector('input[name="OTP"]');
            const otpError = $('#otpError');

            otpInput.addEventListener('input', function() {
                otpError.text(''); // Menghapus pesan error saat input berubah
            });

            let enteredOTP = otpInput.value;

            // Mendapatkan nilai OTP, waktu kedaluwarsa, dan email dari localStorage
            let expectedOTP = localStorage.getItem('tempOTP');
            let expiration = localStorage.getItem('otpExpiration');

            console.log(expectedOTP);
            console.log(expiration);

            // Kirim request untuk verifikasi OTP
            $.ajax({
                url: 'http://127.0.0.1:8000/api/forget-password/verify-otp',
                type: 'POST',
                data: {
                    otp: enteredOTP,
                    expectedOTP: expectedOTP,
                    expiration: expiration
                },
                success: function(setpassword) {
                    // console.log(setpassword);
                    openModalForgetPasswordNewPasswordView();
                },
                error: function(error) {
                    // Handle error jika ada kesalahan saat mengirim OTP
                    console.error('Kesalahan:', error.responseJSON.message);

                    if (error.responseJSON.message === 'Verifikasi OTP gagal.') {
                        // Tampilkan pesan jika kode OTP salah
                        $('#otpError').text('*Kode OTP salah, silakan coba lagi.');
                    } else if (error.responseJSON.message ===
                        'Kode OTP kadaluarsa, silakan kirim ulang kode OTP.') {
                        // Tampilkan pesan jika kode OTP kadaluarsa
                        $('#otpError').text('*Kode OTP kadaluarsa, silakan kirim ulang kode OTP.');
                    } else {
                        // Tampilkan pesan default jika ada kesalahan lainnya
                        $('#otpError').text('*Terjadi kesalahan saat verifikasi OTP.');
                    }
                }
            })
        }

        function openModalForgetPasswordNewPasswordView() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/setpassword',
                type: 'GET',
                contentType: 'html',
                success: function(setpassword) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(setpassword);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function settNewPass() {
            const newPasswordInput = $('input[name="newPassword"]');
            const newConfirmPasswordInput = $('input[name="newPasswordConfirm"]');
            const passError = $('#newPassError');
            const confirmPassError = $('#newConfirmPassError');

            newPasswordInput.on('input', function() {
                const newPassword = $(this).val();
                passError.text('');
                validatePassword(newPassword, passError);
            });

            newConfirmPasswordInput.on('input', function() {
                const newConfirmPassword = $(this).val();
                confirmPassError.text('');

                if (!newConfirmPassword) {
                    confirmPassError.text('*Konfirmasi password harus diisi.');
                    return;
                }

                const newPassword = newPasswordInput.val();
                if (newPassword !== newConfirmPassword) {
                    confirmPassError.text('*Password konfirmasi tidak sama dengan password');
                    return;
                }

                confirmPassError.text('');
            });

            const newPassword = newPasswordInput.val();
            const newConfirmPassword = newConfirmPasswordInput.val();

            passError.text('');
            confirmPassError.text('');

            if (!validatePassword(newPassword, passError) || newPassword !== newConfirmPassword) {
                confirmPassError.text('*Password konfirmasi tidak sama dengan password');
                return;
            }

            // Lakukan permintaan Ajax
            $.ajax({
                url: 'http://127.0.0.1:8000/api/forget-password/reset-password',
                type: 'PATCH',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                    email: localStorage.getItem('userEmail'),
                    password: newPassword,
                    password_confirmation: newConfirmPassword,
                }),
                success: function(response) {
                    console.log(response);
                    window.location.href = "{{ route('home.dashboard.dashboard') }}";
                },
                error: function(error) {
                    console.error('Kesalahan:', error.responseJSON.message);
                    if (error.responseJSON.message ===
                        'Password baru harus berbeda dengan password lama.') {
                        passError.text('*Password tidak boleh sama dengan password yang lama.');
                        confirmPassError.text('*Password tidak boleh sama dengan password yang lama.');
                    } else if (error.responseJSON.message ===
                        'Password baru tidak boleh sama dengan salah satu password lama.') {
                        passError.text('*Password tidak boleh sama dengan password yang lama.');
                        confirmPassError.text('*Password tidak boleh sama dengan password yang lama.');
                    } else {
                        passError.text('');
                        confirmPassError.text('');
                    }
                }
            });
        }

        function validatePassword(password, errorField) {
            errorField.text('');

            if (!password) {
                errorField.text('*Password harus diisi.');
                return false;
            }

            // Lakukan validasi password sesuai kebutuhan
            const regexLowerCase = /[a-z]/;
            const regexUpperCase = /[A-Z]/;
            const regexNumber = /[0-9]/;
            const regexSymbol = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;

            if (password.length < 8) {
                errorField.text('*Panjang password kurang dari 8 karakter');
                return false;
            }

            if (!regexLowerCase.test(password)) {
                errorField.text('*Password harus memiliki huruf kecil');
                return false;
            }

            if (!regexUpperCase.test(password)) {
                errorField.text('*Password harus memiliki huruf kapital');
                return false;
            }

            if (!regexNumber.test(password)) {
                errorField.text('*Password harus memiliki angka');
                return false;
            }

            if (!regexSymbol.test(password)) {
                errorField.text('*Password harus memiliki simbol');
                return false;
            }

            return true; // Mengembalikan nilai true jika password valid
        }

        // Start function register
        function openModalRegisEmailVerif() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/regis/emailverif',
                type: 'GET',
                contentType: 'html',
                success: function(emailverif) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(emailverif);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function openModalInputOtp() {
            const emailInput = $('input[name="email"]');
            const emailError = $('#emailError');

            emailInput.on('input', function() {
                const emailValue = $(this).val();
                emailError.text('');

                if (!emailValue) {
                    emailError.text('*Email harus diisi');
                    return;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailValue)) {
                    emailError.text('*Format email tidak valid');
                    return;
                }
            });

            const emailValue = emailInput.val();
            if (!emailValue) {
                emailError.text('*Email harus diisi');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailValue)) {
                emailError.text('*Format email tidak valid');
                return;
            }

            // Simpan email ke dalam localStorage
            localStorage.setItem('userEmail', emailValue);

            // Kirim request untuk mengirim OTP ke email
            $.ajax({
                url: 'http://127.0.0.1:8000/api/send-otp', // Ganti dengan URL endpoint untuk mengirim OTP
                type: 'POST',
                data: {
                    email: emailValue
                    // token: tempOTP,
                    // expire_on: otpExpiration
                },
                success: function(sendOTP) {
                    // Simpan tempOTP dan otpExpiration ke localStorage setelah berhasil mengirim OTP
                    localStorage.setItem('tempOTP', sendOTP.otp.tempOTP);
                    localStorage.setItem('otpExpiration', sendOTP.otp.otpExpiration);

                    console.log(localStorage.getItem('tempOTP'));
                    console.log(sendOTP.otp.otpExpiration);

                    // Tindakan lanjutan jika diperlukan setelah mengirim OTP
                    openModalInputOtpView();
                },
                error: function(error) {
                    // Handle error jika ada kesalahan saat mengirim OTP
                    console.error('Kesalahan:', error.responseJSON.message);
                    $('#emailError').text('*Email sudah terdaftar');
                }
            });
        }

        function openModalInputOtpView() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/regis/inputotp',
                type: 'GET',
                contentType: 'html',
                success: function(inputotp) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(inputotp);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function openModalSetPass() {
            const otpInput = document.querySelector('input[name="OTP"]');
            const otpError = $('#otpError');

            otpInput.addEventListener('input', function() {
                otpError.text(''); // Menghapus pesan error saat input berubah
            });

            let enteredOTP = otpInput.value;
            // Mendapatkan nilai OTP, waktu kedaluwarsa, dan email dari localStorage
            let expectedOTP = localStorage.getItem('tempOTP');
            let expiration = localStorage.getItem('otpExpiration');

            console.log(expectedOTP);
            console.log(expiration);

            // Kirim request untuk verifikasi OTP
            $.ajax({
                url: 'http://127.0.0.1:8000/api/verify-otp',
                type: 'POST',
                data: {
                    otp: enteredOTP,
                    expectedOTP: expectedOTP,
                    expiration: expiration
                },
                success: function(setpassword) {
                    // console.log(setpassword);
                    openModalSetPassView();
                },
                error: function(error) {
                    // Handle error jika ada kesalahan saat mengirim OTP
                    console.error('Kesalahan:', error.responseJSON.message);

                    if (error.responseJSON.message === 'Verifikasi OTP gagal.') {
                        // Tampilkan pesan jika kode OTP salah
                        $('#otpError').text('*Kode OTP salah, silakan coba lagi.');
                    } else if (error.responseJSON.message ===
                        'Kode OTP kadaluarsa, silakan kirim ulang kode OTP.') {
                        // Tampilkan pesan jika kode OTP kadaluarsa
                        $('#otpError').text('*Kode OTP kadaluarsa, silakan kirim ulang kode OTP.');
                    } else {
                        // Tampilkan pesan default jika ada kesalahan lainnya
                        $('#otpError').text('*Terjadi kesalahan saat verifikasi OTP.');
                    }
                }
            })
        }

        function openModalSetPassView() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/regis/setpassword',
                type: 'GET',
                contentType: 'html',
                success: function(setpassword) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(setpassword);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function openModalRegister() {
            const passwordInput = $('input[name="password"]');
            const confirmPasswordInput = $('input[name="password-confirm"]');
            const passError = $('#passError');
            const confirmPassError = $('#confirmPassError');

            passwordInput.on('input', function() {
                const password = $(this).val();
                passError.text('');
                validatePassword(password, passError);
            });

            confirmPasswordInput.on('input', function() {
                const confirmPassword = $(this).val();
                confirmPassError.text('');

                if (!confirmPassword) {
                    confirmPassError.text('*Konfirmasi password harus diisi.');
                    return;
                }

                const password = passwordInput.val();
                if (confirmPassword !== password) {
                    confirmPassError.text('*Password konfirmasi tidak sama dengan password');
                    return;
                }

                confirmPassError.text('');
            });

            const password = passwordInput.val();
            const confirmPassword = confirmPasswordInput.val();

            passError.text('');
            confirmPassError.text('');

            if (!password || !confirmPassword) {
                passError.text(!password ? '*Password harus diisi.' : '');
                confirmPassError.text(!confirmPassword ? '*Konfirmasi password harus diisi.' : '');
                return;
            }

            if (confirmPassword !== password) {
                confirmPassError.text('*Password konfirmasi tidak sama dengan password');
                return;
            }

            // Validasi kedua input wajib diisi
            // if (!password || !confirmPassword) {
            //     document.getElementById('passError').innerText = '*Password harus diisi.';
            //     if (!password) {
            //         document.getElementById('passError').innerText = '*Password harus diisi.';
            //     }
            //     if (!confirmPassword) {
            //         document.getElementById('confirmPassError').innerText = '*Konfirmasi password harus diisi.';
            //     }
            //     return;
            // }

            // Validasi password sesuai kriteria hanya saat password dimasukkan
            // if (password) {
            //     const lengthError = password.length < 8 ? 'Minimal 8 karakter.<br>' : '';
            //     const upperCaseError = /[A-Z]/.test(password) ? '' : 'Minimal satu huruf besar.<br>';
            //     const lowerCaseError = /[a-z]/.test(password) ? '' : 'Minimal satu huruf kecil.<br>';
            //     const numberError = /\d/.test(password) ? '' : 'Minimal satu angka.<br>';
            //     const specialCharError = /[!@#$%^&*()_+}{"\':;?/>.<,]/.test(password) ? '' :
            //         'Minimal satu karakter khusus.<br>';

            //     const errorMessage = `${lengthError}${upperCaseError}${lowerCaseError}${numberError}${specialCharError}`;
            //     document.getElementById('passError').innerHTML = `*Syarat yang belum terpenuhi:<br>${errorMessage}`;
            // }
            // switch (true) {
            //     case password.length < 8:
            //         return $('#passError').html('*Panjang password kurang dari 8 karakter');
            //         break;
            //     case !/[a-z]/.test(password):
            //         return $('#passError').html('*Password harus memiliki huruf kecil');
            //         break;
            //     case !/[A-Z]/.test(password):
            //         return $('#passError').html('*Password harus memiliki huruf kapital');
            //         break;
            //     case !/[0-9]/.test(password):
            //         return $('#passError').html('*Password harus memiliki angka');
            //         break;
            //     case !/[!@#\$%\^&\*()_+]/.test(password):
            //         return $('#passError').html('*Password harus memiliki simbol');
            //         break;
            // }

            // Validasi kedua password sama jika sudah dimasukkan pada kedua field
            // if (password && confirmPassword) {
            //     if (password !== confirmPassword) {
            //         return document.getElementById('confirmPassError').innerText =
            //             '*Password konfirmasi tidak sama dengan password';

            //     } else {
            //         document.getElementById('confirmPassError').innerText = '';
            //     }
            // }

            // Jika lolos validasi, simpan password ke localStorage atau kirim ke server
            // console.log('success');
            localStorage.setItem('password', password);
            console.log(password);
            localStorage.setItem('confirmPassword', confirmPassword);
            console.log(confirmPassword);
            // Lakukan tindakan lanjutan seperti menyimpan data atau kirim permintaan ke server
            // ...

            // Clear pesan error jika semua valid
            // document.getElementById('passError').innerText = '';
            // document.getElementById('confirmPassError').innerText = '';

            // Lanjutkan ke langkah selanjutnya (jika ada)
            openModalRegisterView();
        }

        function openModalRegisterView() {
            $.ajax({
                url: 'http://127.0.0.1:8000/auth/regis/register',
                type: 'GET',
                contentType: 'html',
                success: function(register) {
                    // Mengganti konten modal-body dengan konten dari auth-login.blade.php
                    $('#mymodal').modal('show');
                    $('#mymodal .modal-body').html(register);

                    // Hide modal-title
                    $('#mymodal .modal-title').hide();
                    $('#mymodal .modal-header').hide();

                    // Remove modal-footer
                    $('#mymodal .modal-footer').hide();
                }
            })
        }

        function saveUser(_data = {}, biodata_id) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/user/create/' + biodata_id,
                type: 'POST',
                dataType: 'json',
                data: _data,
                success: function(user) {
                    console.log(user);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        }

        function saveAdmin(_data = {}, biodata_id) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/create/' + biodata_id,
                type: 'POST',
                dataType: 'json',
                data: _data,
                success: function(admin) {
                    console.log(admin);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            })
        }

        function getNextAdminCode(callback) {
            // Memanggil endpoint untuk mendapatkan kode berikutnya dari backend
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/last-code',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Memanggil callback dengan kode berikutnya
                    callback(data.last_code);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        }

        function saveDoctor(_data = {}, biodata_id) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/doctor/create',
                type: 'POST',
                dataType: 'json',
                data: _data,
                success: function(doctor) {
                    console.log(doctor);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            })
        }

        function saveCustomer(_data = {}, biodata_id) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/customer/create',
                type: 'POST',
                dataType: 'json',
                data: _data,
                success: function(customer) {
                    console.log(customer);
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            })
        }

        function daftar() {
            var nama = $('#nama').val();
            var phone = $('#phone').val();
            var selectedRole = $('#role').val();

            // Validasi input nama tidak boleh kosong
            if (!nama) {
                $('#namaError').text('*Nama lengkap harus diisi.');
                return;
            } else {
                $('#namaError').text(''); // Hapus pesan error jika valid
            }

            // Validasi input nomor handphone tidak boleh kosong dan hanya berisi angka
            if (!phone) {
                $('#phoneError').text('*Nomor handphone harus diisi.');
                return;
            } else if (!phone.match(/^\d+$/)) {
                $('#phoneError').text('*Nomor handphone hanya boleh berisi angka.');
                return;
            } else {
                $('#phoneError').text(''); // Hapus pesan error jika valid
            }

            $.ajax({
                url: 'http://127.0.0.1:8000/api/biodata',
                type: 'POST',
                dataType: 'json',
                data: {
                    fullname: nama,
                    mobile_phone: phone,
                    created_by: 1
                },
                success: function(biodata) {
                    console.log(biodata);

                    const biodata_id = biodata.id;

                    const userData = {
                        email: localStorage.getItem('userEmail'),
                        password: localStorage.getItem('password'),
                        password_confirmation: localStorage.getItem('confirmPassword'),
                        role_id: selectedRole
                    };
                    // Handle untuk selectedRole yang dipilih
                    if (selectedRole === '1' || selectedRole === '2' || selectedRole === '3' || selectedRole ===
                        '4') {
                        saveUser(userData, biodata_id);
                    } else if (!selectedRole) {
                        userData.role_id = '5';
                        saveUser(userData, biodata_id);
                    }

                    if (selectedRole === '1') {
                        const biodata_id = biodata.id;

                        // Mendapatkan kode berikutnya dari backend
                        getNextAdminCode(function(nextCode) {
                            // Menggunakan kode berikutnya dalam data admin
                            const adminData = {
                                code: nextCode
                            };
                            saveAdmin(adminData, biodata_id);
                        });
                    }

                    if (selectedRole === '2') {
                        const biodata_id = biodata.id;

                        const doctorData = {
                            biodata_id: biodata_id
                        };
                        saveDoctor(doctorData, biodata_id);
                    }

                    if (selectedRole === '3') {
                        const biodata_id = biodata.id;

                        const customerData = {
                            biodata_id: biodata_id
                        };
                        saveCustomer(customerData, biodata_id);
                    }

                    window.location.href = "{{ route('home.dashboard.dashboard') }}";
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            })
        }
        // End function Register

        // Start function logout
        function logoutConfirmation() {
            localStorage.clear()

            window.location.href = "{{ route('home.dashboard.dashboard') }}";
        }
        // End function logout

        // Start function Menu
        function publicMenu() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/menu/publicmenu',
                type: 'GET',
                contentType: 'application/json',
                success: function(publicmenu) {
                    // console.log(publicmenu);
                    var str = '<div class="row justify-content-center">'; // Baris baru

                    for (i = 0; i < publicmenu.length; i++) {
                        if (i > 0 && i % 3 === 0) {
                            str +=
                                '</div><div class="row justify-content-center">'; // Mulai baris baru setiap tiga elemen
                        }
                        str += `
                                <div class="col-md-4"> <!-- Menggunakan col-md-4 untuk grid dengan 3 kolom -->
                                    <div class="info-box mb-3 text-dark">
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <div class="text-center">
                                                    <i class="${publicmenu[i].big_icon} fs-1 text-primary" aria-hidden="true"></i>
                                                    <h4 class="my-2"><a href="${publicmenu[i].url}" class="text-dark">${publicmenu[i].nama_menu}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               `;
                    }
                    str += '</div>'; // Menutup baris terakhir
                    $('#publicMenu').html(str);
                }
            })
        }

        sidebarSection(localStorage.getItem('role_id'));

        function sidebarSection(role_id) {
            var parent_id = 0;
            var str = '';
            $.ajax({
                url: 'http://127.0.0.1:8000/api/menu/menurole/' + role_id,
                type: 'GET',
                contentType: 'application/json',
                success: function(parentmenu) {
                    // console.log(parentmenu);
                    for (i = 0; i < parentmenu.length; i++) {
                        str += '<li class="nav-item">';
                        if (parentmenu[i].url.includes('/')) { // <<   -   -   -   -   -   -   Tata
                            str += '<a class="nav-link" href="' + parentmenu[i].url + '">' +
                                '<i class="' + parentmenu[i].small_icon + '"></i>' +
                                // Menggunakan small_icon dari parentmenu
                                parentmenu[i].nama_menu +
                                '</a>';
                        } else { //  <<  -   -   -   -   -   -   -   -   -   -   -   -   -   -   Tata
                            str += '<a class="nav-link" onclick="' + parentmenu[i].url + '">' +
                                '<i class="' + parentmenu[i].small_icon + '"></i>' +
                                // Menggunakan small_icon dari parentmenu
                                parentmenu[i].nama_menu +
                                '</a>';
                        }

                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/menu/childmenu/' + parentmenu[i].menu_id,
                            type: 'GET',
                            contentType: 'application/json',
                            async: false,
                            success: function(childmenu) {
                                // console.log(childmenu);
                                if (childmenu.length > 0) {
                                    str +=
                                        '<ul class="pl-4 list-unstyled child-menu">'; // Menjorokkan child menu ke dalam dan menghilangkan dot
                                    for (j = 0; j < childmenu.length; j++) {
                                        str += '<li><a class="nav-link" href="' + childmenu[j].url +
                                            '"><i class="' + childmenu[j].small_icon + '"></i>' +
                                            // Menggunakan small_icon dari childmenu
                                            childmenu[j].name + '</a></li>';
                                    }
                                    str += '</ul>';
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(status + ': ' + error);
                            }
                        });

                        str += '</li>';
                    }
                    $('#sidebarMenu').html(str);
                },
                error: function(xhr, status, error) {
                    console.error(status + ': ' + error);
                }
            });
        }
        // End function Menu
        // - V - V - Tata
        function findMed() {
            $.ajax({
                url: '/h/find/med',
                method: 'get',
                contentType: 'html',
                success: function(response) {
                    $('#mymodal').modal('show')
                    $('.modal-title').html('Cari Obat')
                    $('.modal-body').html(response)
                    $('.modal-footer').attr('hidden', true)
                }
            })
        }
    </script>

</body>

</html>

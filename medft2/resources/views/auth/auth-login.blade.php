<div class="card card-plain d-flex justify-content-center">
    <div class="card-header pb-0 text-center">
        <h4 class="font-weight-bolder">Masuk</h4>
        <button type="button" class="btn btn-link fs-4 position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="card-body">
        <form role="form">
            <div class="mb-3">
                <label for="email"><strong>Email</strong><span class="text-danger">*</span></label>
                <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email"
                    name="email">
                <label id="emailError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="mb-3">
                <label for="password"><strong>Password</strong><span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password"
                    name="password">
                <label id="passError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                    onclick="submitLoginForm()">Masuk</button>
                <label id="locked" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
        </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mt-2"><a href="#" class="text-primary text-gradient"
                onclick="openModalForgetPasswordEmailVerif()">Lupa
                password?</a>
        </p>
        <p class="mb-1 text-sm">Belum memiliki akun?</p>
        <p class="mb-4 text-sm"><a href="#" class="text-primary text-gradient font-weight-bold"
                onclick="openModalRegisEmailVerif()">Daftar</a>
        </p>
    </div>
</div>

<script>
    function submitLoginForm() {
        const emailInput = document.querySelector('input[name="email"]');
        const passwordInput = document.querySelector('input[name="password"]');
        const emailError = $('#emailError');
        const passError = $('#passError');
        const lockedError = $('#locked');

        emailInput.addEventListener('input', function() {
            if (emailInput.value === '') {
                emailError.html('*Email harus diisi');
            } else {
                emailError.html('');
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailError.html('*Format email tidak valid');
                return;
            } else {
                emailError.html('');
            }
        });

        passwordInput.addEventListener('input', function() {
            if (passwordInput.value === '') {
                passError.html('*Password harus diisi');
            } else {
                passError.html('');
            }
        });

        const email = emailInput.value;
        const password = passwordInput.value;

        if (email === '') {
            emailError.html('*Email harus diisi');
            return;
        } else {
            emailError.html('');
        }

        if (password === '') {
            passError.html('*Password harus diisi');
            return;
        } else {
            passError.html('');
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.html('*Format email tidak valid');
            return;
        } else {
            emailError.html('');
        }

        $.ajax({
            url: 'http://127.0.0.1:8000/api/login',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                // Tindakan setelah login berhasil
                console.log(response); // Tampilkan respon atau lakukan aksi lainnya

                $.ajax({
                    url: '/api/login/' + email,
                    type: 'GET',
                    success: function(response) {
                        localStorage.setItem('user_id', response.user_id);
                        localStorage.setItem('role_id', response.role_id);
                        localStorage.setItem('user_email', response.email);
                        localStorage.setItem('user_fullname', response.fullname);

                        console.log('user_id: ' + localStorage.getItem('user_id'));
                        console.log('role_id: ' + localStorage.getItem('role_id'));
                        console.log('user_email: ' + localStorage.getItem('user_email'));
                        console.log('user_fullname: ' + localStorage.getItem('user_fullname'));
                        window.location.href = "{{ route('home.dashboard.dashboard') }}";
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            },
            error: function(error) {
                console.error(error.responseText);
                const errorMessage = error.responseJSON.message;
                if (errorMessage === 'Email atau password salah.') {
                    // emailError.html('*Email atau password salah');
                    passError.html('*Email atau password salah');
                } else if (errorMessage === 'Email atau password tidak valid.') {
                    emailError.html('*Email atau password tidak valid');
                    passError.html('*Email atau password tidak valid');
                } else if (errorMessage === 'Akun terkunci. Hubungi admin.') {
                    lockedError.html('*Akun terkunci. Hubungi admin.');
                }
            }
        });
    }
</script>

<div class="card card-plain d-flex justify-content-center">
    <div class="card-header pb-0 text-center">
        <h4 class="font-weight-bolder">Set Password</h4>
        <button type="button" class="btn btn-link fs-4 position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <p class="mb-0">Masukkan password baru untuk akun Anda</p>
    </div>
    <div class="card-body">
        <form role="form">
            @csrf
            <div class="mb-3">
                <label for="password"><strong>Password</strong><span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password"
                    name="newPassword">
                <label id="newPassError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="mb-3">
                <label for="password"><strong>Masukkan ulang password</strong><span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-lg" placeholder="Masukkan ulang password"
                    aria-label="Password Confirm" name="newPasswordConfirm">
                <label id="newConfirmPassError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" onclick="settNewPass()">Set
                    Password</button>
            </div>
        </form>
    </div>
</div>

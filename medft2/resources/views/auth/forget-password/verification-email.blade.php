<div class="card card-plain d-flex justify-content-center">
    <div class="card-header pb-0 text-center">
        <h4 class="font-weight-bolder">Lupa Password</h4>
        <button type="button" class="btn btn-link fs-4 position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
        <p class="mb-0">Masukkan email Anda. Kami akan melakukan pengecekan</p>
    </div>
    <div class="card-body">
        <form role="form">
            <div class="mb-3">
                <label for="email"><strong>Email</strong><span class="text-danger">*</span></label>
                <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email"
                    name="email">
                <label id="emailError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                    onclick="openModalForgetPasswordOtp()">Kirim
                    OTP</button>
            </div>
        </form>
    </div>
</div>

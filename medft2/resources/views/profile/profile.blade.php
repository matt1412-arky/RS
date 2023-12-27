<div class="container-fluid w-100 px-5">
    <div class="row">
        <div class="col">
            <h4 class="fw-bolder">Data Pribadi</h4>
        </div>
        <div class="col text-end">
            <button class="btn btn-link" onclick="editData()"><i class="fas fa-pen"></i> Ubah</button>
        </div>
    </div>
    <div class="row border-bottom mb-3">
        <label>Nama Lengkap</label>
        <input value="{{ $user->biodata->fullname }}" class="form-control-plaintext px-4 border-0" readonly>
    </div>
    <div class="row border-bottom mb-3">
        <label>Tanggal Lahir</label>
        <?php
            $formattedDob = ($user->customer->dob) ? \Carbon\Carbon::parse($user->customer->dob)->format('d F Y') : null;
        ?>
        <input value="{{ $formattedDob }}" class="form-control-plaintext px-4 border-0" readonly>
    </div>
    <div class="row border-bottom mb-3">
        <label>Nomor Telepon</label>
        <input value="+62 {{ $user->biodata->mobile_phone }}" class="form-control-plaintext px-4 border-0" readonly>
    </div>
</div>

<div class="container-fluid w-100 px-5">
    <div class="row mb-3">
        <h4 fw-bolder>Data Akun</h4>
    </div>
    <div class="row border-bottom mb-3">
        <label>Email</label>
        <div class="col" style="width: fit-content;">
            <input value="{{ $user->email }}" class="form-control-plaintext px-4 border-0" readonly>
        </div>
        <div class="col text-end" style="width: fit-content;">
            <button class="btn btn-link m-0" onclick="editEmail()"><i class="fas fa-pen"></i> Ubah</button>
        </div>
    </div>
    <div class="row border-bottom mb-3">
        <label>Password</label>
        <div class="col" style="width: fit-content;">
            <input value="123412341234" type="password" class="form-control-plaintext px-4 border-0" readonly>
        </div>
        <div class="col text-end" style="width: fit-content;">
            <button class="btn btn-link m-0" onclick="editPassword()"><i class="fas fa-pen"></i> Ubah</button>
        </div>
    </div>
</div>
<input id="user_id" value="{{$user->id}}" hidden>

<script>
    var id = $('#user_id').val()
    var baseUrl = window.location.href; 
    function showForm(url, title) {
        $.ajax({
            url: baseUrl+url,
            type: 'get',
            contentType: 'html',
            async: true,
            success: function(profileForm) {
                $('#mymodal').modal('show');
                $('.modal-header').show();
                $('.modal-title').show();
                $('.modal-title').html(title);
                $('#mymodal .modal-body').html(profileForm);
                $('.modal-footer').hide();
                console.log('open form');
            }
        });
    }

    function editData() {
        showForm('/form/bio', 'Ubah Biodata');
    }

    function editEmail() {
        showForm('/form/email', 'Ubah Email');
    }

    function editPassword() {
        showForm('/form/pass', 'Ubah Password');
    }
</script>

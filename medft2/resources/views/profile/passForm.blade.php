<div id="editPasswordForm">
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

<script>
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
                    localStorage.setItem('oldPassword', password)
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
        let oldPassword = localStorage.getItem('oldPassword')

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

        if(password === oldPassword){
            return $('#newPasswordErrorMessage').html('*Password tidak boleh sama dengan password sebelumnya')
        }

        const editPass = {
                user_id : id,
                password : password,
                oldPassword : oldPassword
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
</script>